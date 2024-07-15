<?php

declare(strict_types=1);

namespace Kcs\K8s\ApiGenerator\Code\Writer;

use Kcs\K8s\ApiGenerator\Code\CodeFile;
use Kcs\K8s\ApiGenerator\Code\CodeOptions;
use Nette\PhpGenerator\PhpFile;
use Nette\PhpGenerator\PsrPrinter;
use Symfony\Component\Filesystem\Filesystem;

use const DIRECTORY_SEPARATOR;

readonly class PhpFileWriter
{
    public function __construct(private Filesystem $fileSystem = new Filesystem(), private PsrPrinter $psrPrinter = new PsrPrinter())
    {
    }

    public function write(CodeFile $codeFile, CodeOptions $options): string
    {
        $file = new PhpFile();
        $file->setStrictTypes();
        $file->addNamespace($codeFile->getPhpNamespace());

        $filename = $options->getSrcDir() . DIRECTORY_SEPARATOR . $codeFile->getFullFileName();
        $this->fileSystem->dumpFile(
            $filename,
            $this->psrPrinter->printFile($file),
        );

        return $filename;
    }
}
