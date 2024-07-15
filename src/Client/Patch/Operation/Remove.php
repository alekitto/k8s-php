<?php

declare(strict_types=1);

namespace Kcs\K8s\Client\Patch\Operation;

class Remove extends AbstractOperation
{
    public function __construct(string $path)
    {
        parent::__construct(
            'remove',
            $path,
        );
    }
}
