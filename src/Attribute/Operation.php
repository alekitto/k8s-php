<?php

declare(strict_types=1);

namespace Kcs\K8s\Attribute;

use Attribute;

#[Attribute(Attribute::TARGET_CLASS | Attribute::IS_REPEATABLE)]
class Operation
{
    public function __construct(
        public string $type,
        public string $path,
        public string|null $body = null,
        public string|null $response = null,
    ) {
    }
}
