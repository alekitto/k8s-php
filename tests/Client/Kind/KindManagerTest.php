<?php

declare(strict_types=1);

namespace Tests\Kcs\K8s\Client\Kind;

use Http\Discovery\Psr17FactoryDiscovery;
use Kcs\K8s\Api\Model\Api\AdmissionRegistration\v1\MutatingWebhookConfiguration;
use Kcs\K8s\Api\Model\Api\Core\v1\Pod;
use Kcs\K8s\Api\Model\ApiMachinery\Apis\Meta\v1\Status;
use Kcs\K8s\Client\Http\HttpClient;
use Kcs\K8s\Client\Http\UriBuilder;
use Kcs\K8s\Client\Kind\KindManager;
use Kcs\K8s\Client\Metadata\ModelMetadata;
use Kcs\K8s\Client\Metadata\OperationMetadata;
use Kcs\K8s\Client\Options;
use Kcs\K8s\Client\Patch\JsonPatch;
use Kcs\Metadata\Factory\MetadataFactoryInterface;
use PHPUnit\Framework\TestCase;
use Prophecy\Argument;
use Prophecy\PhpUnit\ProphecyTrait;
use Prophecy\Prophecy\ObjectProphecy;
use Psr\Http\Message\ResponseInterface;

class KindManagerTest extends TestCase
{
    use ProphecyTrait;

    private ObjectProphecy|MetadataFactoryInterface $metadataFactory;
    private UriBuilder $urlBuilder;
    private HttpClient|ObjectProphecy $httpClient;
    private Options $options;
    private KindManager $subject;

    public function setUp(): void
    {
        $this->httpClient = $this->prophesize(HttpClient::class);
        $this->options = new Options('https://foo.local');
        $this->urlBuilder = new UriBuilder($this->options);
        $this->metadataFactory = $this->prophesize(MetadataFactoryInterface::class);
        $this->subject = new KindManager(
            $this->httpClient->reveal(),
            $this->urlBuilder,
            $this->metadataFactory->reveal(),
            $this->options
        );
    }

    public function testCreate(): void
    {
        $this->metadataFactory->getMetadataFor(Argument::type(Pod::class))
            ->willReturn($metadata = $this->prophesize(ModelMetadata::class));

        $metadata->getOperationByType('post')
            ->shouldBeCalled()
            ->willReturn($operation = $this->prophesize(OperationMetadata::class));

        $operation->isBodyRequired()->willReturn(true);
        $operation->isResponseSelf()->willReturn(false);
        $operation->getKubernetesAction()->willReturn('');
        $operation->getResponseFqcn()->willReturn(Pod::class);
        $operation->path = '/';

        $newPod = new Pod('foo', []);
        $this->httpClient->send(Argument::cetera())->willReturn($newPod);

        $result = $this->subject->create(new Pod('foo', []));
        $this->assertEquals($newPod, $result);
    }

    public function testDelete(): void
    {
        $this->metadataFactory->getMetadataFor(Argument::type(Pod::class))
            ->willReturn($metadata = $this->prophesize(ModelMetadata::class));

        $metadata->getOperationByType('delete')
            ->shouldBeCalled()
            ->willReturn($operation = $this->prophesize(OperationMetadata::class));

        $operation->isBodyRequired()->willReturn(false);
        $operation->isResponseSelf()->willReturn(false);
        $operation->getKubernetesAction()->willReturn('');
        $operation->getResponseFqcn()->willReturn(Pod::class);
        $operation->path = '/';

        $deletedPod = new Pod('foo', []);
        $this->httpClient->send(Argument::cetera())->willReturn($deletedPod);

        $result = $this->subject->delete(new Pod('foo', []));
        $this->assertEquals($deletedPod, $result);
    }

    public function testDeleteAllNamespaced(): void
    {
        $this->metadataFactory->getMetadataFor(Pod::class)
            ->willReturn($metadata = $this->prophesize(ModelMetadata::class));

        $metadata->getOperationByType('deletecollection')
            ->shouldBeCalled()
            ->willReturn($operation = $this->prophesize(OperationMetadata::class));

        $operation->isBodyRequired()->willReturn(false);
        $operation->isResponseSelf()->willReturn(false);
        $operation->getKubernetesAction()->willReturn('');
        $operation->getResponseFqcn()->willReturn(Status::class);
        $operation->path = '/';

        $this->httpClient->send(Argument::cetera())
            ->willReturn($status = $this->prophesize(Status::class));

        $result = $this->subject->deleteAllNamespaced(Pod::class);
        $this->assertSame($status->reveal(), $result);
    }

    public function testDeleteAll(): void
    {
        $this->metadataFactory->getMetadataFor(MutatingWebhookConfiguration::class)
            ->willReturn($metadata = $this->prophesize(ModelMetadata::class));

        $metadata->getOperationByType('deletecollection-all')
            ->shouldBeCalled()
            ->willReturn($operation = $this->prophesize(OperationMetadata::class));

        $operation->isBodyRequired()->willReturn(false);
        $operation->isResponseSelf()->willReturn(false);
        $operation->getKubernetesAction()->willReturn('');
        $operation->getResponseFqcn()->willReturn(Status::class);
        $operation->path = '/';

        $this->httpClient->send(Argument::cetera())
            ->willReturn($status = $this->prophesize(Status::class));

        $result = $this->subject->deleteAll(MutatingWebhookConfiguration::class);
        $this->assertSame($status->reveal(), $result);
    }

    public function testRead(): void
    {
        $this->metadataFactory->getMetadataFor(MutatingWebhookConfiguration::class)
            ->willReturn($metadata = $this->prophesize(ModelMetadata::class));

        $metadata->getOperationByType('get')
            ->shouldBeCalled()
            ->willReturn($operation = $this->prophesize(OperationMetadata::class));

        $operation->isBodyRequired()->willReturn(false);
        $operation->isResponseSelf()->willReturn(false);
        $operation->getKubernetesAction()->willReturn('');
        $operation->getResponseFqcn()->willReturn(Status::class);
        $operation->path = '/';

        $this->httpClient->send(Argument::cetera())
            ->willReturn($status = $this->prophesize(Status::class));

        $result = $this->subject->read('foo', MutatingWebhookConfiguration::class);
        $this->assertSame($status->reveal(), $result);
    }

    public function testListAll(): void
    {
        $this->metadataFactory->getMetadataFor(MutatingWebhookConfiguration::class)
            ->willReturn($metadata = $this->prophesize(ModelMetadata::class));

        $metadata->getOperationByType('list-all')
            ->shouldBeCalled()
            ->willReturn($operation = $this->prophesize(OperationMetadata::class));

        $operation->isBodyRequired()->willReturn(false);
        $operation->isResponseSelf()->willReturn(false);
        $operation->getKubernetesAction()->willReturn('');
        $operation->getResponseFqcn()->willReturn(Status::class);
        $operation->path = '/';

        $this->httpClient->send(Argument::cetera())->willReturn([]);

        $result = $this->subject->listAll(MutatingWebhookConfiguration::class);
        $this->assertEquals([], $result);
    }

    public function testListNamespaced(): void
    {
        $this->metadataFactory->getMetadataFor(Pod::class)
            ->willReturn($metadata = $this->prophesize(ModelMetadata::class));

        $metadata->getOperationByType('list')
            ->shouldBeCalled()
            ->willReturn($operation = $this->prophesize(OperationMetadata::class));

        $operation->isBodyRequired()->willReturn(false);
        $operation->isResponseSelf()->willReturn(false);
        $operation->getKubernetesAction()->willReturn('');
        $operation->getResponseFqcn()->willReturn(Pod::class);
        $operation->path = '/';

        $this->httpClient->send(Argument::cetera())->willReturn([]);

        $result = $this->subject->listNamespaced(Pod::class);
        $this->assertEquals([], $result);
    }

    public function testWatchAll(): void
    {
        $this->metadataFactory->getMetadataFor(Pod::class)
            ->willReturn($metadata = $this->prophesize(ModelMetadata::class));

        $metadata->getOperationByType('watch-all')
            ->shouldBeCalled()
            ->willReturn($operation = $this->prophesize(OperationMetadata::class));

        $operation->isBodyRequired()->willReturn(false);
        $operation->isResponseSelf()->willReturn(false);
        $operation->getKubernetesAction()->willReturn('');
        $operation->getResponseFqcn()->willReturn(Pod::class);
        $operation->path = '/';

        $this->httpClient->send(Argument::cetera())
            ->shouldBeCalled()
            ->willReturn([]);

        $this->subject->watchAll(function(){}, Pod::class);
    }

    public function testWatchNamespaced(): void
    {
        $this->metadataFactory->getMetadataFor(Pod::class)
            ->willReturn($metadata = $this->prophesize(ModelMetadata::class));

        $metadata->getOperationByType('watch')
            ->shouldBeCalled()
            ->willReturn($operation = $this->prophesize(OperationMetadata::class));

        $operation->isBodyRequired()->willReturn(false);
        $operation->isResponseSelf()->willReturn(false);
        $operation->getKubernetesAction()->willReturn('');
        $operation->getResponseFqcn()->willReturn(Pod::class);
        $operation->path = '/';

        $this->httpClient->send(Argument::cetera())
            ->shouldBeCalled()
            ->willReturn([]);

        $this->subject->watchNamespaced(function(){}, Pod::class);
    }

    public function testReplace(): void
    {
        $this->metadataFactory->getMetadataFor(Argument::type(Pod::class))
            ->willReturn($metadata = $this->prophesize(ModelMetadata::class));

        $metadata->getOperationByType('put')
            ->shouldBeCalled()
            ->willReturn($operation = $this->prophesize(OperationMetadata::class));

        $operation->isBodyRequired()->willReturn(false);
        $operation->isResponseSelf()->willReturn(false);
        $operation->getKubernetesAction()->willReturn('');
        $operation->getResponseFqcn()->willReturn(Pod::class);
        $operation->path = '/';

        $this->httpClient->send(Argument::cetera())
            ->shouldBeCalled()
            ->willReturn($pod = new Pod('foo', []));

        $result = $this->subject->replace($pod);
        $this->assertEquals($pod, $result);
    }

    public function testProxy(): void
    {
        $this->metadataFactory->getMetadataFor(Argument::type(Pod::class))
            ->willReturn($metadata = $this->prophesize(ModelMetadata::class));

        $metadata->getOperationByType('proxy')
            ->shouldBeCalled()
            ->willReturn($operation = $this->prophesize(OperationMetadata::class));

        $operation->isBodyRequired()->willReturn(false);
        $operation->isResponseSelf()->willReturn(false);
        $operation->getKubernetesAction()->willReturn('');
        $operation->getResponseFqcn()->willReturn(Pod::class);
        $operation->path = '/';

        $this->httpClient->send(Argument::cetera())
            ->shouldBeCalled()
            ->willReturn($response = $this->prophesize(ResponseInterface::class));

        $requestFactory = Psr17FactoryDiscovery::findRequestFactory();
        $request = $requestFactory->createRequest('GET', '/');

        $pod = new Pod('foo', []);
        $result = $this->subject->proxy($pod, $request);
        $this->assertEquals($response->reveal(), $result);
    }

    public function testReplaceStatus(): void
    {
        $this->metadataFactory->getMetadataFor(Argument::type(Pod::class))
            ->willReturn($metadata = $this->prophesize(ModelMetadata::class));

        $metadata->getOperationByType('put-status')
            ->shouldBeCalled()
            ->willReturn($operation = $this->prophesize(OperationMetadata::class));

        $operation->isBodyRequired()->willReturn(false);
        $operation->isResponseSelf()->willReturn(false);
        $operation->getKubernetesAction()->willReturn('');
        $operation->getResponseFqcn()->willReturn(Pod::class);
        $operation->path = '/';

        $this->httpClient->send(Argument::cetera())
            ->shouldBeCalled()
            ->willReturn($pod = new Pod('foo', []));

        $result = $this->subject->replaceStatus($pod);
        $this->assertEquals($pod, $result);
    }

    public function testReadStatus(): void
    {
        $this->metadataFactory->getMetadataFor(Pod::class)
            ->willReturn($metadata = $this->prophesize(ModelMetadata::class));

        $metadata->getOperationByType('get-status')
            ->shouldBeCalled()
            ->willReturn($operation = $this->prophesize(OperationMetadata::class));

        $operation->isBodyRequired()->willReturn(false);
        $operation->isResponseSelf()->willReturn(false);
        $operation->getKubernetesAction()->willReturn('');
        $operation->getResponseFqcn()->willReturn(Status::class);
        $operation->path = '/';

        $this->httpClient->send(Argument::cetera())
            ->shouldBeCalled()
            ->willReturn($status = $this->prophesize(Status::class));

        $result = $this->subject->readStatus('foo', Pod::class);
        $this->assertEquals($status->reveal(), $result);
    }

    public function testPatchStatus(): void
    {
        $this->metadataFactory->getMetadataFor(Argument::type(Pod::class))
            ->willReturn($metadata = $this->prophesize(ModelMetadata::class));

        $metadata->getOperationByType('patch-status')
            ->shouldBeCalled()
            ->willReturn($operation = $this->prophesize(OperationMetadata::class));

        $operation->isBodyRequired()->willReturn(false);
        $operation->isResponseSelf()->willReturn(false);
        $operation->getKubernetesAction()->willReturn('');
        $operation->getResponseFqcn()->willReturn(Pod::class);
        $operation->path = '/';

        $this->httpClient->send(Argument::cetera())
            ->shouldBeCalled()
            ->willReturn($status = $this->prophesize(Status::class));

        $result = $this->subject->patchStatus(new Pod('foo', []), new JsonPatch());
        $this->assertEquals($status->reveal(), $result);
    }

    public function testPatch(): void
    {
        $this->metadataFactory->getMetadataFor(Argument::type(Pod::class))
            ->willReturn($metadata = $this->prophesize(ModelMetadata::class));

        $metadata->getOperationByType('patch')
            ->shouldBeCalled()
            ->willReturn($operation = $this->prophesize(OperationMetadata::class));

        $operation->isBodyRequired()->willReturn(false);
        $operation->isResponseSelf()->willReturn(false);
        $operation->getKubernetesAction()->willReturn('');
        $operation->getResponseFqcn()->willReturn(Pod::class);
        $operation->path = '/';

        $this->httpClient->send(Argument::cetera())
            ->shouldBeCalled()
            ->willReturn($status = $this->prophesize(Status::class));

        $result = $this->subject->patch(new Pod('foo', []), new JsonPatch());
        $this->assertEquals($status->reveal(), $result);
    }
}
