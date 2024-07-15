<?php

declare(strict_types=1);

namespace Kcs\K8s\ApiGenerator\Code\CodeGenerator\Service;

use function str_ends_with;

trait OperationCodeGeneratorTrait
{
    private function isPodExec(string $phpMethodName): bool
    {
        return str_ends_with($phpMethodName, 'PodExec')
            || str_ends_with($phpMethodName, 'PodAttach');
    }

    private function isPortForward(string $phpMethodName): bool
    {
        return str_ends_with($phpMethodName, 'Portforward');
    }

    private function isProxy(string $phpMethodName): bool
    {
        return str_ends_with($phpMethodName, 'Proxy')
            || str_ends_with($phpMethodName, 'ProxyWithPath');
    }
}
