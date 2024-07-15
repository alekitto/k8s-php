<?php

declare(strict_types=1);

namespace Kcs\K8s\Attribute;

enum AttributeType
{
    case Model;
    case Collection;
    case DateTime;
}
