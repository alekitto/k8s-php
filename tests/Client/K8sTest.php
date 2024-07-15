<?php

declare(strict_types=1);

namespace Tests\Kcs\K8s\Client;

use Kcs\K8s\Api\Model\Api\Core\v1\Pod;
use Kcs\K8s\Client\File\FileDownloader;
use Kcs\K8s\Client\File\FileUploader;
use Kcs\K8s\Client\K8s;
use Kcs\K8s\Client\Kind\PodAttachService;
use Kcs\K8s\Client\Kind\PodExecService;
use Kcs\K8s\Client\Kind\PodLogService;
use Kcs\K8s\Client\Kind\PortForwardService;
use Kcs\K8s\Client\Options;
use PHPUnit\Framework\TestCase;
use Prophecy\PhpUnit\ProphecyTrait;

class K8sTest extends TestCase
{
    use ProphecyTrait;

    private Options $options;
    private K8s $subject;

    public function setUp(): void
    {
        parent::setUp();
        $this->options = new Options('https://foo');
        $this->subject = K8s::fromOptions($this->options);
    }

    public function testLogsReturnsLogClass(): void
    {
        $result = $this->subject->logs('foo');

        $this->assertInstanceOf(PodLogService::class, $result);
    }

    public function testExecReturnsExecClass(): void
    {
        $result = $this->subject->exec('foo');

        $this->assertInstanceOf(PodExecService::class, $result);
    }

    public function testAttachReturnsAttachClass(): void
    {
        $result = $this->subject->attach('foo');

        $this->assertInstanceOf(PodAttachService::class, $result);
    }

    public function testFileUploaderReturnsFileUploaderClass(): void
    {
        $result = $this->subject->uploader('foo');

        $this->assertInstanceOf(FileUploader::class, $result);
    }

    public function testFileDownloaderReturnsFileDownloaderClass(): void
    {
        $result = $this->subject->downloader('foo');

        $this->assertInstanceOf(FileDownloader::class, $result);
    }

    public function testPortForwardReturnsPortForwardClass(): void
    {
        $result = $this->subject->portforward('foo', 80);

        $this->assertInstanceOf(PortForwardService::class, $result);
    }

    public function testPortForwardReturnsPortForwardClassWithMultiplePorts(): void
    {
        $result = $this->subject->portforward('foo', [80, 443]);

        $this->assertInstanceOf(PortForwardService::class, $result);
    }

    public function testItCreatesTheNewKindFromArrayData(): void
    {
        $result = $this->subject->newKind([
            'apiVersion' => 'v1',
            'kind' => 'Pod',
            'metadata' => [
                'name' => 'foo',
            ],
            'spec' => [
                'containers' => [
                    [
                        'image' => 'nginx:latest',
                        'name' => 'web',
                    ],
                ]
            ],
        ]);

        $this->assertInstanceOf(Pod::class, $result);
    }
}
