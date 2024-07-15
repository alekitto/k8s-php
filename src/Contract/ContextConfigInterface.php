<?php

declare(strict_types=1);

namespace Kcs\K8s\Contract;

interface ContextConfigInterface
{
    /**
     * The authentication type in use. Returns one of the AUTH_TYPE_* constants on this interface.
     */
    public function getAuthType(): AuthType;

    /**
     * The HTTP user client key in base64 form.
     */
    public function getClientKeyData(): string|null;

    /**
     * The path to the HTTP user client key.
     */
    public function getClientKey(): string|null;

    /**
     * The path to the HTTP user client certificate.
     */
    public function getClientCertificate(): string|null;

    /**
     * The HTTP user client certificate in base64 form.
     */
    public function getClientCertificateData(): string|null;

    /**
     * The username for HTTP basic auth.
     */
    public function getUsername(): string|null;

    /**
     * The password for HTTP basic auth.
     */
    public function getPassword(): string|null;

    /**
     * The bearer token.
     */
    public function getToken(): string|null;

    /**
     * The API server base URI.
     */
    public function getServer(): string;

    /**
     * The path to the server certificate authority cert.
     */
    public function getServerCertificateAuthority(): string|null;

    /**
     * The server certificate authority cert in base64 form.
     */
    public function getServerCertificateAuthorityData(): string|null;
}
