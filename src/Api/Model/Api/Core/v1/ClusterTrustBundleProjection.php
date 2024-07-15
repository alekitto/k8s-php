<?php

declare(strict_types=1);

namespace Kcs\K8s\Api\Model\Api\Core\v1;

use Kcs\K8s\Api\Model\ApiMachinery\Apis\Meta\v1\LabelSelector;
use Kcs\K8s\Attribute as Kubernetes;
use Kcs\K8s\Attribute\AttributeType;

/**
 * ClusterTrustBundleProjection describes how to select a set of ClusterTrustBundle objects and project
 * their contents into the pod filesystem.
 */
class ClusterTrustBundleProjection
{
    #[Kubernetes\Attribute('labelSelector', type: AttributeType::Model, model: LabelSelector::class)]
    protected LabelSelector|null $labelSelector = null;

    #[Kubernetes\Attribute('name')]
    protected string|null $name = null;

    #[Kubernetes\Attribute('optional')]
    protected bool|null $optional = null;

    #[Kubernetes\Attribute('path', required: true)]
    protected string $path;

    #[Kubernetes\Attribute('signerName')]
    protected string|null $signerName = null;

    public function __construct(string $path)
    {
        $this->path = $path;
    }

    /**
     * Select all ClusterTrustBundles that match this label selector.  Only has effect if signerName is
     * set.  Mutually-exclusive with name.  If unset, interpreted as "match nothing".  If set but empty,
     * interpreted as "match everything".
     */
    public function getLabelSelector(): LabelSelector|null
    {
        return $this->labelSelector;
    }

    /**
     * Select all ClusterTrustBundles that match this label selector.  Only has effect if signerName is
     * set.  Mutually-exclusive with name.  If unset, interpreted as "match nothing".  If set but empty,
     * interpreted as "match everything".
     *
     * @return static
     */
    public function setLabelSelector(LabelSelector $labelSelector): static
    {
        $this->labelSelector = $labelSelector;

        return $this;
    }

    /**
     * Select a single ClusterTrustBundle by object name.  Mutually-exclusive with signerName and
     * labelSelector.
     */
    public function getName(): string|null
    {
        return $this->name;
    }

    /**
     * Select a single ClusterTrustBundle by object name.  Mutually-exclusive with signerName and
     * labelSelector.
     *
     * @return static
     */
    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    /**
     * If true, don't block pod startup if the referenced ClusterTrustBundle(s) aren't available.  If using
     * name, then the named ClusterTrustBundle is allowed not to exist.  If using signerName, then the
     * combination of signerName and labelSelector is allowed to match zero ClusterTrustBundles.
     */
    public function isOptional(): bool|null
    {
        return $this->optional;
    }

    /**
     * If true, don't block pod startup if the referenced ClusterTrustBundle(s) aren't available.  If using
     * name, then the named ClusterTrustBundle is allowed not to exist.  If using signerName, then the
     * combination of signerName and labelSelector is allowed to match zero ClusterTrustBundles.
     *
     * @return static
     */
    public function setIsOptional(bool $optional): static
    {
        $this->optional = $optional;

        return $this;
    }

    /**
     * Relative path from the volume root to write the bundle.
     */
    public function getPath(): string
    {
        return $this->path;
    }

    /**
     * Relative path from the volume root to write the bundle.
     *
     * @return static
     */
    public function setPath(string $path): static
    {
        $this->path = $path;

        return $this;
    }

    /**
     * Select all ClusterTrustBundles that match this signer name. Mutually-exclusive with name.  The
     * contents of all selected ClusterTrustBundles will be unified and deduplicated.
     */
    public function getSignerName(): string|null
    {
        return $this->signerName;
    }

    /**
     * Select all ClusterTrustBundles that match this signer name. Mutually-exclusive with name.  The
     * contents of all selected ClusterTrustBundles will be unified and deduplicated.
     *
     * @return static
     */
    public function setSignerName(string $signerName): static
    {
        $this->signerName = $signerName;

        return $this;
    }
}
