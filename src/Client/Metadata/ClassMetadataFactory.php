<?php

declare(strict_types=1);

namespace Kcs\K8s\Client\Metadata;

use Kcs\ClassFinder\Finder\ComposerFinder;
use Kcs\ClassFinder\Finder\FinderInterface;
use Kcs\K8s\Attribute\Kind;
use Kcs\Metadata\Factory\MetadataFactory;
use Kcs\Metadata\Loader\LoaderInterface;
use Psr\Cache\CacheItemPoolInterface;
use Psr\EventDispatcher\EventDispatcherInterface;

use function assert;

use const PHP_INT_MAX;

class ClassMetadataFactory extends MetadataFactory
{
    private readonly FinderInterface $classFinder;
    private array $kindMap = [];

    public function __construct(
        LoaderInterface $loader,
        FinderInterface|null $classFinder = null,
        EventDispatcherInterface|null $eventDispatcher = null,
        private CacheItemPoolInterface|null $cache = null,
    ) {
        parent::__construct($loader, $eventDispatcher, $cache);

        $this->classFinder = $classFinder ?? (new ComposerFinder())->skipBogonFiles();
        $this->setMetadataClass(ModelMetadata::class);
    }

    public function getModelFqcnFromKind(string $apiVersion, string $kind): string|null
    {
        if (empty($this->kindMap)) {
            $this->kindMap = $this->getKindMap();
        }

        return $this->kindMap[$apiVersion][$kind] ?? null;
    }

    private function getKindMap(): array
    {
        $item = $this->cache?->getItem('k8s_client_kind_map');
        if ($item?->isHit()) {
            return $item->get();
        }

        $map = [];
        $finder = (clone $this->classFinder)
            ->withAttribute(Kind::class);

        foreach ($finder as $className => $_) {
            $metadata = $this->getMetadataFor($className);
            assert($metadata instanceof ModelMetadata);

            $map[$metadata->version][$metadata->kind] = $className;
        }

        if (isset($item)) {
            $item->set($map);
            $item->expiresAfter(PHP_INT_MAX);
            $this->cache->save($item);
        }

        return $map;
    }
}
