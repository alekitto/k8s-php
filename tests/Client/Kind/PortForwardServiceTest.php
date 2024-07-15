<?php

declare(strict_types=1);

namespace Tests\Kcs\K8s\Client\Kind;

use Kcs\K8s\Api\Service\Core\v1\PodPortForwardOptionsService;
use Kcs\K8s\Client\Kind\PortForwardService;
use PHPUnit\Framework\TestCase;
use Prophecy\PhpUnit\ProphecyTrait;
use Prophecy\Prophecy\ObjectProphecy;

class PortForwardServiceTest extends TestCase
{
    use ProphecyTrait;

    private PodPortForwardOptionsService|ObjectProphecy $service;
    private PortForwardService $subject;

    public function setUp(): void
    {
        $this->service = $this->prophesize(PodPortForwardOptionsService::class);
        $this->subject = new PortForwardService(
            'foo',
            [80],
            $this->service->reveal(),
        );
    }

    public function testItAddsPorts(): void
    {
        $handler = function () {};

        $this->subject->addPort(443);
        $this->subject->start($handler);

        $this->service
            ->connectGetNamespacedPodPortforward('foo', $handler, ['ports' => [80, 443]])
            ->shouldHaveBeenCalled();
    }

    public function testItSwitchesNamespaces(): void
    {
        $this->service->useNamespace('bar')
            ->shouldBeCalled()
            ->willReturn($this->service);

        $this->subject->useNamespace('bar');
    }

    public function testItStartsWithTheCorrectParameters(): void
    {
        $handler = function () {};
        $this->subject->start($handler);

        $this->service
            ->connectGetNamespacedPodPortforward('foo', $handler, ['ports' => [80]])
            ->shouldHaveBeenCalled();
    }
}
