<?php

declare(strict_types=1);

namespace Kcs\K8s\Api\Model\Api\Storage\v1;

use DateTimeInterface;
use Kcs\K8s\Attribute as Kubernetes;
use Kcs\K8s\Attribute\AttributeType;

/**
 * VolumeError captures an error encountered during a volume operation.
 */
class VolumeError
{
    #[Kubernetes\Attribute('message')]
    protected string|null $message = null;

    #[Kubernetes\Attribute('time', type: AttributeType::DateTime)]
    protected DateTimeInterface|null $time = null;

    public function __construct(string|null $message = null, DateTimeInterface|null $time = null)
    {
        $this->message = $message;
        $this->time = $time;
    }

    /**
     * message represents the error encountered during Attach or Detach operation. This string may be
     * logged, so it should not contain sensitive information.
     */
    public function getMessage(): string|null
    {
        return $this->message;
    }

    /**
     * message represents the error encountered during Attach or Detach operation. This string may be
     * logged, so it should not contain sensitive information.
     *
     * @return static
     */
    public function setMessage(string $message): static
    {
        $this->message = $message;

        return $this;
    }

    /**
     * time represents the time the error was encountered.
     */
    public function getTime(): DateTimeInterface|null
    {
        return $this->time;
    }

    /**
     * time represents the time the error was encountered.
     *
     * @return static
     */
    public function setTime(DateTimeInterface $time): static
    {
        $this->time = $time;

        return $this;
    }
}
