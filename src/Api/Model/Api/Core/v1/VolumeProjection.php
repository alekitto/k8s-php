<?php

declare(strict_types=1);

namespace Kcs\K8s\Api\Model\Api\Core\v1;

use Kcs\K8s\Attribute as Kubernetes;
use Kcs\K8s\Attribute\AttributeType;

/**
 * Projection that may be projected along with other supported volume types
 */
class VolumeProjection
{
    #[Kubernetes\Attribute('clusterTrustBundle', type: AttributeType::Model, model: ClusterTrustBundleProjection::class)]
    protected ClusterTrustBundleProjection|null $clusterTrustBundle = null;

    #[Kubernetes\Attribute('configMap', type: AttributeType::Model, model: ConfigMapProjection::class)]
    protected ConfigMapProjection|null $configMap = null;

    #[Kubernetes\Attribute('downwardAPI', type: AttributeType::Model, model: DownwardAPIProjection::class)]
    protected DownwardAPIProjection|null $downwardAPI = null;

    #[Kubernetes\Attribute('secret', type: AttributeType::Model, model: SecretProjection::class)]
    protected SecretProjection|null $secret = null;

    #[Kubernetes\Attribute('serviceAccountToken', type: AttributeType::Model, model: ServiceAccountTokenProjection::class)]
    protected ServiceAccountTokenProjection|null $serviceAccountToken = null;

    public function __construct(
        ClusterTrustBundleProjection|null $clusterTrustBundle = null,
        ConfigMapProjection|null $configMap = null,
        DownwardAPIProjection|null $downwardAPI = null,
        SecretProjection|null $secret = null,
        ServiceAccountTokenProjection|null $serviceAccountToken = null,
    ) {
        $this->clusterTrustBundle = $clusterTrustBundle;
        $this->configMap = $configMap;
        $this->downwardAPI = $downwardAPI;
        $this->secret = $secret;
        $this->serviceAccountToken = $serviceAccountToken;
    }

    /**
     * ClusterTrustBundle allows a pod to access the `.spec.trustBundle` field of ClusterTrustBundle
     * objects in an auto-updating file.
     *
     * Alpha, gated by the ClusterTrustBundleProjection feature gate.
     *
     * ClusterTrustBundle objects can either be selected by name, or by the combination of signer name and
     * a label selector.
     *
     * Kubelet performs aggressive normalization of the PEM contents written into the pod filesystem.
     * Esoteric PEM features such as inter-block comments and block headers are stripped.  Certificates are
     * deduplicated. The ordering of certificates within the file is arbitrary, and Kubelet may change the
     * order over time.
     */
    public function getClusterTrustBundle(): ClusterTrustBundleProjection|null
    {
        return $this->clusterTrustBundle;
    }

    /**
     * ClusterTrustBundle allows a pod to access the `.spec.trustBundle` field of ClusterTrustBundle
     * objects in an auto-updating file.
     *
     * Alpha, gated by the ClusterTrustBundleProjection feature gate.
     *
     * ClusterTrustBundle objects can either be selected by name, or by the combination of signer name and
     * a label selector.
     *
     * Kubelet performs aggressive normalization of the PEM contents written into the pod filesystem.
     * Esoteric PEM features such as inter-block comments and block headers are stripped.  Certificates are
     * deduplicated. The ordering of certificates within the file is arbitrary, and Kubelet may change the
     * order over time.
     *
     * @return static
     */
    public function setClusterTrustBundle(ClusterTrustBundleProjection $clusterTrustBundle): static
    {
        $this->clusterTrustBundle = $clusterTrustBundle;

        return $this;
    }

    /**
     * configMap information about the configMap data to project
     */
    public function getConfigMap(): ConfigMapProjection|null
    {
        return $this->configMap;
    }

    /**
     * configMap information about the configMap data to project
     *
     * @return static
     */
    public function setConfigMap(ConfigMapProjection $configMap): static
    {
        $this->configMap = $configMap;

        return $this;
    }

    /**
     * downwardAPI information about the downwardAPI data to project
     */
    public function getDownwardAPI(): DownwardAPIProjection|null
    {
        return $this->downwardAPI;
    }

    /**
     * downwardAPI information about the downwardAPI data to project
     *
     * @return static
     */
    public function setDownwardAPI(DownwardAPIProjection $downwardAPI): static
    {
        $this->downwardAPI = $downwardAPI;

        return $this;
    }

    /**
     * secret information about the secret data to project
     */
    public function getSecret(): SecretProjection|null
    {
        return $this->secret;
    }

    /**
     * secret information about the secret data to project
     *
     * @return static
     */
    public function setSecret(SecretProjection $secret): static
    {
        $this->secret = $secret;

        return $this;
    }

    /**
     * serviceAccountToken is information about the serviceAccountToken data to project
     */
    public function getServiceAccountToken(): ServiceAccountTokenProjection|null
    {
        return $this->serviceAccountToken;
    }

    /**
     * serviceAccountToken is information about the serviceAccountToken data to project
     *
     * @return static
     */
    public function setServiceAccountToken(ServiceAccountTokenProjection $serviceAccountToken): static
    {
        $this->serviceAccountToken = $serviceAccountToken;

        return $this;
    }
}
