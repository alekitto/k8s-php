<?php

/**
 * This file is part of the k8s/client library.
 *
 * (c) Chad Sikorra <Chad.Sikorra@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Tests\Kcs\K8s\Client;

use Kcs\K8s\Client\ContextConfig;
use Kcs\K8s\Client\KubeConfig\Model\FullContext;
use Kcs\K8s\Client\Options;
use Kcs\K8s\Contract\AuthType;
use PHPUnit\Framework\TestCase;
use Prophecy\PhpUnit\ProphecyTrait;
use Prophecy\Prophecy\ObjectProphecy;

class ContextConfigTest extends TestCase
{
    use ProphecyTrait;

    private Options $options;
    private FullContext|ObjectProphecy $context;
    private ContextConfig $subject;

    public function setUp(): void
    {
        $this->options = new Options('foo', 'stuff');
        $this->context = $this->prophesize(FullContext::class);
        $this->subject = new ContextConfig(
            $this->options,
            $this->context->reveal(),
        );
    }

    public function testGetAuthTypeWithOptions(): void
    {
        $this->subject = new ContextConfig(
            $this->options,
            null
        );

        $this->assertEquals(AuthType::Token, $this->subject->getAuthType());
    }

    public function testGetAuthTypeWithoutOptions(): void
    {
        $this->context->getAuthType()
            ->willReturn(AuthType::Certificate);

        $this->assertEquals(AuthType::Certificate, $this->subject->getAuthType());
    }

    public function testGetTokenWithOptions(): void
    {
        $this->options->setToken('foo');
        $this->subject = new ContextConfig(
            $this->options,
            null
        );

        $this->assertEquals('foo', $this->subject->getToken());
    }

    public function testGetTokenWithoutOptions(): void
    {
        $this->context->getUserToken()
            ->willReturn('bar');

        $this->assertEquals('bar', $this->subject->getToken());
    }


    public function testGetNamespaceWithOptions(): void
    {
        $this->subject = new ContextConfig(
            $this->options,
            null
        );

        $this->assertEquals('stuff', $this->subject->getNamespace());
    }

    public function testGetNamespaceWithoutOptions(): void
    {
        $this->context->getNamespace()
            ->willReturn('default');

        $this->assertEquals('default', $this->subject->getNamespace());
    }

    public function testGetUsernameWithOptions(): void
    {
        $this->options->setUsername('meh');
        $this->subject = new ContextConfig(
            $this->options,
            null
        );

        $this->assertEquals('meh', $this->subject->getUsername());
    }

    public function testGetUsernameWithoutOptions(): void
    {
        $this->context->getUserUsername()
            ->willReturn('foo');

        $this->assertEquals('foo', $this->subject->getUsername());
    }

    public function testGetPasswordWithOptions(): void
    {
        $this->options->setPassword('stuff');
        $this->subject = new ContextConfig(
            $this->options,
            null
        );

        $this->assertEquals('stuff', $this->subject->getPassword());
    }

    public function testGetPasswordWithoutOptions(): void
    {
        $this->context->getUserPassword()
            ->willReturn('secret');

        $this->assertEquals('secret', $this->subject->getPassword());
    }

    public function testGetServerWithOptions(): void
    {
        $this->options->setEndpoint('huh');
        $this->subject = new ContextConfig(
            $this->options,
            null
        );

        $this->assertEquals('huh', $this->subject->getServer());
    }

    public function testGetServerWithoutOptions(): void
    {
        $this->context->getServer()
            ->willReturn('k8s');

        $this->assertEquals('k8s', $this->subject->getServer());
    }

    public function testGetClientCertificate(): void
    {
        $this->context->getUserClientCertificate()
            ->willReturn('cert');

        $this->assertEquals('cert', $this->subject->getClientCertificate());
    }

    public function testGetClientKey(): void
    {
        $this->context->getUserClientKey()
            ->willReturn('key');

        $this->assertEquals('key', $this->subject->getClientKey());
    }

    public function testGetClientCertificateData(): void
    {
        $this->context->getUserClientCertificateData()
            ->willReturn('cert-data');

        $this->assertEquals('cert-data', $this->subject->getClientCertificateData());
    }

    public function testGetClientKeyData(): void
    {
        $this->context->getUserClientKeyData()
            ->willReturn('key-data');

        $this->assertEquals('key-data', $this->subject->getClientKeyData());
    }

    public function testGetServerCertificateAuthority(): void
    {
        $this->context->getServerCertificateAuthority()
            ->willReturn('ca');

        $this->assertEquals('ca', $this->subject->getServerCertificateAuthority());
    }

    public function testGetServerCertificateAuthorityData(): void
    {
        $this->context->getServerCertificateAuthorityData()
            ->willReturn('ca-data');

        $this->assertEquals('ca-data', $this->subject->getServerCertificateAuthorityData());
    }
}
