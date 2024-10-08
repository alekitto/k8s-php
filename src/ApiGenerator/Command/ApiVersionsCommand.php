<?php

declare(strict_types=1);

namespace Kcs\K8s\ApiGenerator\Command;

use Kcs\K8s\ApiGenerator\Github\GithubClient;
use Kcs\K8s\ApiGenerator\Github\GitTag;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

use function array_keys;
use function array_map;
use function array_reverse;
use function array_values;
use function count;
use function explode;
use function json_encode;

use const JSON_THROW_ON_ERROR;

#[AsCommand('k8s:api-versions')]
class ApiVersionsCommand extends Command
{
    private const GITHUB_OWNER = 'kubernetes';

    private const GITHUB_REPO = 'kubernetes';

    public function __construct(private readonly GithubClient $githubClient = new GithubClient())
    {
        parent::__construct();
    }

    protected function configure(): void
    {
        $this->setDescription('Generate a JSON list of Kubernetes API versions that do not yet exist in your API repo.');
        $this->addOption(
            'min-version',
            null,
            InputOption::VALUE_REQUIRED,
            'The minimum API version of K8s to retrieve. Anything lower will not be returned.',
            'v1.10.0',
        );
        $this->addOption(
            'gh-api-owner',
            null,
            InputOption::VALUE_REQUIRED,
            'The Github K8s API owner.',
            'k8s-client',
        );
        $this->addOption(
            'gh-api-repo',
            null,
            InputOption::VALUE_REQUIRED,
            'The Github K8s API repo.',
            'api',
        );
        $this->addOption(
            'last-n',
            null,
            InputOption::VALUE_REQUIRED,
            'Only for the last number of non-minor releases.',
            '10',
        );
    }

    public function execute(InputInterface $input, OutputInterface $output): int
    {
        $kubernetesTags = $this->githubClient->getTags(self::GITHUB_OWNER, self::GITHUB_REPO);
        $minVersion = $input->getOption('min-version');
        $lastN = $input->getOption('last-n');

        $ghApiOwner = $input->getOption('gh-api-owner');
        $ghApiRepo = $input->getOption('gh-api-repo');
        $apiTags = $this->githubClient->getTags($ghApiOwner, $ghApiRepo);

        $kTags = [];
        foreach ($kubernetesTags->getStableTags($minVersion) as $tag) {
            $major = explode('.', $tag->getCommonName())[1];
            if (! isset($kTags[$major])) {
                $kTags[$major] = $tag;
            }

            if ($lastN !== null && count($kTags) >= $lastN) {
                break;
            }
        }

        $kTags = array_values($kTags);

        $aTags = [];
        foreach ($apiTags->getStableTags() as $tag) {
            $aTags[$tag->getCommonName()] = $tag;
        }

        $toReturn = [];
        foreach (array_reverse(array_keys($kTags)) as $kTag) {
            if (isset($aTags[$kTag])) {
                continue;
            }

            $toReturn[] = $kTags[$kTag];
        }

        $toReturn = [
            'api-version' => array_map(static fn (GitTag $tag) => $tag->getCommonName(), $toReturn),
        ];

        $json = json_encode($toReturn, JSON_THROW_ON_ERROR);
        $output->writeln($json);

        return self::SUCCESS;
    }
}
