<?php

declare(strict_types=1);

namespace Kcs\K8s\Api\Model\Api\Core\v1;

use Kcs\K8s\Attribute as Kubernetes;

/**
 * ClientIPConfig represents the configurations of Client IP based session affinity.
 */
class ClientIPConfig
{
    #[Kubernetes\Attribute('timeoutSeconds')]
    protected int|null $timeoutSeconds = null;

    public function __construct(int|null $timeoutSeconds = null)
    {
        $this->timeoutSeconds = $timeoutSeconds;
    }

    /**
     * timeoutSeconds specifies the seconds of ClientIP type session sticky time. The value must be >0 &&
     * <=86400(for 1 day) if ServiceAffinity == "ClientIP". Default value is 10800(for 3 hours).
     */
    public function getTimeoutSeconds(): int|null
    {
        return $this->timeoutSeconds;
    }

    /**
     * timeoutSeconds specifies the seconds of ClientIP type session sticky time. The value must be >0 &&
     * <=86400(for 1 day) if ServiceAffinity == "ClientIP". Default value is 10800(for 3 hours).
     *
     * @return static
     */
    public function setTimeoutSeconds(int $timeoutSeconds): static
    {
        $this->timeoutSeconds = $timeoutSeconds;

        return $this;
    }
}
