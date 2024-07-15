<?php

declare(strict_types=1);

namespace Kcs\K8s\ApiGenerator\Parser\Formatter;

use function array_pop;
use function count;
use function explode;
use function implode;
use function str_replace;
use function ucfirst;

readonly class ServiceGroupNameFormatter
{
    public function format(string $groupName, string $version, string $kind): ServiceGroupName
    {
        $groupPieces = explode(
            '.',
            str_replace('.k8s.io', '', $groupName),
        );

        foreach ($groupPieces as $i => $groupPiece) {
            if (isset(GoPackageNameFormatter::NAME_REPLACEMENTS[$groupPiece])) {
                $groupPieces[$i] = GoPackageNameFormatter::NAME_REPLACEMENTS[$groupPiece];
            } else {
                $groupPieces[$i] = ucfirst($groupPiece);
            }
        }

        if (count($groupPieces) === 1) {
            $baseNamespace = '';
            $baseName = $groupPieces[0];
        } else {
            $baseName = array_pop($groupPieces);
            $baseNamespace = implode('\\', $groupPieces);
        }

        return new ServiceGroupName(
            $groupName,
            $baseNamespace,
            $baseName,
            $version,
            $kind,
        );
    }
}
