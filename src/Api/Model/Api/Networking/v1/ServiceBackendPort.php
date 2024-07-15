<?php

declare(strict_types=1);

namespace Kcs\K8s\Api\Model\Api\Networking\v1;

use Kcs\K8s\Attribute as Kubernetes;

/**
 * ServiceBackendPort is the service port being referenced.
 */
class ServiceBackendPort
{
    #[Kubernetes\Attribute('name')]
    protected string|null $name = null;

    #[Kubernetes\Attribute('number')]
    protected int|null $number = null;

    public function __construct(string|null $name = null, int|null $number = null)
    {
        $this->name = $name;
        $this->number = $number;
    }

    /**
     * name is the name of the port on the Service. This is a mutually exclusive setting with "Number".
     */
    public function getName(): string|null
    {
        return $this->name;
    }

    /**
     * name is the name of the port on the Service. This is a mutually exclusive setting with "Number".
     *
     * @return static
     */
    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    /**
     * number is the numerical port number (e.g. 80) on the Service. This is a mutually exclusive setting
     * with "Name".
     */
    public function getNumber(): int|null
    {
        return $this->number;
    }

    /**
     * number is the numerical port number (e.g. 80) on the Service. This is a mutually exclusive setting
     * with "Name".
     *
     * @return static
     */
    public function setNumber(int $number): static
    {
        $this->number = $number;

        return $this;
    }
}
