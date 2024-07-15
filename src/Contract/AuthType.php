<?php

declare(strict_types=1);

namespace Kcs\K8s\Contract;

enum AuthType
{
    /**
     * Authentication uses an HTTP user client certificate / key pair.
     */
    case Certificate;

    /**
     * Authentication uses a bearer token.
     */
    case Token;

    /**
     * Authentication uses basic HTTP username / password authentication.
     */
    case Basic;
}
