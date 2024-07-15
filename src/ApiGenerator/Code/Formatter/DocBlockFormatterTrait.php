<?php

declare(strict_types=1);

namespace Kcs\K8s\ApiGenerator\Code\Formatter;

use function str_replace;
use function wordwrap;

trait DocBlockFormatterTrait
{
    protected function formatDocblockDescription(string $data): string
    {
        return str_replace(
            '*/',
            '* /',
            wordwrap($data, 100),
        );
    }
}
