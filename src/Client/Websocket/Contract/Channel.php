<?php

declare(strict_types=1);

namespace Kcs\K8s\Client\Websocket\Contract;

enum Channel: int
{
    case StdIn = 0;
    case StdOut = 1;
    case StdErr = 2;
    case Error = 3;
    case Resize = 4;
}
