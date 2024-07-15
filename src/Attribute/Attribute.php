<?php

declare(strict_types=1);

namespace Kcs\K8s\Attribute;

#[\Attribute(\Attribute::TARGET_PROPERTY)]
class Attribute
{
    public function __construct(
        public string $name,
        public AttributeType|null $type = null,
        public string|null $model = null,
        public bool $required = false,
    ) {
    }
}
