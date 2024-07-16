<?php

declare(strict_types=1);

namespace Kcs\K8s\ApiGenerator\Command;

use Kcs\K8s\ApiGenerator\Code\CodeCleaner;
use Kcs\K8s\ApiGenerator\Code\CodeGenerator;
use Kcs\K8s\ApiGenerator\Code\CodeOptions;
use Kcs\K8s\ApiGenerator\Code\CodeRemover;
use Kcs\K8s\ApiGenerator\Config\Configuration;
use Kcs\K8s\ApiGenerator\Config\ConfigurationManager;
use Kcs\K8s\ApiGenerator\Github\GithubClient;
use Kcs\K8s\ApiGenerator\Github\GitTag;
use Kcs\K8s\ApiGenerator\Parser\MetadataParser;
use OpenApi\Annotations\OpenApi;
use OpenApi\Serializer;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Finder\Finder;
use Throwable;
use ZipArchive;

use function assert;
use function file_exists;
use function file_put_contents;
use function is_string;
use function mkdir;
use function sprintf;
use function substr;
use function version_compare;

#[AsCommand('k8s:generate')]
class GenerateCommand extends Command
{
    private const GITHUB_OWNER = 'kubernetes';

    private const GITHUB_REPO = 'kubernetes';

    private const SWAGGER_SPEC_PATH = '/api/openapi-spec/swagger.json';

    public function __construct(
        private readonly GithubClient $githubClient = new GithubClient(),
        private readonly Serializer $serializer = new Serializer(),
        private readonly MetadataParser $metadataParser = new MetadataParser(),
        private readonly CodeGenerator $codeGenerator = new CodeGenerator(),
        private readonly ConfigurationManager $configManager = new ConfigurationManager(),
        private readonly CodeRemover $codeRemover = new CodeRemover(),
        private readonly CodeCleaner $codeCleaner = new CodeCleaner(),
    ) {
        parent::__construct();
    }

    protected function configure(): void
    {
        $this->setDescription('Generate K8s API objects from OpenAPI specifications.');
        $this->addOption(
            'api-version',
            'a',
            InputOption::VALUE_REQUIRED,
            'The API version of K8s to generate.',
        );
        $this->addOption(
            'src-dir',
            null,
            InputOption::VALUE_REQUIRED,
            'The location of the soure files.',
            'src/',
        );
        $this->addOption(
            'root-namespace',
            null,
            InputOption::VALUE_REQUIRED,
            'The root namespace for the generated classes.',
            'Kcs\K8s\Api',
        );
        $this->addOption(
            'force',
            null,
            InputOption::VALUE_NONE,
            'Always generate the API regardless of the config values.',
        );
        $this->addOption(
            'no-delete',
            null,
            InputOption::VALUE_NONE,
            'Do not delete existing generated code.',
        );
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $apiVersion = $input->getOption('api-version');
        $rootNamespace = $input->getOption('root-namespace');
        $srcDir = $input->getOption('src-dir');

        if (! (is_string($apiVersion) || $apiVersion === null)) {
            $output->writeln(sprintf('<error>The api-version must be a string or null.</error>'));

            return self::FAILURE;
        }

        if (! (is_string($rootNamespace) || $rootNamespace === null)) {
            $output->writeln(sprintf('<error>The root-namespace must be a string or null.</error>'));

            return self::FAILURE;
        }

        if (! (is_string($srcDir) || $srcDir === null)) {
            $output->writeln(sprintf('<error>The src-dir must be a string or null.</error>'));

            return self::FAILURE;
        }

        if ($apiVersion) {
            $tag = new GitTag([
                'ref' => 'refs/tags/' . $apiVersion,
                'url' => GithubClient::GITHUB_API_BASE . '/repos/' . self::GITHUB_OWNER . '/' . self::GITHUB_REPO . '/git/refs/tags/' . $apiVersion,
            ]);
        } else {
            $tag = $this->getTagFromRepo(
                $output,
                $apiVersion,
            );
        }

        $apiVersion ??= $tag->getCommonName();

        $config = $this->configManager->read();
        if ($config && ! $this->shouldGenerateApi($input, $config, $apiVersion)) {
            $output->writeln(sprintf(
                '<info>Not generating API for version %s.</info>',
                $apiVersion,
            ));
            $output->writeln(sprintf(
                '<info>Config is at API version %s and generator version %s. </info>',
                $config->getApiVersion(),
                $config->getGeneratorVersion(),
            ));

            return self::SUCCESS;
        }

        $output->writeln('<info>Fetching Open-API specification for API data...</info>');
        $cacheFile = '.cache/' . $apiVersion . '.zip';
        if (! file_exists($cacheFile)) {
            @mkdir('.cache', 0777, true);
            file_put_contents($cacheFile, $this->githubClient->getRepositoryArchive($tag));

            $archive = new ZipArchive();
            $archive->open($cacheFile);
            $archive->extractTo('.cache/' . $apiVersion);
            $archive->close();
        }

        $simpleVersion = substr($apiVersion, 1);
        $finder = Finder::create()
            ->in(['.cache/' . $apiVersion . '/' . $tag->getRepositoryName() . '-' . $simpleVersion . '/api/openapi-spec/v3'])
            ->name('*.json');

        $codeOptions = new CodeOptions(
            $tag->getCommonName(),
            $this->getAppVersion(),
            $rootNamespace,
            $srcDir,
        );

        $output->writeln(sprintf(
            '<info>Generating API data for version %s</info>',
            $tag->getCommonName(),
        ));

        foreach ($finder as $file) {
            try {
                $openApi = $this->serializer->deserializeFile($file->getRealPath());
                assert($openApi instanceof OpenApi);
            } catch (Throwable $exception) {
                $output->writeln('<error>Unable to parse the OpenAPI specification:</error>');
                $output->writeln('<error>' . $exception->getMessage() . '</error>');

                return self::FAILURE;
            }

            $this->codeGenerator->addMetadata($this->metadataParser->parse($openApi));
        }

        if (! $input->getOption('no-delete')) {
            $this->codeRemover->removeCode($output, $codeOptions);
        }

        $this->codeGenerator->generateCode($codeOptions);
        $this->codeCleaner->cleanCode($codeOptions, $output);

        if ($config) {
            $config->setApiVersion($apiVersion);
            $config->setGeneratorVersion($this->getAppVersion());
        } else {
            $config = $this->configManager->newConfig($apiVersion, $this->getAppVersion());
        }

        $this->configManager->write($config);

        $output->writeln('<info>Finished generating API data!</info>');

        return self::SUCCESS;
    }

    protected function getTagFromRepo(OutputInterface $output, string|null $version): GitTag
    {
        $output->writeln('<info>Fetching version tags for K8s...</info>');

        $gitTags = $this->githubClient->getTags(
            self::GITHUB_OWNER,
            self::GITHUB_REPO,
        );

        return $gitTags->getLatestStableTag($version);
    }

    private function getAppVersion(): string
    {
        return $this->getApplication()?->getVersion();
    }

    private function shouldGenerateApi(InputInterface $input, Configuration $config, string $apiVersion): bool
    {
        if ($input->getOption('force')) {
            return true;
        }

        return version_compare($this->getAppVersion(), $config->getGeneratorVersion(), 'gt')
            || version_compare($apiVersion, $config->getApiVersion(), 'gt');
    }
}
