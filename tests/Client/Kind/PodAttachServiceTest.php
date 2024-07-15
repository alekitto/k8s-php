<?php

declare(strict_types=1);

namespace Tests\Kcs\K8s\Client\Kind;

use Kcs\K8s\Api\Service\Core\v1\PodAttachOptionsService;
use Kcs\K8s\Client\Kind\PodAttachService;
use PHPUnit\Framework\TestCase;
use Prophecy\Argument;
use Prophecy\PhpUnit\ProphecyTrait;
use Prophecy\Prophecy\ObjectProphecy;

class PodAttachServiceTest extends TestCase
{
    use ProphecyTrait;

    private PodAttachOptionsService|ObjectProphecy $service;
    private PodAttachService $subject;

    public function setUp(): void
    {
        $this->service = $this->prophesize(PodAttachOptionsService::class);
        $this->service->useNamespace(Argument::any())->willReturn($this->service);

        $this->subject = new PodAttachService(
            $this->service->reveal(),
            'foo',
            'bar'
        );
    }

    public function testItCallsTheService(): void
    {
        $handler = function () {};
        $this->service->connectGetNamespacedPodAttach('foo', $handler, [])->shouldBeCalled();

        $this->subject->run($handler);
    }
}
