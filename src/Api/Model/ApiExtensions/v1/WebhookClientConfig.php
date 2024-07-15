<?php

declare(strict_types=1);

namespace Kcs\K8s\Api\Model\ApiExtensions\v1;

use Kcs\K8s\Attribute as Kubernetes;
use Kcs\K8s\Attribute\AttributeType;

/**
 * WebhookClientConfig contains the information to make a TLS connection with the webhook.
 */
class WebhookClientConfig
{
    #[Kubernetes\Attribute('caBundle')]
    protected string|null $caBundle = null;

    #[Kubernetes\Attribute('service', type: AttributeType::Model, model: ServiceReference::class)]
    protected ServiceReference|null $service = null;

    #[Kubernetes\Attribute('url')]
    protected string|null $url = null;

    public function __construct(string|null $caBundle = null, ServiceReference|null $service = null, string|null $url = null)
    {
        $this->caBundle = $caBundle;
        $this->service = $service;
        $this->url = $url;
    }

    /**
     * caBundle is a PEM encoded CA bundle which will be used to validate the webhook's server certificate.
     * If unspecified, system trust roots on the apiserver are used.
     */
    public function getCaBundle(): string|null
    {
        return $this->caBundle;
    }

    /**
     * caBundle is a PEM encoded CA bundle which will be used to validate the webhook's server certificate.
     * If unspecified, system trust roots on the apiserver are used.
     *
     * @return static
     */
    public function setCaBundle(string $caBundle): static
    {
        $this->caBundle = $caBundle;

        return $this;
    }

    /**
     * service is a reference to the service for this webhook. Either service or url must be specified.
     *
     * If the webhook is running within the cluster, then you should use `service`.
     */
    public function getService(): ServiceReference|null
    {
        return $this->service;
    }

    /**
     * service is a reference to the service for this webhook. Either service or url must be specified.
     *
     * If the webhook is running within the cluster, then you should use `service`.
     *
     * @return static
     */
    public function setService(ServiceReference $service): static
    {
        $this->service = $service;

        return $this;
    }

    /**
     * url gives the location of the webhook, in standard URL form (`scheme://host:port/path`). Exactly one
     * of `url` or `service` must be specified.
     *
     * The `host` should not refer to a service running in the cluster; use the `service` field instead.
     * The host might be resolved via external DNS in some apiservers (e.g., `kube-apiserver` cannot
     * resolve in-cluster DNS as that would be a layering violation). `host` may also be an IP address.
     *
     * Please note that using `localhost` or `127.0.0.1` as a `host` is risky unless you take great care to
     * run this webhook on all hosts which run an apiserver which might need to make calls to this webhook.
     * Such installs are likely to be non-portable, i.e., not easy to turn up in a new cluster.
     *
     * The scheme must be "https"; the URL must begin with "https://".
     *
     * A path is optional, and if present may be any string permissible in a URL. You may use the path to
     * pass an arbitrary string to the webhook, for example, a cluster identifier.
     *
     * Attempting to use a user or basic auth e.g. "user:password@" is not allowed. Fragments ("#...") and
     * query parameters ("?...") are not allowed, either.
     */
    public function getUrl(): string|null
    {
        return $this->url;
    }

    /**
     * url gives the location of the webhook, in standard URL form (`scheme://host:port/path`). Exactly one
     * of `url` or `service` must be specified.
     *
     * The `host` should not refer to a service running in the cluster; use the `service` field instead.
     * The host might be resolved via external DNS in some apiservers (e.g., `kube-apiserver` cannot
     * resolve in-cluster DNS as that would be a layering violation). `host` may also be an IP address.
     *
     * Please note that using `localhost` or `127.0.0.1` as a `host` is risky unless you take great care to
     * run this webhook on all hosts which run an apiserver which might need to make calls to this webhook.
     * Such installs are likely to be non-portable, i.e., not easy to turn up in a new cluster.
     *
     * The scheme must be "https"; the URL must begin with "https://".
     *
     * A path is optional, and if present may be any string permissible in a URL. You may use the path to
     * pass an arbitrary string to the webhook, for example, a cluster identifier.
     *
     * Attempting to use a user or basic auth e.g. "user:password@" is not allowed. Fragments ("#...") and
     * query parameters ("?...") are not allowed, either.
     *
     * @return static
     */
    public function setUrl(string $url): static
    {
        $this->url = $url;

        return $this;
    }
}
