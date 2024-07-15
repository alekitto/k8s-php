<?php

declare(strict_types=1);

namespace Kcs\K8s\ApiGenerator\Config;

use RuntimeException;

use function file_exists;
use function file_get_contents;
use function file_put_contents;
use function getcwd;
use function json_decode;
use function json_encode;
use function sprintf;

use const DIRECTORY_SEPARATOR;
use const JSON_THROW_ON_ERROR;

class ConfigurationManager
{
    private const CONFIG_NAME = '.k8s-api.json';

    public function read(): Configuration|null
    {
        $config = null;

        if (file_exists($this->getFilePath())) {
            $config = $this->getConfigFromFile();
        }

        return $config;
    }

    public function newConfig(string $apiVersion, string $generatorVersion): Configuration
    {
        return new Configuration([
            Configuration::KEY_API_VERSION => $apiVersion,
            Configuration::KEY_GENERATOR_VERSION => $generatorVersion,
        ]);
    }

    public function write(Configuration $configuration): void
    {
        $data = json_encode([
            Configuration::KEY_GENERATOR_VERSION => $configuration->getGeneratorVersion(),
            Configuration::KEY_API_VERSION => $configuration->getApiVersion(),
        ], JSON_THROW_ON_ERROR);

        if (file_put_contents($this->getFilePath(), $data) === false) {
            throw new RuntimeException(sprintf(
                'Unable to save config to "%s".',
                $this->getFilePath(),
            ));
        }
    }

    private function getConfigFromFile(): Configuration
    {
        $file = $this->getFilePath();
        $config = file_get_contents($file);

        if ($config === false) {
            throw new RuntimeException(sprintf(
                'Unable to read config file: %s',
                $file,
            ));
        }

        $config = json_decode($config, true, 512, JSON_THROW_ON_ERROR);
        if ($config === false) {
            throw new RuntimeException(sprintf(
                'Unable to decode JSON config file: %s',
                $file,
            ));
        }

        return new Configuration($config);
    }

    private function getFilePath(): string
    {
        return sprintf(
            '%s%s%s',
            getcwd(),
            DIRECTORY_SEPARATOR,
            self::CONFIG_NAME,
        );
    }
}
