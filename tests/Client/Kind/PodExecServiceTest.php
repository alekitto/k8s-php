<?php

declare(strict_types=1);

namespace Tests\Kcs\K8s\Client\Kind;

use Kcs\K8s\Api\Service\Core\v1\PodExecOptionsService;
use Kcs\K8s\Client\Kind\PodExecService;
use Kcs\K8s\Client\Websocket\Contract\ContainerExecInterface;
use PHPUnit\Framework\TestCase;
use Prophecy\PhpUnit\ProphecyTrait;
use Prophecy\Prophecy\ObjectProphecy;

class PodExecServiceTest extends TestCase
{
    use ProphecyTrait;

    private PodExecOptionsService|ObjectProphecy $podExecOptions;
    private ContainerExecInterface|ObjectProphecy $containerExec;
    private PodExecService $subject;

    public function setUp(): void
    {
        $this->podExecOptions = $this->prophesize(PodExecOptionsService::class);
        $this->containerExec = $this->prophesize(ContainerExecInterface::class);

        $this->podExecOptions->useNamespace('default')->willReturn($this->podExecOptions);
        $this->subject = new PodExecService(
            $this->podExecOptions->reveal(),
            'foo',
            'default'
        );
    }

    public function testItRunsCommandsWithStdInOutAndErr(): void
    {
        $this->podExecOptions->connectGetNamespacedPodExec(
            'foo',
            $this->containerExec,
            [
                'stdin' => true,
                'stdout' => true,
                'stderr' => true,
                'command' => '/usr/bin/whoami'
            ]
        )->shouldBeCalled();

        $this->subject
            ->useStdin()
            ->useStdout()
            ->useStderr()
            ->command('/usr/bin/whoami')
            ->run($this->containerExec->reveal());
    }

    public function testItRunsCommandsWithStdInOutAndTty(): void
    {
        $this->podExecOptions->connectGetNamespacedPodExec
        (
            'foo',
            $this->containerExec,
            [
                'stdin' => true,
                'stdout' => true,
                'tty' => true,
                'command' => ['/usr/bin/whoami', '--version']
            ]
        )->shouldBeCalled();

        $this->subject
            ->useStdin()
            ->useStdout()
            ->useTty()
            ->command(['/usr/bin/whoami', '--version'])
            ->run($this->containerExec->reveal());
    }

    public function testItRunsCommandsWithCallable(): void
    {
        $callable = function (string $channel, string $data) {};
        $this->podExecOptions->connectGetNamespacedPodExec
        (
            'foo',
            $callable,
            [
                'stdin' => true,
                'stdout' => true,
                'tty' => true,
                'command' => ['/usr/bin/whoami', '--version']
            ]
        )->shouldBeCalled();

        $this->subject
            ->useStdin()
            ->useStdout()
            ->useTty()
            ->command(['/usr/bin/whoami', '--version'])
            ->run($callable);
    }
}
