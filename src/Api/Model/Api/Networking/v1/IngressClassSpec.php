<?php

declare(strict_types=1);

namespace Kcs\K8s\Api\Model\Api\Networking\v1;

use Kcs\K8s\Attribute as Kubernetes;
use Kcs\K8s\Attribute\AttributeType;

/**
 * IngressClassSpec provides information about the class of an Ingress.
 */
class IngressClassSpec
{
    #[Kubernetes\Attribute('controller')]
    protected string|null $controller = null;

    #[Kubernetes\Attribute('parameters', type: AttributeType::Model, model: IngressClassParametersReference::class)]
    protected IngressClassParametersReference|null $parameters = null;

    public function __construct(string|null $controller = null, IngressClassParametersReference|null $parameters = null)
    {
        $this->controller = $controller;
        $this->parameters = $parameters;
    }

    /**
     * controller refers to the name of the controller that should handle this class. This allows for
     * different "flavors" that are controlled by the same controller. For example, you may have different
     * parameters for the same implementing controller. This should be specified as a domain-prefixed path
     * no more than 250 characters in length, e.g. "acme.io/ingress-controller". This field is immutable.
     */
    public function getController(): string|null
    {
        return $this->controller;
    }

    /**
     * controller refers to the name of the controller that should handle this class. This allows for
     * different "flavors" that are controlled by the same controller. For example, you may have different
     * parameters for the same implementing controller. This should be specified as a domain-prefixed path
     * no more than 250 characters in length, e.g. "acme.io/ingress-controller". This field is immutable.
     *
     * @return static
     */
    public function setController(string $controller): static
    {
        $this->controller = $controller;

        return $this;
    }

    /**
     * parameters is a link to a custom resource containing additional configuration for the controller.
     * This is optional if the controller does not require extra parameters.
     */
    public function getParameters(): IngressClassParametersReference|null
    {
        return $this->parameters;
    }

    /**
     * parameters is a link to a custom resource containing additional configuration for the controller.
     * This is optional if the controller does not require extra parameters.
     *
     * @return static
     */
    public function setParameters(IngressClassParametersReference $parameters): static
    {
        $this->parameters = $parameters;

        return $this;
    }
}
