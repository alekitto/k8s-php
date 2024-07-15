<?php

declare(strict_types=1);

namespace Kcs\K8s\Client\Exception;

use K8s\Api\Model\ApiMachinery\Apis\Meta\v1\Status;
use Kcs\K8s\Exception\Exception;

class KubernetesException extends Exception
{
    public function __construct(private Status $status)
    {
        parent::__construct(
            (string) $status->getMessage(),
            (int) $status->getCode(),
        );
    }

    public function getStatus(): Status
    {
        return $this->status;
    }
}
