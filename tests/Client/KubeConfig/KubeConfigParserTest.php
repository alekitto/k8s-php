<?php

declare(strict_types=1);

namespace Tests\Kcs\K8s\Client\KubeConfig;

use Kcs\K8s\Client\KubeConfig\KubeConfigParser;
use PHPUnit\Framework\TestCase;

class KubeConfigParserTest extends TestCase
{
    private const BASIC_CONFIG_YAML = <<<YAML
apiVersion: v1
clusters:
- cluster:
    certificate-authority: /home/user/.minikube/ca.crt
    server: https://192.168.99.100:8443
  name: minikube
contexts:
- context:
    cluster: minikube
    user: minikube
  name: minikube
current-context: minikube
kind: Config
preferences: {}
users:
- name: minikube
  user:
    client-certificate: /home/user/.minikube/profiles/minikube/client.crt
    client-key: /home/user/.minikube/profiles/minikube/client.key
YAML;

    private KubeConfigParser $subject;

    public function setUp(): void
    {
        $this->subject = new KubeConfigParser();
    }

    public function testItParsesTheBasicConfig(): void
    {
        $result = $this->subject->parse(self::BASIC_CONFIG_YAML);

        $context = $result->getContext('minikube');
        $cluster = $result->getCluster('minikube');
        $user = $result->getUser('minikube');

        $this->assertNull($context->getNamespace());
        $this->assertEquals('minikube', $context->getName());
        $this->assertEquals('minikube', $context->getUserName());
        $this->assertEquals('minikube', $context->getClusterName());

        $this->assertStringEndsWith('client.crt', $user->getClientCertificate());
        $this->assertStringEndsWith('client.key', $user->getClientKey());
        $this->assertEquals('minikube', $user->getName());

        $this->assertEquals('minikube', $cluster->getName());
        $this->assertEquals('https://192.168.99.100:8443', $cluster->getServer());
        $this->assertEquals('/home/user/.minikube/ca.crt', $cluster->getCertificateAuthority());

        $this->assertEquals('minikube', $result->getCurrentContext());
    }
}
