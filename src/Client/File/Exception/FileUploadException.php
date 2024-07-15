<?php

declare(strict_types=1);

namespace Kcs\K8s\Client\File\Exception;

use Exception;
use Kcs\K8s\Exception\ExceptionInterface;

class FileUploadException extends Exception implements ExceptionInterface
{
}
