<?php

declare(strict_types=1);

namespace Kcs\K8s\Attribute;

use Attribute;

#[Attribute(Attribute::TARGET_CLASS)]
class Kind
{
    public function __construct(
        public string $kind,
        public string $version,
        public string|null $group = null,
    ) {
    }
}
