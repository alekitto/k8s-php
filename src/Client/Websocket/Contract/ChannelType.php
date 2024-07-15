<?php

declare(strict_types=1);

namespace Kcs\K8s\Client\Websocket\Contract;

enum ChannelType
{
    case Data;
    case Error;
}
