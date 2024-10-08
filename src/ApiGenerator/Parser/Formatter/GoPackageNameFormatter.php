<?php

declare(strict_types=1);

namespace Kcs\K8s\ApiGenerator\Parser\Formatter;

use function array_pop;
use function count;
use function explode;
use function implode;
use function preg_match;
use function str_starts_with;
use function strlen;
use function substr;
use function ucfirst;

readonly class GoPackageNameFormatter
{
    public const NAME_REPLACEMENTS = [
        'apiserver' => 'ApiServer',
        'apiserverinternal' => 'ApiServerInternal',
        'apiextensions' => 'ApiExtensions',
        'apiregistration' => 'ApiRegistration',
        'admissionregistration' => 'AdmissionRegistration',
        'autoscaling' => 'AutoScaling',
        'flowcontrol' => 'FlowControl',
    ];

    private const BASE_REPLACEMENTS = [
        'io.k8s.apiextensions-apiserver.pkg.apis.apiextensions.' => 'ApiExtensions.',
        'io.k8s.apimachinery.pkg.' => 'ApiMachinery.',
        'io.k8s.apiserver.pkg.' => 'ApiServer.',
        'io.k8s.apiserverinternal.pkg.' => 'ApiServerInternal.',
        'io.k8s.kube-aggregator.pkg.' => 'KubeAggregator.',
        'io.k8s.' => '',
    ];

    private const PHP_RESERVED = [
        'Class' => 'K8sClass',
        'Namespace' => 'K8sNamespace',
    ];

    private const NO_UC_FIRST_REGEX = '/^v\d/';

    public function format(string $goPackageName): GoPackageName
    {
        $originalPackageName = $goPackageName;

        foreach (self::BASE_REPLACEMENTS as $base => $replacement) {
            if (str_starts_with($goPackageName, $base)) {
                $goPackageName = $replacement . substr($goPackageName, strlen($base));
                break;
            }
        }

        $parts = explode('.', $goPackageName);
        for ($i = 0; $i < count($parts) - 1; $i++) {
            if (isset(self::NAME_REPLACEMENTS[$parts[$i]])) {
                $parts[$i] = self::NAME_REPLACEMENTS[$parts[$i]];
            } elseif (! preg_match(self::NO_UC_FIRST_REGEX, $parts[$i])) {
                $parts[$i] = ucfirst($parts[$i]);
            }
        }

        $name = array_pop($parts);
        $path = implode('\\', $parts);

        if (isset(self::PHP_RESERVED[$name])) {
            $name = self::PHP_RESERVED[$name];
        }

        return new GoPackageName(
            $originalPackageName,
            $path,
            $name,
        );
    }
}
