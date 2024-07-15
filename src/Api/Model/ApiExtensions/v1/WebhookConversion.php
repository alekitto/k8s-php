<?php

declare(strict_types=1);

namespace Kcs\K8s\Api\Model\ApiExtensions\v1;

use Kcs\K8s\Attribute as Kubernetes;
use Kcs\K8s\Attribute\AttributeType;

/**
 * WebhookConversion describes how to call a conversion webhook
 */
class WebhookConversion
{
    #[Kubernetes\Attribute('clientConfig', type: AttributeType::Model, model: WebhookClientConfig::class)]
    protected WebhookClientConfig|null $clientConfig = null;

    /** @var string[] */
    #[Kubernetes\Attribute('conversionReviewVersions', required: true)]
    protected array $conversionReviewVersions;

    /** @param string[] $conversionReviewVersions */
    public function __construct(array $conversionReviewVersions)
    {
        $this->conversionReviewVersions = $conversionReviewVersions;
    }

    /**
     * clientConfig is the instructions for how to call the webhook if strategy is `Webhook`.
     */
    public function getClientConfig(): WebhookClientConfig|null
    {
        return $this->clientConfig;
    }

    /**
     * clientConfig is the instructions for how to call the webhook if strategy is `Webhook`.
     *
     * @return static
     */
    public function setClientConfig(WebhookClientConfig $clientConfig): static
    {
        $this->clientConfig = $clientConfig;

        return $this;
    }

    /**
     * conversionReviewVersions is an ordered list of preferred `ConversionReview` versions the Webhook
     * expects. The API server will use the first version in the list which it supports. If none of the
     * versions specified in this list are supported by API server, conversion will fail for the custom
     * resource. If a persisted Webhook configuration specifies allowed versions and does not include any
     * versions known to the API Server, calls to the webhook will fail.
     */
    public function getConversionReviewVersions(): array
    {
        return $this->conversionReviewVersions;
    }

    /**
     * conversionReviewVersions is an ordered list of preferred `ConversionReview` versions the Webhook
     * expects. The API server will use the first version in the list which it supports. If none of the
     * versions specified in this list are supported by API server, conversion will fail for the custom
     * resource. If a persisted Webhook configuration specifies allowed versions and does not include any
     * versions known to the API Server, calls to the webhook will fail.
     *
     * @return static
     */
    public function setConversionReviewVersions(array $conversionReviewVersions): static
    {
        $this->conversionReviewVersions = $conversionReviewVersions;

        return $this;
    }
}
