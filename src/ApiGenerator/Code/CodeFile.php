<?php

declare(strict_types=1);

namespace Kcs\K8s\ApiGenerator\Code;

use Nette\PhpGenerator\ClassType;
use Nette\PhpGenerator\PhpNamespace;

use function array_shift;
use function explode;
use function implode;
use function sprintf;

use const DIRECTORY_SEPARATOR;

readonly class CodeFile
{
    public function __construct(
        private PhpNamespace $phpNamespace,
        private ClassType $classType,
    ) {
    }

    public function getPhpNamespace(): PhpNamespace
    {
        return $this->phpNamespace;
    }

    public function getFullFileName(): string
    {
        $fcqn = explode('\\', $this->getFqcn());
        array_shift($fcqn);
        array_shift($fcqn);

        return sprintf('%s.php', implode(DIRECTORY_SEPARATOR, $fcqn));
    }

    private function getFqcn(): string
    {
        return sprintf(
            '%s\\%s',
            $this->phpNamespace->getName(),
            $this->classType->getName(),
        );
    }
}
