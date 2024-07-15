<?php

declare(strict_types=1);

namespace Kcs\K8s;

interface PatchInterface
{
    /**
     * The array representation of the patch data to be sent.
     */
    public function toArray(): array;

    /**
     * The HTTP content-type specific to this patch.
     */
    public function getContentType(): string;
}
