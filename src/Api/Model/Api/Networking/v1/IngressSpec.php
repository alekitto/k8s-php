<?php

declare(strict_types=1);

namespace Kcs\K8s\Api\Model\Api\Networking\v1;

use Kcs\K8s\Attribute as Kubernetes;
use Kcs\K8s\Attribute\AttributeType;
use Kcs\K8s\Collection;

/**
 * IngressSpec describes the Ingress the user wishes to exist.
 */
class IngressSpec
{
    #[Kubernetes\Attribute('defaultBackend', type: AttributeType::Model, model: IngressBackend::class)]
    protected IngressBackend|null $defaultBackend = null;

    #[Kubernetes\Attribute('ingressClassName')]
    protected string|null $ingressClassName = null;

    /** @var iterable|IngressRule[]|null */
    #[Kubernetes\Attribute('rules', type: AttributeType::Collection, model: IngressRule::class)]
    protected $rules = null;

    /** @var iterable|IngressTLS[]|null */
    #[Kubernetes\Attribute('tls', type: AttributeType::Collection, model: IngressTLS::class)]
    protected $tls = null;

    /**
     * @param iterable|IngressRule[] $rules
     * @param iterable|IngressTLS[] $tls
     */
    public function __construct(
        IngressBackend|null $defaultBackend = null,
        string|null $ingressClassName = null,
        iterable $rules = [],
        iterable $tls = [],
    ) {
        $this->defaultBackend = $defaultBackend;
        $this->ingressClassName = $ingressClassName;
        $this->rules = new Collection($rules);
        $this->tls = new Collection($tls);
    }

    /**
     * defaultBackend is the backend that should handle requests that don't match any rule. If Rules are
     * not specified, DefaultBackend must be specified. If DefaultBackend is not set, the handling of
     * requests that do not match any of the rules will be up to the Ingress controller.
     */
    public function getDefaultBackend(): IngressBackend|null
    {
        return $this->defaultBackend;
    }

    /**
     * defaultBackend is the backend that should handle requests that don't match any rule. If Rules are
     * not specified, DefaultBackend must be specified. If DefaultBackend is not set, the handling of
     * requests that do not match any of the rules will be up to the Ingress controller.
     *
     * @return static
     */
    public function setDefaultBackend(IngressBackend $defaultBackend): static
    {
        $this->defaultBackend = $defaultBackend;

        return $this;
    }

    /**
     * ingressClassName is the name of an IngressClass cluster resource. Ingress controller implementations
     * use this field to know whether they should be serving this Ingress resource, by a transitive
     * connection (controller -> IngressClass -> Ingress resource). Although the
     * `kubernetes.io/ingress.class` annotation (simple constant name) was never formally defined, it was
     * widely supported by Ingress controllers to create a direct binding between Ingress controller and
     * Ingress resources. Newly created Ingress resources should prefer using the field. However, even
     * though the annotation is officially deprecated, for backwards compatibility reasons, ingress
     * controllers should still honor that annotation if present.
     */
    public function getIngressClassName(): string|null
    {
        return $this->ingressClassName;
    }

    /**
     * ingressClassName is the name of an IngressClass cluster resource. Ingress controller implementations
     * use this field to know whether they should be serving this Ingress resource, by a transitive
     * connection (controller -> IngressClass -> Ingress resource). Although the
     * `kubernetes.io/ingress.class` annotation (simple constant name) was never formally defined, it was
     * widely supported by Ingress controllers to create a direct binding between Ingress controller and
     * Ingress resources. Newly created Ingress resources should prefer using the field. However, even
     * though the annotation is officially deprecated, for backwards compatibility reasons, ingress
     * controllers should still honor that annotation if present.
     *
     * @return static
     */
    public function setIngressClassName(string $ingressClassName): static
    {
        $this->ingressClassName = $ingressClassName;

        return $this;
    }

    /**
     * rules is a list of host rules used to configure the Ingress. If unspecified, or no rule matches, all
     * traffic is sent to the default backend.
     *
     * @return iterable|IngressRule[]
     */
    public function getRules(): iterable|null
    {
        return $this->rules;
    }

    /**
     * rules is a list of host rules used to configure the Ingress. If unspecified, or no rule matches, all
     * traffic is sent to the default backend.
     *
     * @return static
     */
    public function setRules(iterable $rules): static
    {
        $this->rules = $rules;

        return $this;
    }

    /** @return static */
    public function addRules(IngressRule $rule): static
    {
        if (! $this->rules) {
            $this->rules = new Collection();
        }

        $this->rules[] = $rule;

        return $this;
    }

    /**
     * tls represents the TLS configuration. Currently the Ingress only supports a single TLS port, 443. If
     * multiple members of this list specify different hosts, they will be multiplexed on the same port
     * according to the hostname specified through the SNI TLS extension, if the ingress controller
     * fulfilling the ingress supports SNI.
     *
     * @return iterable|IngressTLS[]
     */
    public function getTls(): iterable|null
    {
        return $this->tls;
    }

    /**
     * tls represents the TLS configuration. Currently the Ingress only supports a single TLS port, 443. If
     * multiple members of this list specify different hosts, they will be multiplexed on the same port
     * according to the hostname specified through the SNI TLS extension, if the ingress controller
     * fulfilling the ingress supports SNI.
     *
     * @return static
     */
    public function setTls(iterable $tls): static
    {
        $this->tls = $tls;

        return $this;
    }

    /** @return static */
    public function addTls(IngressTLS $tl): static
    {
        if (! $this->tls) {
            $this->tls = new Collection();
        }

        $this->tls[] = $tl;

        return $this;
    }
}
