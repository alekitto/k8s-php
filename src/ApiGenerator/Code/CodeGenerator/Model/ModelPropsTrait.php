<?php

declare(strict_types=1);

namespace Kcs\K8s\ApiGenerator\Code\CodeGenerator\Model;

use Kcs\K8s\ApiGenerator\Code\ModelProperty;

trait ModelPropsTrait
{
    /**
     * @param ModelProperty[] $properties
     *
     * @return array<string, ModelProperty|null>
     */
    protected function getCoreProps(array $properties): array
    {
        $props = [
            'spec' => null,
            'metadata' => null,
            'status' => null,
        ];

        foreach ($properties as $modelProp) {
            if ($modelProp->getName() === 'metadata') {
                $props['metadata'] = $modelProp;
            }

            if ($modelProp->getName() === 'spec' || $modelProp->getName() === 'template') {
                $props['spec'] = $modelProp;
            }

            if ($modelProp->getName() !== 'status') {
                continue;
            }

            $props['status'] = $modelProp;
        }

        return $props;
    }
}
