<?php

declare(strict_types=1);

namespace Kcs\K8s\Api\Model\Api\Core\v1;

use Kcs\K8s\Attribute as Kubernetes;
use Kcs\K8s\Attribute\AttributeType;

/**
 * SessionAffinityConfig represents the configurations of session affinity.
 */
class SessionAffinityConfig
{
    #[Kubernetes\Attribute('clientIP', type: AttributeType::Model, model: ClientIPConfig::class)]
    protected ClientIPConfig|null $clientIP = null;

    public function __construct(ClientIPConfig|null $clientIP = null)
    {
        $this->clientIP = $clientIP;
    }

    /**
     * clientIP contains the configurations of Client IP based session affinity.
     */
    public function getClientIP(): ClientIPConfig|null
    {
        return $this->clientIP;
    }

    /**
     * clientIP contains the configurations of Client IP based session affinity.
     *
     * @return static
     */
    public function setClientIP(ClientIPConfig $clientIP): static
    {
        $this->clientIP = $clientIP;

        return $this;
    }
}
