<?php

declare(strict_types=1);

namespace Kcs\K8s\Api\Model\ApiExtensions\v1;

use Kcs\K8s\Attribute as Kubernetes;

/**
 * CustomResourceColumnDefinition specifies a column for server side printing.
 */
class CustomResourceColumnDefinition
{
    #[Kubernetes\Attribute('description')]
    protected string|null $description = null;

    #[Kubernetes\Attribute('format')]
    protected string|null $format = null;

    #[Kubernetes\Attribute('jsonPath', required: true)]
    protected string $jsonPath;

    #[Kubernetes\Attribute('name', required: true)]
    protected string $name;

    #[Kubernetes\Attribute('priority')]
    protected int|null $priority = null;

    #[Kubernetes\Attribute('type', required: true)]
    protected string $type;

    public function __construct(string $jsonPath, string $name, string $type)
    {
        $this->jsonPath = $jsonPath;
        $this->name = $name;
        $this->type = $type;
    }

    /**
     * description is a human readable description of this column.
     */
    public function getDescription(): string|null
    {
        return $this->description;
    }

    /**
     * description is a human readable description of this column.
     *
     * @return static
     */
    public function setDescription(string $description): static
    {
        $this->description = $description;

        return $this;
    }

    /**
     * format is an optional OpenAPI type definition for this column. The 'name' format is applied to the
     * primary identifier column to assist in clients identifying column is the resource name. See
     * https://github.com/OAI/OpenAPI-Specification/blob/master/versions/2.0.md#data-types for details.
     */
    public function getFormat(): string|null
    {
        return $this->format;
    }

    /**
     * format is an optional OpenAPI type definition for this column. The 'name' format is applied to the
     * primary identifier column to assist in clients identifying column is the resource name. See
     * https://github.com/OAI/OpenAPI-Specification/blob/master/versions/2.0.md#data-types for details.
     *
     * @return static
     */
    public function setFormat(string $format): static
    {
        $this->format = $format;

        return $this;
    }

    /**
     * jsonPath is a simple JSON path (i.e. with array notation) which is evaluated against each custom
     * resource to produce the value for this column.
     */
    public function getJsonPath(): string
    {
        return $this->jsonPath;
    }

    /**
     * jsonPath is a simple JSON path (i.e. with array notation) which is evaluated against each custom
     * resource to produce the value for this column.
     *
     * @return static
     */
    public function setJsonPath(string $jsonPath): static
    {
        $this->jsonPath = $jsonPath;

        return $this;
    }

    /**
     * name is a human readable name for the column.
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * name is a human readable name for the column.
     *
     * @return static
     */
    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    /**
     * priority is an integer defining the relative importance of this column compared to others. Lower
     * numbers are considered higher priority. Columns that may be omitted in limited space scenarios
     * should be given a priority greater than 0.
     */
    public function getPriority(): int|null
    {
        return $this->priority;
    }

    /**
     * priority is an integer defining the relative importance of this column compared to others. Lower
     * numbers are considered higher priority. Columns that may be omitted in limited space scenarios
     * should be given a priority greater than 0.
     *
     * @return static
     */
    public function setPriority(int $priority): static
    {
        $this->priority = $priority;

        return $this;
    }

    /**
     * type is an OpenAPI type definition for this column. See
     * https://github.com/OAI/OpenAPI-Specification/blob/master/versions/2.0.md#data-types for details.
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * type is an OpenAPI type definition for this column. See
     * https://github.com/OAI/OpenAPI-Specification/blob/master/versions/2.0.md#data-types for details.
     *
     * @return static
     */
    public function setType(string $type): static
    {
        $this->type = $type;

        return $this;
    }
}
