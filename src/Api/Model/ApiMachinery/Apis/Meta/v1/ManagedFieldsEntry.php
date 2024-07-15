<?php

declare(strict_types=1);

namespace Kcs\K8s\Api\Model\ApiMachinery\Apis\Meta\v1;

use DateTimeInterface;
use Kcs\K8s\Attribute as Kubernetes;
use Kcs\K8s\Attribute\AttributeType;

/**
 * ManagedFieldsEntry is a workflow-id, a FieldSet and the group version of the resource that the
 * fieldset applies to.
 */
class ManagedFieldsEntry
{
    #[Kubernetes\Attribute('apiVersion')]
    protected string|null $apiVersion = '';

    #[Kubernetes\Attribute('fieldsType')]
    protected string|null $fieldsType = null;

    #[Kubernetes\Attribute('fieldsV1')]
    protected object|null $fieldsV1 = null;

    #[Kubernetes\Attribute('manager')]
    protected string|null $manager = null;

    #[Kubernetes\Attribute('operation')]
    protected string|null $operation = null;

    #[Kubernetes\Attribute('subresource')]
    protected string|null $subresource = null;

    #[Kubernetes\Attribute('time', type: AttributeType::DateTime)]
    protected DateTimeInterface|null $time = null;

    /**
     * APIVersion defines the version of this resource that this field set applies to. The format is
     * "group/version" just like the top-level APIVersion field. It is necessary to track the version of a
     * field set because it cannot be automatically converted.
     */
    public function getApiVersion(): string|null
    {
        return $this->apiVersion;
    }

    /**
     * APIVersion defines the version of this resource that this field set applies to. The format is
     * "group/version" just like the top-level APIVersion field. It is necessary to track the version of a
     * field set because it cannot be automatically converted.
     *
     * @return static
     */
    public function setApiVersion(string $apiVersion): static
    {
        $this->apiVersion = $apiVersion;

        return $this;
    }

    /**
     * FieldsType is the discriminator for the different fields format and version. There is currently only
     * one possible value: "FieldsV1"
     */
    public function getFieldsType(): string|null
    {
        return $this->fieldsType;
    }

    /**
     * FieldsType is the discriminator for the different fields format and version. There is currently only
     * one possible value: "FieldsV1"
     *
     * @return static
     */
    public function setFieldsType(string $fieldsType): static
    {
        $this->fieldsType = $fieldsType;

        return $this;
    }

    /**
     * FieldsV1 holds the first JSON version format as described in the "FieldsV1" type.
     */
    public function getFieldsV1(): object
    {
        return $this->fieldsV1;
    }

    /**
     * FieldsV1 holds the first JSON version format as described in the "FieldsV1" type.
     *
     * @return static
     */
    public function setFieldsV1(object $fieldsV1): static
    {
        $this->fieldsV1 = $fieldsV1;

        return $this;
    }

    /**
     * Manager is an identifier of the workflow managing these fields.
     */
    public function getManager(): string|null
    {
        return $this->manager;
    }

    /**
     * Manager is an identifier of the workflow managing these fields.
     *
     * @return static
     */
    public function setManager(string $manager): static
    {
        $this->manager = $manager;

        return $this;
    }

    /**
     * Operation is the type of operation which lead to this ManagedFieldsEntry being created. The only
     * valid values for this field are 'Apply' and 'Update'.
     */
    public function getOperation(): string|null
    {
        return $this->operation;
    }

    /**
     * Operation is the type of operation which lead to this ManagedFieldsEntry being created. The only
     * valid values for this field are 'Apply' and 'Update'.
     *
     * @return static
     */
    public function setOperation(string $operation): static
    {
        $this->operation = $operation;

        return $this;
    }

    /**
     * Subresource is the name of the subresource used to update that object, or empty string if the object
     * was updated through the main resource. The value of this field is used to distinguish between
     * managers, even if they share the same name. For example, a status update will be distinct from a
     * regular update using the same manager name. Note that the APIVersion field is not related to the
     * Subresource field and it always corresponds to the version of the main resource.
     */
    public function getSubresource(): string|null
    {
        return $this->subresource;
    }

    /**
     * Subresource is the name of the subresource used to update that object, or empty string if the object
     * was updated through the main resource. The value of this field is used to distinguish between
     * managers, even if they share the same name. For example, a status update will be distinct from a
     * regular update using the same manager name. Note that the APIVersion field is not related to the
     * Subresource field and it always corresponds to the version of the main resource.
     *
     * @return static
     */
    public function setSubresource(string $subresource): static
    {
        $this->subresource = $subresource;

        return $this;
    }

    /**
     * Time is the timestamp of when the ManagedFields entry was added. The timestamp will also be updated
     * if a field is added, the manager changes any of the owned fields value or removes a field. The
     * timestamp does not update when a field is removed from the entry because another manager took it
     * over.
     */
    public function getTime(): DateTimeInterface|null
    {
        return $this->time;
    }

    /**
     * Time is the timestamp of when the ManagedFields entry was added. The timestamp will also be updated
     * if a field is added, the manager changes any of the owned fields value or removes a field. The
     * timestamp does not update when a field is removed from the entry because another manager took it
     * over.
     *
     * @return static
     */
    public function setTime(DateTimeInterface $time): static
    {
        $this->time = $time;

        return $this;
    }
}
