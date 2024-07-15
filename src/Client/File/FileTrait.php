<?php

declare(strict_types=1);

namespace Kcs\K8s\Client\File;

use function sprintf;
use function sys_get_temp_dir;
use function uniqid;

use const DIRECTORY_SEPARATOR;

trait FileTrait
{
    private function getTempFilename(string $suffix = ''): string
    {
        return sprintf(
            '%s%s%s.tar%s',
            sys_get_temp_dir(),
            DIRECTORY_SEPARATOR,
            uniqid('k8s-client', true),
            $suffix,
        );
    }
}
