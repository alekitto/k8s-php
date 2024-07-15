<?php

declare(strict_types=1);

namespace Kcs\K8s\ApiGenerator\Code;

use function array_shift;
use function explode;
use function getcwd;
use function implode;
use function substr;

use const DIRECTORY_SEPARATOR;

trait CodeDirectoriesTrait
{
    /** @return array{models: string, services: string} */
    private function getCodeDirectories(CodeOptions $options): array
    {
        $directory = $options->getSrcDir();
        $directory = substr($directory, -1) !== DIRECTORY_SEPARATOR ? $directory . DIRECTORY_SEPARATOR : $directory;
        if ($directory[0] !== DIRECTORY_SEPARATOR) {
            $directory = getcwd() . DIRECTORY_SEPARATOR . $directory;
        }

        $namespace = explode('\\', $options->getRootNamespace());
        array_shift($namespace);
        array_shift($namespace);

        $directory .= implode(DIRECTORY_SEPARATOR, $namespace);
        $directory .= DIRECTORY_SEPARATOR;

        return [
            'models' => $directory . 'Model',
            'services' => $directory . 'Service',
        ];
    }
}
