<?php

declare(strict_types=1);

namespace Kcs\K8s\ApiGenerator\Parser;

use Kcs\K8s\Api\Model\ApiExtensions\v1\CustomResourceDefinition;
use OpenApi\Annotations\Components;
use OpenApi\Annotations\Delete;
use OpenApi\Annotations\Get;
use OpenApi\Annotations\Items;
use OpenApi\Annotations\MediaType;
use OpenApi\Annotations\OpenApi;
use OpenApi\Annotations\Parameter;
use OpenApi\Annotations\Patch;
use OpenApi\Annotations\PathItem;
use OpenApi\Annotations\Post;
use OpenApi\Annotations\Property;
use OpenApi\Annotations\Put;
use OpenApi\Annotations\RequestBody;
use OpenApi\Annotations\Response;
use OpenApi\Annotations\Schema;

use function array_map;
use function array_pop;
use function array_reverse;
use function explode;
use function implode;
use function sprintf;
use function strtolower;

final readonly class CrdHelper
{
    public static function createOpenApi(): OpenApi
    {
        return new OpenApi([
            'paths' => [],
            'components' => new Components([
                'schemas' => [
                    'io.k8s.apimachinery.pkg.apis.meta.v1.Status' => new Schema([
                        'schema' => 'io.k8s.apimachinery.pkg.apis.meta.v1.Status',
                        'description' => 'Status is a return value for calls that don\'t return other objects.',
                        'type' => 'object',
                    ]),
                    'io.k8s.apimachinery.pkg.apis.meta.v1.ObjectMeta' => new Schema([
                        'schema' => 'io.k8s.apimachinery.pkg.apis.meta.v1.ObjectMeta',
                        'description' => 'ObjectMeta is metadata that all persisted resources must have, which includes all objects users must create.',
                        'type' => 'object',
                    ]),
                    'io.k8s.apimachinery.pkg.apis.meta.v1.DeleteOptions' => new Schema([
                        'schema' => 'io.k8s.apimachinery.pkg.apis.meta.v1.DeleteOptions',
                        'description' => 'DeleteOptions may be provided when deleting an API object.',
                        'type' => 'object',
                    ]),
                    'io.k8s.apimachinery.pkg.apis.meta.v1.Patch' => new Schema([
                        'schema' => 'io.k8s.apimachinery.pkg.apis.meta.v1.Patch',
                        'description' => 'Patch is provided to give a concrete name and type to the Kubernetes PATCH request body.',
                        'type' => 'object',
                    ]),
                ],
            ]),
        ]);
    }

    public static function generateListSchema(CustomResourceDefinition $crd, string $model, string $version): Schema
    {
        $group = $crd->getGroup();
        $crdNames = $crd->getNames();

        $name = $crd->getName();
        $names = array_reverse(explode('.', $name));
        array_pop($names);

        $pkgName = implode('.', [...$names, $version, $model]);

        return new Schema([
            'schema' => $pkgName . 'List',
            'description' => $model . 'List is a list of ' . $model,
            'type' => 'object',
            'required' => ['items'],
            'properties' => [
                new Property([
                    'property' => 'apiVersion',
                    'description' => 'APIVersion defines the versioned schema of this representation of an object. Servers should convert recognized schemas to the latest internal value, and may reject unrecognized values. More info: https://git.k8s.io/community/contributors/devel/sig-architecture/api-conventions.md#resources',
                    'type' => 'string',
                ]),
                new Property([
                    'property' => 'items',
                    'description' => 'List of ' . strtolower($crdNames->getPlural()) . '. More info: https://git.k8s.io/community/contributors/devel/sig-architecture/api-conventions.md',
                    'type' => 'array',
                    'items' => new Items([
                        'ref' => '#/components/schemas/' . $pkgName,
                    ]),
                ]),
                new Property([
                    'property' => 'kind',
                    'description' => 'Kind is a string value representing the REST resource this object represents. Servers may infer this from the endpoint the client submits requests to. Cannot be updated. In CamelCase. More info: https://git.k8s.io/community/contributors/devel/sig-architecture/api-conventions.md#types-kinds',
                    'type' => 'string',
                ]),
                new Property([
                    'property' => 'metadata',
                    'description' => 'Standard list metadata. More info: https://git.k8s.io/community/contributors/devel/sig-architecture/api-conventions.md#types-kinds',
                    'allOf' => [
                        new Schema(['ref' => '#/components/schemas/io.k8s.apimachinery.pkg.apis.meta.v1.ListMeta']),
                    ],
                ]),
            ],
            'x' => [
                (object) [
                    'group' => $group,
                    'kind' => $model . 'List',
                    'version' => $version,
                ],
            ],
        ]);
    }

    public static function generateListForAllNamespacesPath(CustomResourceDefinition $crd, string $model, string $version): PathItem
    {
        [$group, $crdNames, $invertedGroup, $pkgName] = self::extractInfo($crd, $version, $model);

        return new PathItem([
            'path' => sprintf('/apis/%s/%s/%s', $group, $version, $crdNames->getPlural()),
            'get' => new Get([
                'description' => 'list or watch objects of kind ' . $model,
                'operationId' => 'list' . implode('', array_map('ucfirst', [$invertedGroup, $version, $model, 'ForAllNamespaces'])),
                'responses' => [
                    '200' => new Response([
                        'content' => [
                            'application/json' => new MediaType([
                                'mediaType' => 'application/json',
                                'schema' => new Schema([
                                    'ref' => '#/components/schemas/' . $pkgName . 'List',
                                ]),
                            ]),
                        ],
                    ]),
                ],
                'x' => [
                    'kubernetes-action' => 'list',
                    'kubernetes-group-version-kind' => (object) [
                        'group' => $group,
                        'kind' => $model,
                        'version' => $version,
                    ],
                ],
            ]),
        ]);
    }

    public static function generateListPath(CustomResourceDefinition $crd, string $model, $version): PathItem
    {
        [$group, $crdNames, $invertedGroup, $pkgName] = self::extractInfo($crd, $version, $model);
        $namespaced = $crd->getScope() === 'Namespaced';
        $namespacePart = $namespaced ? '/namespaces/{namespace}' : '';

        $pathItemParameters = [];
        if ($namespaced) {
            $pathItemParameters[] = new Parameter([
                'name' => 'namespace',
                'in' => 'path',
                'description' => 'object name and auth scope, such as for teams and projects',
                'required' => true,
                'schema' => new Schema([
                    'type' => 'string',
                    'uniqueItems' => true,
                ]),
            ]);
        }

        return new PathItem([
            'path' => sprintf('/apis/%s/%s%s/%s', $group, $version, $namespacePart, $crdNames->getPlural()),
            'get' => new Get([
                'description' => 'list or watch objects of kind ' . $model,
                'operationId' => 'list' . implode('', array_map('ucfirst', [$invertedGroup, $version, $namespaced ? 'Namespaced' : '', $model])),
                'parameters' => self::getCollectionParameters(),
                'responses' => [
                    '200' => new Response([
                        'content' => [
                            'application/json' => new MediaType([
                                'mediaType' => 'application/json',
                                'schema' => new Schema([
                                    'ref' => '#/components/schemas/' . $pkgName . 'List',
                                ]),
                            ]),
                        ],
                    ]),
                    '401' => new Response(['description' => 'Unauthorized']),
                ],
                'x' => [
                    'kubernetes-action' => 'list',
                    'kubernetes-group-version-kind' => (object) [
                        'group' => $group,
                        'kind' => $model,
                        'version' => $version,
                    ],
                ],
            ]),
            'post' => new Post([
                'description' => 'create a ' . $model,
                'operationId' => 'create' . implode('', array_map('ucfirst', [$invertedGroup, $version, $namespaced ? 'Namespaced' : '', $model])),
                'parameters' => self::getCreateParameters(),
                'requestBody' => new RequestBody([
                    'content' => [
                        '*/*' => new MediaType([
                            'mediaType' => '*/*',
                            'schema' => new Schema([
                                'ref' => '#/components/schemas/' . $pkgName,
                            ]),
                        ]),
                    ],
                    'required' => true,
                ]),
                'responses' => [
                    '200' => new Response([
                        'content' => [
                            'application/json' => new MediaType([
                                'mediaType' => 'application/json',
                                'schema' => new Schema([
                                    'ref' => '#/components/schemas/' . $pkgName,
                                ]),
                            ]),
                        ],
                    ]),
                    '201' => new Response([
                        'content' => [
                            'application/json' => new MediaType([
                                'mediaType' => 'application/json',
                                'schema' => new Schema([
                                    'ref' => '#/components/schemas/' . $pkgName,
                                ]),
                            ]),
                        ],
                    ]),
                    '202' => new Response([
                        'content' => [
                            'application/json' => new MediaType([
                                'mediaType' => 'application/json',
                                'schema' => new Schema([
                                    'ref' => '#/components/schemas/' . $pkgName,
                                ]),
                            ]),
                        ],
                    ]),
                    '401' => new Response(['description' => 'Unauthorized']),
                ],
                'x' => [
                    'kubernetes-action' => 'create',
                    'kubernetes-group-version-kind' => (object) [
                        'group' => $group,
                        'kind' => $model,
                        'version' => $version,
                    ],
                ],
            ]),
            'delete' => new Delete([
                'description' => 'delete collection of ' . $model,
                'operationId' => 'delete' . implode('', array_map('ucfirst', [$invertedGroup, $version, 'Collection', $namespaced ? 'Namespaced' : '', $model])),
                'parameters' => self::getCollectionParameters(),
                'responses' => [
                    '200' => new Response([
                        'description' => 'OK',
                        'content' => [
                            'application/json' => new MediaType([
                                'mediaType' => 'application/json',
                                'schema' => new Schema(['ref' => '#/components/schemas/io.k8s.apimachinery.pkg.apis.meta.v1.Status']),
                            ]),
                        ],
                    ]),
                    '401' => new Response(['description' => 'Unauthorized']),
                ],
                'x' => [
                    'kubernetes-action' => 'delete',
                    'kubernetes-group-version-kind' => (object) [
                        'group' => $group,
                        'kind' => $model,
                        'version' => $version,
                    ],
                ],
            ]),
            'parameters' => $pathItemParameters,
        ]);
    }

    public static function generateDetailsPath(mixed $crd, string $model, $version): PathItem
    {
        [$group, $crdNames, $invertedGroup, $pkgName] = self::extractInfo($crd, $version, $model);
        $namespaced = $crd->getScope() === 'Namespaced';
        $namespacePart = $namespaced ? '/namespaces/{namespace}' : '';

        $pathItemParameters = [];
        if ($namespaced) {
            $pathItemParameters[] = new Parameter([
                'name' => 'namespace',
                'in' => 'path',
                'description' => 'object name and auth scope, such as for teams and projects',
                'required' => true,
                'schema' => new Schema([
                    'type' => 'string',
                    'uniqueItems' => true,
                ]),
            ]);
        }

        return new PathItem([
            'path' => sprintf('/apis/%s/%s%s/%s/{name}', $group, $version, $namespacePart, $crdNames->getPlural()),
            'parameters' => [
                ...$pathItemParameters,
                new Parameter([
                    'name' => 'name',
                    'in' => 'path',
                    'description' => 'name of the ' . $model,
                    'required' => true,
                    'schema' => new Schema([
                        'type' => 'string',
                        'uniqueItems' => true,
                    ]),
                ]),
            ],
            'get' => new Get([
                'description' => 'read the specified ' . $model,
                'operationId' => 'read' . implode('', array_map('ucfirst', [$invertedGroup, $version, $namespaced ? 'Namespaced' : '', $model])),
                'parameters' => [
                    new Parameter([
                        'name' => 'resourceVersion',
                        'in' => 'query',
                        'description' => "resourceVersion sets a constraint on what resource versions a request may be served from. See https://kubernetes.io/docs/reference/using-api/api-concepts/#resource-versions for details.\n\nDefaults to unset",
                        'schema' => new Schema([
                            'type' => 'string',
                            'uniqueItems' => true,
                        ]),
                    ]),
                ],
                'responses' => [
                    '200' => new Response([
                        'description' => 'OK',
                        'content' => [
                            'application/json' => new MediaType([
                                'mediaType' => 'application/json',
                                'schema' => new Schema([
                                    'ref' => '#/components/schemas/' . $pkgName,
                                ]),
                            ]),
                        ],
                    ]),
                    '401' => new Response(['description' => 'Unauthorized']),
                ],
                'x' => [
                    'kubernetes-action' => 'get',
                    'kubernetes-group-version-kind' => (object) [
                        'group' => $group,
                        'kind' => $model,
                        'version' => $version,
                    ],
                ],
            ]),
            'patch' => new Patch([
                'description' => 'partially update the specified ' . $model,
                'operationId' => 'patch' . implode('', array_map('ucfirst', [$invertedGroup, $version, $namespaced ? 'Namespaced' : '', $model])),
                'parameters' => [
                    ...self::getCreateParameters(),
                    new Parameter([
                        'name' => 'force',
                        'in' => 'query',
                        'description' => 'Force is going to "force" Apply requests. It means user will re-acquire conflicting fields owned by other people. Force flag must be unset for non-apply patch requests.',
                        'schema' => new Schema([
                            'type' => 'boolean',
                            'uniqueItems' => true,
                        ]),
                    ]),
                ],
                'requestBody' => new RequestBody([
                    'content' => [
                        'application/merge-patch+json' => new MediaType([
                            'mediaType' => 'application/merge-patch+json',
                            'schema' => new Schema(['ref' => '#/components/schemas/io.k8s.apimachinery.pkg.apis.meta.v1.Patch']),
                        ]),
                        'application/json-patch+json' => new MediaType([
                            'mediaType' => 'application/json-patch+json',
                            'schema' => new Schema(['ref' => '#/components/schemas/io.k8s.apimachinery.pkg.apis.meta.v1.Patch']),
                        ]),
                    ],
                ]),
                'responses' => [
                    '200' => new Response([
                        'description' => 'OK',
                        'content' => [
                            'application/json' => new MediaType([
                                'mediaType' => 'application/json',
                                'schema' => new Schema([
                                    'ref' => '#/components/schemas/' . $pkgName,
                                ]),
                            ]),
                        ],
                    ]),
                    '401' => new Response(['description' => 'Unauthorized']),
                ],
                'x' => [
                    'kubernetes-action' => 'patch',
                    'kubernetes-group-version-kind' => (object) [
                        'group' => $group,
                        'kind' => $model,
                        'version' => $version,
                    ],
                ],
            ]),
            'put' => new Put([
                'description' => 'replace the specified ' . $model,
                'operationId' => 'replace' . implode('', array_map('ucfirst', [$invertedGroup, $version, $namespaced ? 'Namespaced' : '', $model])),
                'parameters' => self::getCreateParameters(),
                'responses' => [
                    '200' => new Response([
                        'description' => 'OK',
                        'content' => [
                            'application/json' => new MediaType([
                                'mediaType' => 'application/json',
                                'schema' => new Schema([
                                    'ref' => '#/components/schemas/' . $pkgName,
                                ]),
                            ]),
                        ],
                    ]),
                    '201' => new Response([
                        'description' => 'Created',
                        'content' => [
                            'application/json' => new MediaType([
                                'mediaType' => 'application/json',
                                'schema' => new Schema([
                                    'ref' => '#/components/schemas/' . $pkgName,
                                ]),
                            ]),
                        ],
                    ]),
                    '401' => new Response(['description' => 'Unauthorized']),
                ],
                'x' => [
                    'kubernetes-action' => 'get',
                    'kubernetes-group-version-kind' => (object) [
                        'group' => $group,
                        'kind' => $model,
                        'version' => $version,
                    ],
                ],
            ]),
            'delete' => new Delete([
                'description' => 'delete the specified ' . $model,
                'operationId' => 'delete' . implode('', array_map('ucfirst', [$invertedGroup, $version, $namespaced ? 'Namespaced' : '', $model])),
                'parameters' => [
                    new Parameter([
                        'name' => 'dryRun',
                        'in' => 'query',
                        'description' => 'When present, indicates that modifications should not be persisted. An invalid or unrecognized dryRun directive will result in an error response and no further processing of the request. Valid values are: - All: all dry run stages will be processed',
                        'schema' => new Schema([
                            'type' => 'string',
                            'uniqueItems' => true,
                        ]),
                    ]),
                    new Parameter([
                        'name' => 'gracePeriodSeconds',
                        'in' => 'query',
                        'description' => 'The duration in seconds before the object should be deleted. Value must be non-negative integer. The value zero indicates delete immediately. If this value is nil, the default grace period for the specified type will be used. Defaults to a per object value if not specified. zero means delete immediately.',
                        'schema' => new Schema([
                            'type' => 'integer',
                            'uniqueItems' => true,
                        ]),
                    ]),
                    new Parameter([
                        'name' => 'propagationPolicy',
                        'in' => 'query',
                        'description' => "Whether and how garbage collection will be performed. Either this field or OrphanDependents may be set, but not both. The default policy is decided by the existing finalizer set in the metadata.finalizers and the resource-specific default policy. Acceptable values are: 'Orphan' - orphan the dependents; 'Background' - allow the garbage collector to delete the dependents in the background; 'Foreground' - a cascading policy that deletes all dependents in the foreground.",
                        'schema' => new Schema([
                            'type' => 'string',
                            'uniqueItems' => true,
                        ]),
                    ]),
                ],
                'requestBody' => new RequestBody([
                    'content' => [
                        '*/*' => new MediaType([
                            'mediaType' => '*/*',
                            'schema' => new Schema(['ref' => '#/components/schemas/io.k8s.apimachinery.pkg.apis.meta.v1.DeleteOptions']),
                        ]),
                    ],
                ]),
                'responses' => [
                    '200' => new Response([
                        'description' => 'OK',
                        'content' => [
                            'application/json' => new MediaType([
                                'mediaType' => 'application/json',
                                'schema' => new Schema(['ref' => '#/components/schemas/io.k8s.apimachinery.pkg.apis.meta.v1.Status']),
                            ]),
                        ],
                    ]),
                    '202' => new Response([
                        'description' => 'OK',
                        'content' => [
                            'application/json' => new MediaType([
                                'mediaType' => 'application/json',
                                'schema' => new Schema(['ref' => '#/components/schemas/io.k8s.apimachinery.pkg.apis.meta.v1.Status']),
                            ]),
                        ],
                    ]),
                    '401' => new Response(['description' => 'Unauthorized']),
                ],
                'x' => [
                    'kubernetes-action' => 'delete',
                    'kubernetes-group-version-kind' => (object) [
                        'group' => $group,
                        'kind' => $model,
                        'version' => $version,
                    ],
                ],
            ]),
        ]);
    }

    private static function getCollectionParameters(): array
    {
        return [
            new Parameter([
                'name' => 'allowWatchBookmarks',
                'in' => 'query',
                'description' => "allowWatchBookmarks requests watch events with type \"BOOKMARK\". Servers that do not implement bookmarks may ignore this flag and bookmarks are sent at the server's discretion. Clients should not assume bookmarks are returned at any specific interval, nor may they assume the server will send any BOOKMARK event during a session. If this is not a watch, this field is ignored.",
                'schema' => new Schema([
                    'type' => 'boolean',
                    'uniqueItems' => true,
                ]),
            ]),
            new Parameter([
                'name' => 'continue',
                'in' => 'query',
                'description' => "The continue option should be set when retrieving more results from the server. Since this value is server defined, clients may only use the continue value from a previous query result with identical query parameters (except for the value of continue) and the server may reject a continue value it does not recognize. If the specified continue value is no longer valid whether due to expiration (generally five to fifteen minutes) or a configuration change on the server, the server will respond with a 410 ResourceExpired error together with a continue token. If the client needs a consistent list, it must restart their list without the continue field. Otherwise, the client may send another list request with the token received with the 410 error, the server will respond with a list starting from the next key, but from the latest snapshot, which is inconsistent from the previous list results - objects that are created, modified, or deleted after the first list request will be included in the response, as long as their keys are after the \"next key\".\n\nThis field is not supported when watch is true. Clients may start a watch from the last resourceVersion value returned by the server and not miss any modifications.",
                'schema' => new Schema([
                    'type' => 'string',
                    'uniqueItems' => true,
                ]),
            ]),
            new Parameter([
                'name' => 'fieldSelector',
                'in' => 'query',
                'description' => 'A selector to restrict the list of returned objects by their fields. Defaults to everything.',
                'schema' => new Schema([
                    'type' => 'string',
                    'uniqueItems' => true,
                ]),
            ]),
            new Parameter([
                'name' => 'labelSelector',
                'in' => 'query',
                'description' => 'A selector to restrict the list of returned objects by their labels. Defaults to everything.',
                'schema' => new Schema([
                    'type' => 'string',
                    'uniqueItems' => true,
                ]),
            ]),
            new Parameter([
                'name' => 'limit',
                'in' => 'query',
                'description' => "limit is a maximum number of responses to return for a list call. If more items exist, the server will set the `continue` field on the list metadata to a value that can be used with the same initial query to retrieve the next set of results. Setting a limit may return fewer than the requested amount of items (up to zero items) in the event all requested objects are filtered out and clients should only use the presence of the continue field to determine whether more results are available. Servers may choose not to support the limit argument and will return all of the available results. If limit is specified and the continue field is empty, clients may assume that no more results are available. This field is not supported if watch is true.\n\nThe server guarantees that the objects returned when using continue will be identical to issuing a single list call without a limit - that is, no objects created, modified, or deleted after the first request is issued will be included in any subsequent continued requests. This is sometimes referred to as a consistent snapshot, and ensures that a client that is using limit to receive smaller chunks of a very large result can ensure they see all possible objects. If objects are updated during a chunked list the version of the object that was present at the time the first list result was calculated is returned.",
                'schema' => new Schema([
                    'type' => 'integer',
                    'uniqueItems' => true,
                ]),
            ]),
            new Parameter([
                'name' => 'resourceVersion',
                'in' => 'query',
                'description' => "resourceVersion sets a constraint on what resource versions a request may be served from. See https://kubernetes.io/docs/reference/using-api/api-concepts/#resource-versions for details.\n\nDefaults to unset",
                'schema' => new Schema([
                    'type' => 'string',
                    'uniqueItems' => true,
                ]),
            ]),
            new Parameter([
                'name' => 'resourceVersionMatch',
                'in' => 'query',
                'description' => "resourceVersionMatch determines how resourceVersion is applied to list calls. It is highly recommended that resourceVersionMatch be set for list calls where resourceVersion is set See https://kubernetes.io/docs/reference/using-api/api-concepts/#resource-versions for details.\n\nDefaults to unset",
                'schema' => new Schema([
                    'type' => 'string',
                    'uniqueItems' => true,
                ]),
            ]),
            new Parameter([
                'name' => 'sendInitialEvents',
                'in' => 'query',
                'description' => "`sendInitialEvents=true` may be set together with `watch=true`. In that case, the watch stream will begin with synthetic events to produce the current state of objects in the collection. Once all such events have been sent, a synthetic \"Bookmark\" event  will be sent. The bookmark will report the ResourceVersion (RV) corresponding to the set of objects, and be marked with `\"k8s.io/initial-events-end\": \"true\"` annotation. Afterwards, the watch stream will proceed as usual, sending watch events corresponding to changes (subsequent to the RV) to objects watched.\n\nWhen `sendInitialEvents` option is set, we require `resourceVersionMatch` option to also be set. The semantic of the watch request is as following: - `resourceVersionMatch` = NotOlderThan\n  is interpreted as \"data at least as new as the provided `resourceVersion`\"\n  and the bookmark event is send when the state is synced\n  to a `resourceVersion` at least as fresh as the one provided by the ListOptions.\n  If `resourceVersion` is unset, this is interpreted as \"consistent read\" and the\n  bookmark event is send when the state is synced at least to the moment\n  when request started being processed.\n- `resourceVersionMatch` set to any other value or unset\n  Invalid error is returned.\n\nDefaults to true if `resourceVersion=\"\"` or `resourceVersion=\"0\"` (for backward compatibility reasons) and to false otherwise.",
                'schema' => new Schema([
                    'type' => 'boolean',
                    'uniqueItems' => true,
                ]),
            ]),
            new Parameter([
                'name' => 'timeoutSeconds',
                'in' => 'query',
                'description' => 'Timeout for the list/watch call. This limits the duration of the call, regardless of any activity or inactivity.',
                'schema' => new Schema([
                    'type' => 'integer',
                    'uniqueItems' => true,
                ]),
            ]),
            new Parameter([
                'name' => 'watch',
                'in' => 'query',
                'description' => 'Watch for changes to the described resources and return them as a stream of add, update, and remove notifications. Specify resourceVersion.',
                'schema' => new Schema([
                    'type' => 'boolean',
                    'uniqueItems' => true,
                ]),
            ]),
        ];
    }

    private static function getCreateParameters(): array
    {
        return [
            new Parameter([
                'name' => 'dryRun',
                'in' => 'query',
                'description' => 'When present, indicates that modifications should not be persisted. An invalid or unrecognized dryRun directive will result in an error response and no further processing of the request. Valid values are: - All: all dry run stages will be processed',
                'schema' => new Schema([
                    'type' => 'string',
                    'uniqueItems' => true,
                ]),
            ]),
            new Parameter([
                'name' => 'fieldManager',
                'in' => 'query',
                'description' => 'fieldManager is a name associated with the actor or entity that is making these changes. The value must be less than or 128 characters long, and only contain printable characters, as defined by https://golang.org/pkg/unicode/#IsPrint.',
                'schema' => new Schema([
                    'type' => 'string',
                    'uniqueItems' => true,
                ]),
            ]),
            new Parameter([
                'name' => 'fieldValidation',
                'in' => 'query',
                'description' => 'fieldValidation instructs the server on how to handle objects in the request (POST/PUT/PATCH) containing unknown or duplicate fields. Valid values are: - Ignore: This will ignore any unknown fields that are silently dropped from the object, and will ignore all but the last duplicate field that the decoder encounters. This is the default behavior prior to v1.23. - Warn: This will send a warning via the standard warning response header for each unknown field that is dropped from the object, and for each duplicate field that is encountered. The request will still succeed if there are no other errors, and will only persist the last of any duplicate fields. This is the default in v1.23+ - Strict: This will fail the request with a BadRequest error if any unknown fields would be dropped from the object, or if any duplicate fields are present. The error returned from the server will contain all unknown and duplicate fields encountered.',
                'schema' => new Schema([
                    'type' => 'string',
                    'uniqueItems' => true,
                ]),
            ]),
        ];
    }

    private static function extractInfo(CustomResourceDefinition $crd, $version, string $model): array
    {
        $group = $crd->getGroup();
        $crdNames = $crd->getNames();

        $invertedGroup = implode('', array_map('ucfirst', array_reverse(explode('.', $group))));
        $name = $crd->getName();
        $names = array_reverse(explode('.', $name));
        array_pop($names);

        $pkgName = implode('.', [...$names, $version, $model]);

        return [$group, $crdNames, $invertedGroup, $pkgName];
    }
}
