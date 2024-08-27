<?php

declare(strict_types=1);

namespace Kcs\K8s\Api\Model\Api\Core\v1;

use Kcs\K8s\Api\Model\ApiMachinery\Apis\Meta\v1\LabelSelector;
use Kcs\K8s\Attribute as Kubernetes;
use Kcs\K8s\Attribute\AttributeType;

/**
 * PersistentVolumeClaimSpec describes the common attributes of storage devices and allows a Source for
 * provider-specific attributes
 */
class PersistentVolumeClaimSpec
{
    /** @var string[]|null */
    #[Kubernetes\Attribute('accessModes')]
    protected array|null $accessModes = null;

    #[Kubernetes\Attribute('dataSource', type: AttributeType::Model, model: TypedLocalObjectReference::class)]
    protected TypedLocalObjectReference|null $dataSource = null;

    #[Kubernetes\Attribute('dataSourceRef', type: AttributeType::Model, model: TypedObjectReference::class)]
    protected TypedObjectReference|null $dataSourceRef = null;

    #[Kubernetes\Attribute('resources', type: AttributeType::Model, model: VolumeResourceRequirements::class)]
    protected VolumeResourceRequirements|null $resources = null;

    #[Kubernetes\Attribute('selector', type: AttributeType::Model, model: LabelSelector::class)]
    protected LabelSelector|null $selector = null;

    #[Kubernetes\Attribute('storageClassName')]
    protected string|null $storageClassName = null;

    #[Kubernetes\Attribute('volumeAttributesClassName')]
    protected string|null $volumeAttributesClassName = null;

    #[Kubernetes\Attribute('volumeMode')]
    protected string|null $volumeMode = null;

    #[Kubernetes\Attribute('volumeName')]
    protected string|null $volumeName = null;

    /**
     * accessModes contains the desired access modes the volume should have. More info:
     * https://kubernetes.io/docs/concepts/storage/persistent-volumes#access-modes-1
     */
    public function getAccessModes(): array|null
    {
        return $this->accessModes;
    }

    /**
     * accessModes contains the desired access modes the volume should have. More info:
     * https://kubernetes.io/docs/concepts/storage/persistent-volumes#access-modes-1
     *
     * @return static
     */
    public function setAccessModes(array $accessModes): static
    {
        $this->accessModes = $accessModes;

        return $this;
    }

    /**
     * dataSource field can be used to specify either: * An existing VolumeSnapshot object
     * (snapshot.storage.k8s.io/VolumeSnapshot) * An existing PVC (PersistentVolumeClaim) If the
     * provisioner or an external controller can support the specified data source, it will create a new
     * volume based on the contents of the specified data source. When the AnyVolumeDataSource feature gate
     * is enabled, dataSource contents will be copied to dataSourceRef, and dataSourceRef contents will be
     * copied to dataSource when dataSourceRef.namespace is not specified. If the namespace is specified,
     * then dataSourceRef will not be copied to dataSource.
     */
    public function getDataSource(): TypedLocalObjectReference|null
    {
        return $this->dataSource;
    }

    /**
     * dataSource field can be used to specify either: * An existing VolumeSnapshot object
     * (snapshot.storage.k8s.io/VolumeSnapshot) * An existing PVC (PersistentVolumeClaim) If the
     * provisioner or an external controller can support the specified data source, it will create a new
     * volume based on the contents of the specified data source. When the AnyVolumeDataSource feature gate
     * is enabled, dataSource contents will be copied to dataSourceRef, and dataSourceRef contents will be
     * copied to dataSource when dataSourceRef.namespace is not specified. If the namespace is specified,
     * then dataSourceRef will not be copied to dataSource.
     *
     * @return static
     */
    public function setDataSource(TypedLocalObjectReference $dataSource): static
    {
        $this->dataSource = $dataSource;

        return $this;
    }

    /**
     * dataSourceRef specifies the object from which to populate the volume with data, if a non-empty
     * volume is desired. This may be any object from a non-empty API group (non core object) or a
     * PersistentVolumeClaim object. When this field is specified, volume binding will only succeed if the
     * type of the specified object matches some installed volume populator or dynamic provisioner. This
     * field will replace the functionality of the dataSource field and as such if both fields are
     * non-empty, they must have the same value. For backwards compatibility, when namespace isn't
     * specified in dataSourceRef, both fields (dataSource and dataSourceRef) will be set to the same value
     * automatically if one of them is empty and the other is non-empty. When namespace is specified in
     * dataSourceRef, dataSource isn't set to the same value and must be empty. There are three important
     * differences between dataSource and dataSourceRef: * While dataSource only allows two specific types
     * of objects, dataSourceRef
     *   allows any non-core object, as well as PersistentVolumeClaim objects.
     * * While dataSource ignores disallowed values (dropping them), dataSourceRef
     *   preserves all values, and generates an error if a disallowed value is
     *   specified.
     * * While dataSource only allows local objects, dataSourceRef allows objects
     *   in any namespaces.
     * (Beta) Using this field requires the AnyVolumeDataSource feature gate to be enabled. (Alpha) Using
     * the namespace field of dataSourceRef requires the CrossNamespaceVolumeDataSource feature gate to be
     * enabled.
     */
    public function getDataSourceRef(): TypedObjectReference|null
    {
        return $this->dataSourceRef;
    }

    /**
     * dataSourceRef specifies the object from which to populate the volume with data, if a non-empty
     * volume is desired. This may be any object from a non-empty API group (non core object) or a
     * PersistentVolumeClaim object. When this field is specified, volume binding will only succeed if the
     * type of the specified object matches some installed volume populator or dynamic provisioner. This
     * field will replace the functionality of the dataSource field and as such if both fields are
     * non-empty, they must have the same value. For backwards compatibility, when namespace isn't
     * specified in dataSourceRef, both fields (dataSource and dataSourceRef) will be set to the same value
     * automatically if one of them is empty and the other is non-empty. When namespace is specified in
     * dataSourceRef, dataSource isn't set to the same value and must be empty. There are three important
     * differences between dataSource and dataSourceRef: * While dataSource only allows two specific types
     * of objects, dataSourceRef
     *   allows any non-core object, as well as PersistentVolumeClaim objects.
     * * While dataSource ignores disallowed values (dropping them), dataSourceRef
     *   preserves all values, and generates an error if a disallowed value is
     *   specified.
     * * While dataSource only allows local objects, dataSourceRef allows objects
     *   in any namespaces.
     * (Beta) Using this field requires the AnyVolumeDataSource feature gate to be enabled. (Alpha) Using
     * the namespace field of dataSourceRef requires the CrossNamespaceVolumeDataSource feature gate to be
     * enabled.
     *
     * @return static
     */
    public function setDataSourceRef(TypedObjectReference $dataSourceRef): static
    {
        $this->dataSourceRef = $dataSourceRef;

        return $this;
    }

    /**
     * resources represents the minimum resources the volume should have. If RecoverVolumeExpansionFailure
     * feature is enabled users are allowed to specify resource requirements that are lower than previous
     * value but must still be higher than capacity recorded in the status field of the claim. More info:
     * https://kubernetes.io/docs/concepts/storage/persistent-volumes#resources
     */
    public function getResources(): VolumeResourceRequirements|null
    {
        return $this->resources;
    }

    /**
     * resources represents the minimum resources the volume should have. If RecoverVolumeExpansionFailure
     * feature is enabled users are allowed to specify resource requirements that are lower than previous
     * value but must still be higher than capacity recorded in the status field of the claim. More info:
     * https://kubernetes.io/docs/concepts/storage/persistent-volumes#resources
     *
     * @return static
     */
    public function setResources(VolumeResourceRequirements $resources): static
    {
        $this->resources = $resources;

        return $this;
    }

    /**
     * selector is a label query over volumes to consider for binding.
     */
    public function getSelector(): LabelSelector|null
    {
        return $this->selector;
    }

    /**
     * selector is a label query over volumes to consider for binding.
     *
     * @return static
     */
    public function setSelector(LabelSelector $selector): static
    {
        $this->selector = $selector;

        return $this;
    }

    /**
     * storageClassName is the name of the StorageClass required by the claim. More info:
     * https://kubernetes.io/docs/concepts/storage/persistent-volumes#class-1
     */
    public function getStorageClassName(): string|null
    {
        return $this->storageClassName;
    }

    /**
     * storageClassName is the name of the StorageClass required by the claim. More info:
     * https://kubernetes.io/docs/concepts/storage/persistent-volumes#class-1
     *
     * @return static
     */
    public function setStorageClassName(string $storageClassName): static
    {
        $this->storageClassName = $storageClassName;

        return $this;
    }

    /**
     * volumeAttributesClassName may be used to set the VolumeAttributesClass used by this claim. If
     * specified, the CSI driver will create or update the volume with the attributes defined in the
     * corresponding VolumeAttributesClass. This has a different purpose than storageClassName, it can be
     * changed after the claim is created. An empty string value means that no VolumeAttributesClass will
     * be applied to the claim but it's not allowed to reset this field to empty string once it is set. If
     * unspecified and the PersistentVolumeClaim is unbound, the default VolumeAttributesClass will be set
     * by the persistentvolume controller if it exists. If the resource referred to by
     * volumeAttributesClass does not exist, this PersistentVolumeClaim will be set to a Pending state, as
     * reflected by the modifyVolumeStatus field, until such as a resource exists. More info:
     * https://kubernetes.io/docs/concepts/storage/volume-attributes-classes/ (Beta) Using this field
     * requires the VolumeAttributesClass feature gate to be enabled (off by default).
     */
    public function getVolumeAttributesClassName(): string|null
    {
        return $this->volumeAttributesClassName;
    }

    /**
     * volumeAttributesClassName may be used to set the VolumeAttributesClass used by this claim. If
     * specified, the CSI driver will create or update the volume with the attributes defined in the
     * corresponding VolumeAttributesClass. This has a different purpose than storageClassName, it can be
     * changed after the claim is created. An empty string value means that no VolumeAttributesClass will
     * be applied to the claim but it's not allowed to reset this field to empty string once it is set. If
     * unspecified and the PersistentVolumeClaim is unbound, the default VolumeAttributesClass will be set
     * by the persistentvolume controller if it exists. If the resource referred to by
     * volumeAttributesClass does not exist, this PersistentVolumeClaim will be set to a Pending state, as
     * reflected by the modifyVolumeStatus field, until such as a resource exists. More info:
     * https://kubernetes.io/docs/concepts/storage/volume-attributes-classes/ (Beta) Using this field
     * requires the VolumeAttributesClass feature gate to be enabled (off by default).
     *
     * @return static
     */
    public function setVolumeAttributesClassName(string $volumeAttributesClassName): static
    {
        $this->volumeAttributesClassName = $volumeAttributesClassName;

        return $this;
    }

    /**
     * volumeMode defines what type of volume is required by the claim. Value of Filesystem is implied when
     * not included in claim spec.
     */
    public function getVolumeMode(): string|null
    {
        return $this->volumeMode;
    }

    /**
     * volumeMode defines what type of volume is required by the claim. Value of Filesystem is implied when
     * not included in claim spec.
     *
     * @return static
     */
    public function setVolumeMode(string $volumeMode): static
    {
        $this->volumeMode = $volumeMode;

        return $this;
    }

    /**
     * volumeName is the binding reference to the PersistentVolume backing this claim.
     */
    public function getVolumeName(): string|null
    {
        return $this->volumeName;
    }

    /**
     * volumeName is the binding reference to the PersistentVolume backing this claim.
     *
     * @return static
     */
    public function setVolumeName(string $volumeName): static
    {
        $this->volumeName = $volumeName;

        return $this;
    }
}
