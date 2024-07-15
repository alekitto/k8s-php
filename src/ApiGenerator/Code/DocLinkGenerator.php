<?php

declare(strict_types=1);

namespace Kcs\K8s\ApiGenerator\Code;

use Kcs\K8s\ApiGenerator\Parser\Metadata\OperationMetadata;

use function array_map;
use function explode;
use function implode;
use function sprintf;
use function str_replace;
use function strtolower;
use function version_compare;

readonly class DocLinkGenerator
{
    private const MIN_VERSION = 'v1.15';

    private const LINK_FORMAT = 'https://kubernetes.io/docs/reference/generated/kubernetes-api/%s/#%s';

    private const ACTION_MAP = [
        'post' => 'create',
        'get' => 'read',
        'deletecollection' => 'delete-collection',
    ];

    public function canGenerateLink(string $version): bool
    {
        return (bool) version_compare($version, self::MIN_VERSION, 'ge');
    }

    public function generateLink(string $version, OperationMetadata $operation): string
    {
        $actionKindVersionGroup = [];

        if ($operation->getKubernetesAction()) {
            $action = $operation->getKubernetesAction();
            $actionKindVersionGroup[] = self::ACTION_MAP[$action] ?? $action;
        }

        if ($operation->getKubernetesKind()) {
            $actionKindVersionGroup[] = $operation->getKubernetesKind();
        }

        if ($operation->getKubernetesVersion()) {
            $actionKindVersionGroup[] = $operation->getKubernetesVersion();
        }

        $actionKindVersionGroup[] = $operation->getKubernetesGroup() ?: 'core';

        return sprintf(
            self::LINK_FORMAT,
            implode('.', explode('.', $version, -1)),
            implode(
                '-',
                array_map(static fn (string $piece) => str_replace(
                    '.',
                    '-',
                    strtolower($piece),
                ), $actionKindVersionGroup),
            ),
        );
    }
}
