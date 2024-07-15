<?php

declare(strict_types=1);

namespace Tests\Kcs\K8s\Client\Kind;


use DateTime;
use Kcs\K8s\Api\Service\Core\v1\PodService;
use Kcs\K8s\Client\Kind\PodLogService;
use PHPUnit\Framework\TestCase;
use Prophecy\PhpUnit\ProphecyTrait;
use Prophecy\Prophecy\ObjectProphecy;

class PodLogServiceTest extends TestCase
{
    use ProphecyTrait;

    private PodService|ObjectProphecy $podService;
    private PodLogService $subject;

    public function setUp(): void
    {
        $this->podService = $this->prophesize(PodService::class);
        $this->podService->useNamespace('bar')->willReturn($this->podService);

        $this->subject = new PodLogService(
            $this->podService->reveal(),
            'foo',
            'bar'
        );
    }

    public function testItCanReadLogs(): void
    {
        $this->podService->readNamespacedLog(
            'foo',
            [
                'previous' => true,
                'timestamps' => true,
                'limitBytes' => 100,
                'pretty' => true,
                'sinceSeconds' => 1800,
                'tailLines' => 10,
                'follow' => false
            ],
            null,
        )->willReturn('logs');

        $result = $this->subject
            ->showPrevious()
            ->withTimestamps()
            ->limitBytes(100)
            ->makePretty()
            ->sinceSeconds(1800)
            ->tailLines(10)
            ->read();
        $this->assertEquals('logs', $result);
    }

    public function testItCanFollowLogs(): void
    {
        $callable = function (string $data) {
        };

        $this->podService->readNamespacedLog(
            'foo',
            [
                'timestamps' => true,
                'pretty' => true,
                'follow' => true
            ],
            $callable,
        )->shouldBeCalled();

        $this->subject
            ->withTimestamps()
            ->makePretty()
            ->follow($callable);
    }

    public function testItCanSpecifyPodAndNamespace(): void
    {
        $time = new DateTime();
        $this->podService->useNamespace('bar')
            ->shouldBeCalled()
            ->willReturn($this->podService);
        $this->podService->readNamespacedLog(
            'my-pod',
            [
                'sinceTime' => $time->format(DATE_ATOM),
                'insecureSkipTLSVerifyBackend' => true,
                'follow' => false,
            ],
            null,
        )->willReturn('logs');

        $result = $this->subject
            ->sinceTime($time)
            ->allowInsecure()
            ->usePod('my-pod', 'bar')
            ->read();

        $this->assertEquals('logs', $result);
    }
}
