<?php

declare(strict_types=1);

namespace Kcs\K8s\ApiGenerator\Parser\Metadata;

use Kcs\K8s\ApiGenerator\Parser\Formatter\GoPackageNameFormatter;
use Kcs\K8s\ApiGenerator\Parser\OpenApiContext;
use Swagger\Annotations\Operation;
use Swagger\Annotations\Parameter;
use Swagger\Annotations\Path;

use function array_filter;
use function array_keys;
use function array_map;
use function array_merge;
use function array_values;
use function count;
use function in_array;
use function str_ends_with;
use function str_ireplace;
use function stripos;
use function strlen;
use function substr;
use function ucfirst;

readonly class OperationMetadata
{
    private const DEPRECATION_MARKER = 'Deprecated: ';

    private const VOID_METHODS = [
        'connect',
        'watch',
        'watchlist',
    ];

    /** @var array<string, Parameter> */
    private array $parameterRefs;

    /** @param ResponseMetadata[] $responses */
    public function __construct(OpenApiContext $context, private Path $path, private Operation $operation, private array $responses)
    {
        $parameterRefs = [];
        foreach ($this->operation->parameters ?? [] as $parameter) {
            if (empty($parameter->ref) || isset($this->parameterRefs[$parameter->ref])) {
                continue;
            }

            $parameterRefs[$parameter->ref] = $context->findParameter($parameter->ref);
        }

        foreach ($this->path->parameters ?? [] as $parameter) {
            if (empty($parameter->ref) || isset($this->parameterRefs[$parameter->ref])) {
                continue;
            }

            $parameterRefs[$parameter->ref] = $context->findParameter($parameter->ref);
        }

        $this->parameterRefs = $parameterRefs;
    }

    public function getMethod(): string
    {
        return $this->operation->method;
    }

    public function getDescription(): string
    {
        return ucfirst($this->operation->description);
    }

    public function getUriPath(): string
    {
        return $this->path->path;
    }

    public function getKubernetesGroup(): string|null
    {
        if (! isset($this->operation->x['kubernetes-group-version-kind'])) {
            return null;
        }

        return $this->operation->x['kubernetes-group-version-kind']->group;
    }

    public function getKubernetesVersion(): string|null
    {
        if (! isset($this->operation->x['kubernetes-group-version-kind'])) {
            return null;
        }

        return $this->operation->x['kubernetes-group-version-kind']->version;
    }

    public function getKubernetesKind(): string|null
    {
        if (! isset($this->operation->x['kubernetes-group-version-kind'])) {
            return null;
        }

        return $this->operation->x['kubernetes-group-version-kind']->kind;
    }

    public function hasRequiredPathParameters(): bool
    {
        if (empty($this->path->parameters)) {
            return false;
        }

        foreach ($this->path->parameters as $parameter) {
            if ($parameter->required) {
                return true;
            }
        }

        return false;
    }

    /** @return string[] */
    public function getRequiredPathParameters(): array
    {
        if (empty($this->path->parameters)) {
            return [];
        }

        $parameters = [];
        foreach ($this->path->parameters as $parameter) {
            if (! $parameter->required) {
                continue;
            }

            $parameters[] = $parameter->name;
        }

        return $parameters;
    }

    public function getKubernetesAction(): string|null
    {
        return $this->operation->x['kubernetes-action'] ?? null;
    }

    public function isWebsocketOperation(): bool
    {
        return $this->getKubernetesAction() === 'connect'
            && ! $this->isProxy();
    }

    public function requiresNamespace(): bool
    {
        if (empty($this->path->parameters)) {
            return false;
        }

        foreach ($this->path->parameters as $parameter) {
            if ($parameter->name === 'namespace') {
                return $parameter->required;
            }
        }

        return false;
    }

    public function requiresName(): bool
    {
        if (empty($this->path->parameters)) {
            return false;
        }

        foreach ($this->path->parameters as $parameter) {
            if ($parameter->name === 'name') {
                return $parameter->required;
            }
        }

        return false;
    }

    public function getPhpMethodName(): string
    {
        $operation = $this->operation->operationId;
        $operation = str_ireplace(
            $this->getKubernetesKind(),
            '',
            $operation,
        );
        $group = $this->getKubernetesGroup() ?: 'Core';
        $operation = str_ireplace(
            $group . $this->getKubernetesVersion(),
            '',
            $operation,
        );

        return str_ireplace(
            array_keys(GoPackageNameFormatter::NAME_REPLACEMENTS),
            array_values(GoPackageNameFormatter::NAME_REPLACEMENTS),
            $operation,
        );
    }

    public function getReturnedType(): string|null
    {
        if (in_array($this->getKubernetesAction(), self::VOID_METHODS, true) && ! $this->isProxy()) {
            return 'void';
        }

        $success = [];

        foreach ($this->responses as $response) {
            if (! $response->isSuccess()) {
                continue;
            }

            $success[] = $response;
        }

        foreach ($success as $response) {
            if ($response->getDefinition()) {
                return 'model';
            }

            if ($response->isStringResponse()) {
                return 'string';
            }
        }

        return null;
    }

    public function isNullable(): bool
    {
        if ($this->getReturnedType() === 'void') {
            return false;
        }

        $result = array_filter(
            $this->getParameters(),
            static fn (ParameterMetadata $param) => in_array($param->getName(), ['watch', 'follow'], true),
        );

        return count($result) > 0;
    }

    public function getReturnedDefinition(): DefinitionMetadata|null
    {
        $success = [];

        foreach ($this->responses as $response) {
            if (! $response->isSuccess() || ! $response->getDefinition()) {
                continue;
            }

            $success[] = $response;
        }

        foreach ($success as $response) {
            if ($response->getDefinition()) {
                return $response->getDefinition();
            }
        }

        return null;
    }

    /** @return ParameterMetadata[] */
    public function getParameters(): array
    {
        $toMetadata = function (Parameter $parameter) {
            if ($parameter->ref) {
                return new ParameterMetadata($this->parameterRefs[$parameter->ref]);
            }

            return new ParameterMetadata($parameter);
        };

        return array_merge(
            array_map($toMetadata, $this->operation->parameters ?? []),
            array_map($toMetadata, $this->path->parameters ?? []),
        );
    }

    public function hasQueryParameters(): bool
    {
        return ! empty($this->getQueryParameters());
    }

    public function needsCallableParameter(): bool
    {
        if ($this->isWebsocketOperation()) {
            return true;
        }

        foreach ($this->getQueryParameters() as $parameter) {
            if (in_array($parameter->getName(), ['watch', 'follow'], true)) {
                return true;
            }
        }

        return false;
    }

    public function isWatchable(): bool
    {
        if ($this->getKubernetesAction() !== 'list') {
            return false;
        }

        foreach ($this->getQueryParameters() as $parameter) {
            if ($parameter->getName() === 'watch') {
                return true;
            }
        }

        return false;
    }

    /** @return ParameterMetadata[] */
    public function getQueryParameters(): array
    {
        return array_filter(
            $this->getParameters(),
            static fn (ParameterMetadata $param) => $param->isQueryParam(),
        );
    }

    public function isDeprecated(): bool
    {
        if ((bool) $this->operation->deprecated) {
            return true;
        }

        $definition = $this->getReturnedDefinition();

        if ($definition && $definition->isDeprecated()) {
            return true;
        }

        return stripos($this->getDescription(), self::DEPRECATION_MARKER) !== false;
    }

    public function getDeprecationDescription(): string
    {
        if (! $this->isDeprecated()) {
            return '';
        }

        $definition = $this->getReturnedDefinition();
        if ($definition && $definition->isDeprecated()) {
            $deprecatedPos = stripos($definition->getDescription(), self::DEPRECATION_MARKER);
            if ($deprecatedPos === false) {
                return '';
            }

            return ucfirst((string) substr(
                $definition->getDescription(),
                $deprecatedPos + strlen(self::DEPRECATION_MARKER),
            ));
        }

        $deprecatedPos = stripos($this->getDescription(), self::DEPRECATION_MARKER);
        if ($deprecatedPos === false) {
            return '';
        }

        return ucfirst((string) substr(
            $this->getDescription(),
            $deprecatedPos + strlen(self::DEPRECATION_MARKER),
        ));
    }

    public function isProxyWithPath(): bool
    {
        return str_ends_with($this->getPhpMethodName(), 'ProxyWithPath');
    }

    private function isProxy(): bool
    {
        return str_ends_with($this->getPhpMethodName(), 'Proxy')
            || $this->isProxyWithPath();
    }
}
