<?php

declare(strict_types=1);

namespace Kcs\K8s\Client\Http;

use Kcs\K8s\Client\Exception\InvalidArgumentException;
use Kcs\K8s\Client\Options;

use function array_keys;
use function array_values;
use function http_build_query;
use function implode;
use function is_array;
use function preg_match;
use function sprintf;
use function str_replace;
use function urlencode;

readonly class UriBuilder
{
    public function __construct(private Options $options)
    {
    }

    public function buildUri(string $uri, array $parameters = [], array $query = [], string|null $namespace = null): string
    {
        $namespace ??= $this->options->getNamespace();
        $parameters['{namespace}'] = $namespace;
        $uri = str_replace(
            array_keys($parameters),
            array_values($parameters),
            $uri,
        );

        if (preg_match('/{(.*)}/', $uri, $matches)) {
            $parameterName = $matches[1];

            throw new InvalidArgumentException(sprintf(
                'The parameter %s is required.',
                $parameterName,
            ));
        }

        $uri = $this->options->getEndpoint() . $uri;
        if (! empty($query)) {
            $uri .= $this->buildQueryString($query);
        }

        return $uri;
    }

    private function buildQueryString(array $query): string
    {
        $arrayParams = [];
        foreach ($query as $item => $value) {
            if (! is_array($value)) {
                continue;
            }

            $arrayParams[$item] = $value;
        }

        $additional = [];
        if (! empty($arrayParams)) {
            foreach ($arrayParams as $key => $values) {
                unset($query[$key]);
                foreach ($values as $value) {
                    $additional[] = urlencode($key) . '=' . urlencode((string) $value);
                }
            }
        }

        $additional = implode('&', $additional);
        if (! empty($additional)) {
            $additional = empty($query) ? '?' . $additional : '&' . $additional;
        }

        $query = empty($query) ? $additional : http_build_query($query) . $additional;
        if (! empty($query) && $query[0] !== '?') {
            $query = '?' . $query;
        }

        return $query;
    }
}
