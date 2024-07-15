<?php

declare(strict_types=1);

namespace Kcs\K8s\Api\Model\ApiExtensions\v1;

use Kcs\K8s\Attribute as Kubernetes;
use Kcs\K8s\Attribute\AttributeType;

/**
 * CustomResourceConversion describes how to convert different versions of a CR.
 */
class CustomResourceConversion
{
    #[Kubernetes\Attribute('strategy', required: true)]
    protected string $strategy;

    #[Kubernetes\Attribute('webhook', type: AttributeType::Model, model: WebhookConversion::class)]
    protected WebhookConversion|null $webhook = null;

    public function __construct(string $strategy)
    {
        $this->strategy = $strategy;
    }

    /**
     * strategy specifies how custom resources are converted between versions. Allowed values are: -
     * `"None"`: The converter only change the apiVersion and would not touch any other field in the custom
     * resource. - `"Webhook"`: API Server will call to an external webhook to do the conversion.
     * Additional information
     *   is needed for this option. This requires spec.preserveUnknownFields to be false, and
     * spec.conversion.webhook to be set.
     */
    public function getStrategy(): string
    {
        return $this->strategy;
    }

    /**
     * strategy specifies how custom resources are converted between versions. Allowed values are: -
     * `"None"`: The converter only change the apiVersion and would not touch any other field in the custom
     * resource. - `"Webhook"`: API Server will call to an external webhook to do the conversion.
     * Additional information
     *   is needed for this option. This requires spec.preserveUnknownFields to be false, and
     * spec.conversion.webhook to be set.
     *
     * @return static
     */
    public function setStrategy(string $strategy): static
    {
        $this->strategy = $strategy;

        return $this;
    }

    /**
     * webhook describes how to call the conversion webhook. Required when `strategy` is set to
     * `"Webhook"`.
     */
    public function getWebhook(): WebhookConversion|null
    {
        return $this->webhook;
    }

    /**
     * webhook describes how to call the conversion webhook. Required when `strategy` is set to
     * `"Webhook"`.
     *
     * @return static
     */
    public function setWebhook(WebhookConversion $webhook): static
    {
        $this->webhook = $webhook;

        return $this;
    }
}
