<?php

declare(strict_types=1);

namespace Kcs\K8s\Api\Model\Api\AdmissionRegistration\v1;

use ArrayIterator;
use IteratorAggregate;
use Kcs\K8s\Api\Model\ApiMachinery\Apis\Meta\v1\ListMeta;
use Kcs\K8s\Attribute as Kubernetes;
use Kcs\K8s\Attribute\AttributeType;
use Kcs\K8s\Collection;
use Traversable;

use function iterator_to_array;

/**
 * ValidatingWebhookConfigurationList is a list of ValidatingWebhookConfiguration.
 *
 * @implements IteratorAggregate<int, ValidatingWebhookConfiguration>
 */
#[Kubernetes\Kind('ValidatingWebhookConfigurationList', group: 'admissionregistration.k8s.io', version: 'v1')]
class ValidatingWebhookConfigurationList implements IteratorAggregate
{
    #[Kubernetes\Attribute('apiVersion')]
    protected string|null $apiVersion = 'admissionregistration.k8s.io/v1';

    /** @var iterable|ValidatingWebhookConfiguration[] */
    #[Kubernetes\Attribute(
        'items',
        type: AttributeType::Collection,
        model: ValidatingWebhookConfiguration::class,
        required: true,
    )]
    protected iterable $items;

    #[Kubernetes\Attribute('kind')]
    protected string|null $kind = 'ValidatingWebhookConfigurationList';

    #[Kubernetes\Attribute('metadata', type: AttributeType::Model, model: ListMeta::class)]
    protected ListMeta|null $metadata = null;

    /** @param iterable|ValidatingWebhookConfiguration[] $items */
    public function __construct(iterable $items)
    {
        $this->items = new Collection($items);
    }

    /**
     * continue may be set if the user set a limit on the number of items returned, and indicates that the
     * server has more data available. The value is opaque and may be used to issue another request to the
     * endpoint that served this list to retrieve the next set of available objects. Continuing a
     * consistent list may not be possible if the server configuration has changed or more than a few
     * minutes have passed. The resourceVersion field returned when using this continue value will be
     * identical to the value in the first response, unless you have received this token from an error
     * message.
     */
    public function getContinue(): string|null
    {
        return $this->metadata->getContinue();
    }

    /**
     * remainingItemCount is the number of subsequent items in the list which are not included in this list
     * response. If the list request contained label or field selectors, then the number of remaining items
     * is unknown and the field will be left unset and omitted during serialization. If the list is
     * complete (either because it is not chunking or because this is the last chunk), then there are no
     * more remaining items and this field will be left unset and omitted during serialization. Servers
     * older than v1.15 do not set this field. The intended use of the remainingItemCount is *estimating*
     * the size of a collection. Clients should not rely on the remainingItemCount to be set or to be
     * exact.
     */
    public function getRemainingItemCount(): int|null
    {
        return $this->metadata->getRemainingItemCount();
    }

    /**
     * String that identifies the server's internal version of this object that can be used by clients to
     * determine when objects have changed. Value must be treated as opaque by clients and passed
     * unmodified back to the server. Populated by the system. Read-only. More info:
     * https://git.k8s.io/community/contributors/devel/sig-architecture/api-conventions.md#concurrency-control-and-consistency
     */
    public function getResourceVersion(): string|null
    {
        return $this->metadata->getResourceVersion();
    }

    /**
     * Deprecated: selfLink is a legacy read-only field that is no longer populated by the system.
     */
    public function getSelfLink(): string|null
    {
        return $this->metadata->getSelfLink();
    }

    /** @return ArrayIterator|iterable|ValidatingWebhookConfiguration[] */
    public function getIterator(): Traversable
    {
        return new ArrayIterator(iterator_to_array($this->items));
    }

    /**
     * APIVersion defines the versioned schema of this representation of an object. Servers should convert
     * recognized schemas to the latest internal value, and may reject unrecognized values. More info:
     * https://git.k8s.io/community/contributors/devel/sig-architecture/api-conventions.md#resources
     */
    public function getApiVersion(): string|null
    {
        return $this->apiVersion;
    }

    /**
     * APIVersion defines the versioned schema of this representation of an object. Servers should convert
     * recognized schemas to the latest internal value, and may reject unrecognized values. More info:
     * https://git.k8s.io/community/contributors/devel/sig-architecture/api-conventions.md#resources
     *
     * @return static
     */
    public function setApiVersion(string $apiVersion): static
    {
        $this->apiVersion = $apiVersion;

        return $this;
    }

    /**
     * List of ValidatingWebhookConfiguration.
     *
     * @return iterable|ValidatingWebhookConfiguration[]
     */
    public function getItems(): iterable
    {
        return $this->items;
    }

    /**
     * List of ValidatingWebhookConfiguration.
     *
     * @return static
     */
    public function setItems(iterable $items): static
    {
        $this->items = $items;

        return $this;
    }

    /** @return static */
    public function addItems(ValidatingWebhookConfiguration $item): static
    {
        if (! $this->items) {
            $this->items = new Collection();
        }

        $this->items[] = $item;

        return $this;
    }

    /**
     * Kind is a string value representing the REST resource this object represents. Servers may infer this
     * from the endpoint the client submits requests to. Cannot be updated. In CamelCase. More info:
     * https://git.k8s.io/community/contributors/devel/sig-architecture/api-conventions.md#types-kinds
     */
    public function getKind(): string|null
    {
        return $this->kind;
    }

    /**
     * Kind is a string value representing the REST resource this object represents. Servers may infer this
     * from the endpoint the client submits requests to. Cannot be updated. In CamelCase. More info:
     * https://git.k8s.io/community/contributors/devel/sig-architecture/api-conventions.md#types-kinds
     *
     * @return static
     */
    public function setKind(string $kind): static
    {
        $this->kind = $kind;

        return $this;
    }

    /**
     * Standard list metadata. More info:
     * https://git.k8s.io/community/contributors/devel/sig-architecture/api-conventions.md#types-kinds
     */
    public function getMetadata(): ListMeta|null
    {
        return $this->metadata;
    }

    /**
     * Standard list metadata. More info:
     * https://git.k8s.io/community/contributors/devel/sig-architecture/api-conventions.md#types-kinds
     *
     * @return static
     */
    public function setMetadata(ListMeta $metadata): static
    {
        $this->metadata = $metadata;

        return $this;
    }
}
