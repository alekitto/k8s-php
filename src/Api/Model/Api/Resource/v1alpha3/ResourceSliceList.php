<?php

declare(strict_types=1);

namespace Kcs\K8s\Api\Model\Api\Resource\v1alpha3;

use ArrayIterator;
use IteratorAggregate;
use Kcs\K8s\Api\Model\ApiMachinery\Apis\Meta\v1\ListMeta;
use Kcs\K8s\Attribute as Kubernetes;
use Kcs\K8s\Attribute\AttributeType;
use Kcs\K8s\Collection;
use Traversable;

use function iterator_to_array;

/**
 * ResourceSliceList is a collection of ResourceSlices.
 *
 * @implements IteratorAggregate<int, ResourceSlice>
 */
#[Kubernetes\Kind('ResourceSliceList', group: 'resource.k8s.io', version: 'v1alpha3')]
class ResourceSliceList implements IteratorAggregate
{
    #[Kubernetes\Attribute('apiVersion')]
    protected string|null $apiVersion = 'resource.k8s.io/v1alpha3';

    /** @var iterable|ResourceSlice[] */
    #[Kubernetes\Attribute('items', type: AttributeType::Collection, model: ResourceSlice::class, required: true)]
    protected iterable $items;

    #[Kubernetes\Attribute('kind')]
    protected string|null $kind = 'ResourceSliceList';

    #[Kubernetes\Attribute('listMeta', type: AttributeType::Model, model: ListMeta::class)]
    protected ListMeta|null $listMeta = null;

    /** @param iterable|ResourceSlice[] $items */
    public function __construct(iterable $items)
    {
        $this->items = new Collection($items);
    }

    /** @return ArrayIterator|iterable|ResourceSlice[] */
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
     * Items is the list of resource ResourceSlices.
     *
     * @return iterable|ResourceSlice[]
     */
    public function getItems(): iterable
    {
        return $this->items;
    }

    /**
     * Items is the list of resource ResourceSlices.
     *
     * @return static
     */
    public function setItems(iterable $items): static
    {
        $this->items = $items;

        return $this;
    }

    /** @return static */
    public function addItems(ResourceSlice $item): static
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
     * Standard list metadata
     */
    public function getListMeta(): ListMeta|null
    {
        return $this->listMeta;
    }

    /**
     * Standard list metadata
     *
     * @return static
     */
    public function setListMeta(ListMeta $listMeta): static
    {
        $this->listMeta = $listMeta;

        return $this;
    }
}
