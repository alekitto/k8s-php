<?php

declare(strict_types=1);

namespace Kcs\K8s\Client\Exception;

use Kcs\K8s\Exception\ExceptionInterface;

class InvalidArgumentException extends \InvalidArgumentException implements ExceptionInterface
{
}