<?php

declare(strict_types=1);

namespace Kcs\K8s\Client\KubeConfig;

use Kcs\K8s\Client\ContextConfig;
use Kcs\K8s\Client\Options;
use Kcs\K8s\Contract\ContextConfigInterface;

readonly class ContextConfigFactory
{
    public function __construct(private Options $options)
    {
    }

    public function makeContextConfig(): ContextConfigInterface
    {
        return new ContextConfig(
            $this->options,
            $this->options->getKubeConfigContext(),
        );
    }
}
