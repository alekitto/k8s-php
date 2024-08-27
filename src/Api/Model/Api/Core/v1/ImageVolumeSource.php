<?php

declare(strict_types=1);

namespace Kcs\K8s\Api\Model\Api\Core\v1;

use Kcs\K8s\Attribute as Kubernetes;

/**
 * ImageVolumeSource represents a image volume resource.
 */
class ImageVolumeSource
{
    #[Kubernetes\Attribute('pullPolicy')]
    protected string|null $pullPolicy = null;

    #[Kubernetes\Attribute('reference')]
    protected string|null $reference = null;

    public function __construct(string|null $pullPolicy = null, string|null $reference = null)
    {
        $this->pullPolicy = $pullPolicy;
        $this->reference = $reference;
    }

    /**
     * Policy for pulling OCI objects. Possible values are: Always: the kubelet always attempts to pull the
     * reference. Container creation will fail If the pull fails. Never: the kubelet never pulls the
     * reference and only uses a local image or artifact. Container creation will fail if the reference
     * isn't present. IfNotPresent: the kubelet pulls if the reference isn't already present on disk.
     * Container creation will fail if the reference isn't present and the pull fails. Defaults to Always
     * if :latest tag is specified, or IfNotPresent otherwise.
     */
    public function getPullPolicy(): string|null
    {
        return $this->pullPolicy;
    }

    /**
     * Policy for pulling OCI objects. Possible values are: Always: the kubelet always attempts to pull the
     * reference. Container creation will fail If the pull fails. Never: the kubelet never pulls the
     * reference and only uses a local image or artifact. Container creation will fail if the reference
     * isn't present. IfNotPresent: the kubelet pulls if the reference isn't already present on disk.
     * Container creation will fail if the reference isn't present and the pull fails. Defaults to Always
     * if :latest tag is specified, or IfNotPresent otherwise.
     *
     * @return static
     */
    public function setPullPolicy(string $pullPolicy): static
    {
        $this->pullPolicy = $pullPolicy;

        return $this;
    }

    /**
     * Required: Image or artifact reference to be used. Behaves in the same way as
     * pod.spec.containers[*].image. Pull secrets will be assembled in the same way as for the container
     * image by looking up node credentials, SA image pull secrets, and pod spec image pull secrets. More
     * info: https://kubernetes.io/docs/concepts/containers/images This field is optional to allow higher
     * level config management to default or override container images in workload controllers like
     * Deployments and StatefulSets.
     */
    public function getReference(): string|null
    {
        return $this->reference;
    }

    /**
     * Required: Image or artifact reference to be used. Behaves in the same way as
     * pod.spec.containers[*].image. Pull secrets will be assembled in the same way as for the container
     * image by looking up node credentials, SA image pull secrets, and pod spec image pull secrets. More
     * info: https://kubernetes.io/docs/concepts/containers/images This field is optional to allow higher
     * level config management to default or override container images in workload controllers like
     * Deployments and StatefulSets.
     *
     * @return static
     */
    public function setReference(string $reference): static
    {
        $this->reference = $reference;

        return $this;
    }
}
