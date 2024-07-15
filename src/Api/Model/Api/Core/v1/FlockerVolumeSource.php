<?php

declare(strict_types=1);

namespace Kcs\K8s\Api\Model\Api\Core\v1;

use Kcs\K8s\Attribute as Kubernetes;

/**
 * Represents a Flocker volume mounted by the Flocker agent. One and only one of datasetName and
 * datasetUUID should be set. Flocker volumes do not support ownership management or SELinux
 * relabeling.
 */
class FlockerVolumeSource
{
    #[Kubernetes\Attribute('datasetName')]
    protected string|null $datasetName = null;

    #[Kubernetes\Attribute('datasetUUID')]
    protected string|null $datasetUUID = null;

    public function __construct(string|null $datasetName = null, string|null $datasetUUID = null)
    {
        $this->datasetName = $datasetName;
        $this->datasetUUID = $datasetUUID;
    }

    /**
     * datasetName is Name of the dataset stored as metadata -> name on the dataset for Flocker should be
     * considered as deprecated
     */
    public function getDatasetName(): string|null
    {
        return $this->datasetName;
    }

    /**
     * datasetName is Name of the dataset stored as metadata -> name on the dataset for Flocker should be
     * considered as deprecated
     *
     * @return static
     */
    public function setDatasetName(string $datasetName): static
    {
        $this->datasetName = $datasetName;

        return $this;
    }

    /**
     * datasetUUID is the UUID of the dataset. This is unique identifier of a Flocker dataset
     */
    public function getDatasetUUID(): string|null
    {
        return $this->datasetUUID;
    }

    /**
     * datasetUUID is the UUID of the dataset. This is unique identifier of a Flocker dataset
     *
     * @return static
     */
    public function setDatasetUUID(string $datasetUUID): static
    {
        $this->datasetUUID = $datasetUUID;

        return $this;
    }
}
