<?php

declare(strict_types=1);

namespace Kcs\K8s\Api\Service\AutoScaling\v1;

use Kcs\K8s\Api\Model\Api\AutoScaling\v1\Scale;
use Kcs\K8s\Contract\ApiInterface;
use Kcs\K8s\PatchInterface;

class ScaleService
{
    private string|null $namespace = null;

    public function __construct(private ApiInterface $api)
    {
    }

    public function useNamespace(string $namespace): self
    {
        $this->namespace = $namespace;

        return $this;
    }

    /**
     * Read scale of the specified ReplicationController
     *
     * Allowed query parameters:
     *   pretty
     *
     * @link https://kubernetes.io/docs/reference/generated/kubernetes-api/v1.30/#read-scale-v1-autoscaling
     */
    public function readCoreV1NamespacedReplicationController(string $name, array $query = []): Scale
    {
        $options['query'] = $query;
        $options['method'] = 'get';
        $options['model'] = Scale::class;
        $uri = $this->api->makeUri(
            '/api/v1/namespaces/{namespace}/replicationcontrollers/{name}/scale',
            ['{name}' => $name],
            $query,
            $this->namespace,
        );

        return $this->api->executeHttp(
            $uri,
            'get',
            $options,
        );
    }

    /**
     * Partially update scale of the specified ReplicationController
     *
     * Allowed query parameters:
     *   dryRun
     *   fieldManager
     *   fieldValidation
     *   force
     *   pretty
     *
     * @link https://kubernetes.io/docs/reference/generated/kubernetes-api/v1.30/#patch-scale-v1-autoscaling
     */
    public function patchCoreV1NamespacedReplicationController(
        string $name,
        PatchInterface $patch,
        array $query = [],
    ): Scale {
        $options['query'] = $query;
        $options['method'] = 'patch';
        $options['body'] = $patch;
        $options['model'] = Scale::class;
        $uri = $this->api->makeUri(
            '/api/v1/namespaces/{namespace}/replicationcontrollers/{name}/scale',
            ['{name}' => $name],
            $query,
            $this->namespace,
        );

        return $this->api->executeHttp(
            $uri,
            'patch',
            $options,
        );
    }

    /**
     * Replace scale of the specified ReplicationController
     *
     * Allowed query parameters:
     *   dryRun
     *   fieldManager
     *   fieldValidation
     *   pretty
     *
     * @link https://kubernetes.io/docs/reference/generated/kubernetes-api/v1.30/#put-scale-v1-autoscaling
     */
    public function replaceCoreV1NamespacedReplicationController(string $name, Scale $scale, array $query = []): Scale
    {
        $options['query'] = $query;
        $options['method'] = 'put';
        $options['body'] = $scale;
        $options['model'] = Scale::class;
        $uri = $this->api->makeUri(
            '/api/v1/namespaces/{namespace}/replicationcontrollers/{name}/scale',
            ['{name}' => $name],
            $query,
            $this->namespace,
        );

        return $this->api->executeHttp(
            $uri,
            'put',
            $options,
        );
    }

    /**
     * Read scale of the specified Deployment
     *
     * Allowed query parameters:
     *   pretty
     *
     * @link https://kubernetes.io/docs/reference/generated/kubernetes-api/v1.30/#read-scale-v1-autoscaling
     */
    public function readAppsV1NamespacedDeployment(string $name, array $query = []): Scale
    {
        $options['query'] = $query;
        $options['method'] = 'get';
        $options['model'] = Scale::class;
        $uri = $this->api->makeUri(
            '/apis/apps/v1/namespaces/{namespace}/deployments/{name}/scale',
            ['{name}' => $name],
            $query,
            $this->namespace,
        );

        return $this->api->executeHttp(
            $uri,
            'get',
            $options,
        );
    }

    /**
     * Partially update scale of the specified Deployment
     *
     * Allowed query parameters:
     *   dryRun
     *   fieldManager
     *   fieldValidation
     *   force
     *   pretty
     *
     * @link https://kubernetes.io/docs/reference/generated/kubernetes-api/v1.30/#patch-scale-v1-autoscaling
     */
    public function patchAppsV1NamespacedDeployment(string $name, PatchInterface $patch, array $query = []): Scale
    {
        $options['query'] = $query;
        $options['method'] = 'patch';
        $options['body'] = $patch;
        $options['model'] = Scale::class;
        $uri = $this->api->makeUri(
            '/apis/apps/v1/namespaces/{namespace}/deployments/{name}/scale',
            ['{name}' => $name],
            $query,
            $this->namespace,
        );

        return $this->api->executeHttp(
            $uri,
            'patch',
            $options,
        );
    }

    /**
     * Replace scale of the specified Deployment
     *
     * Allowed query parameters:
     *   dryRun
     *   fieldManager
     *   fieldValidation
     *   pretty
     *
     * @link https://kubernetes.io/docs/reference/generated/kubernetes-api/v1.30/#put-scale-v1-autoscaling
     */
    public function replaceAppsV1NamespacedDeployment(string $name, Scale $scale, array $query = []): Scale
    {
        $options['query'] = $query;
        $options['method'] = 'put';
        $options['body'] = $scale;
        $options['model'] = Scale::class;
        $uri = $this->api->makeUri(
            '/apis/apps/v1/namespaces/{namespace}/deployments/{name}/scale',
            ['{name}' => $name],
            $query,
            $this->namespace,
        );

        return $this->api->executeHttp(
            $uri,
            'put',
            $options,
        );
    }

    /**
     * Read scale of the specified ReplicaSet
     *
     * Allowed query parameters:
     *   pretty
     *
     * @link https://kubernetes.io/docs/reference/generated/kubernetes-api/v1.30/#read-scale-v1-autoscaling
     */
    public function readAppsV1NamespacedReplicaSet(string $name, array $query = []): Scale
    {
        $options['query'] = $query;
        $options['method'] = 'get';
        $options['model'] = Scale::class;
        $uri = $this->api->makeUri(
            '/apis/apps/v1/namespaces/{namespace}/replicasets/{name}/scale',
            ['{name}' => $name],
            $query,
            $this->namespace,
        );

        return $this->api->executeHttp(
            $uri,
            'get',
            $options,
        );
    }

    /**
     * Partially update scale of the specified ReplicaSet
     *
     * Allowed query parameters:
     *   dryRun
     *   fieldManager
     *   fieldValidation
     *   force
     *   pretty
     *
     * @link https://kubernetes.io/docs/reference/generated/kubernetes-api/v1.30/#patch-scale-v1-autoscaling
     */
    public function patchAppsV1NamespacedReplicaSet(string $name, PatchInterface $patch, array $query = []): Scale
    {
        $options['query'] = $query;
        $options['method'] = 'patch';
        $options['body'] = $patch;
        $options['model'] = Scale::class;
        $uri = $this->api->makeUri(
            '/apis/apps/v1/namespaces/{namespace}/replicasets/{name}/scale',
            ['{name}' => $name],
            $query,
            $this->namespace,
        );

        return $this->api->executeHttp(
            $uri,
            'patch',
            $options,
        );
    }

    /**
     * Replace scale of the specified ReplicaSet
     *
     * Allowed query parameters:
     *   dryRun
     *   fieldManager
     *   fieldValidation
     *   pretty
     *
     * @link https://kubernetes.io/docs/reference/generated/kubernetes-api/v1.30/#put-scale-v1-autoscaling
     */
    public function replaceAppsV1NamespacedReplicaSet(string $name, Scale $scale, array $query = []): Scale
    {
        $options['query'] = $query;
        $options['method'] = 'put';
        $options['body'] = $scale;
        $options['model'] = Scale::class;
        $uri = $this->api->makeUri(
            '/apis/apps/v1/namespaces/{namespace}/replicasets/{name}/scale',
            ['{name}' => $name],
            $query,
            $this->namespace,
        );

        return $this->api->executeHttp(
            $uri,
            'put',
            $options,
        );
    }

    /**
     * Read scale of the specified StatefulSet
     *
     * Allowed query parameters:
     *   pretty
     *
     * @link https://kubernetes.io/docs/reference/generated/kubernetes-api/v1.30/#read-scale-v1-autoscaling
     */
    public function readAppsV1NamespacedStatefulSet(string $name, array $query = []): Scale
    {
        $options['query'] = $query;
        $options['method'] = 'get';
        $options['model'] = Scale::class;
        $uri = $this->api->makeUri(
            '/apis/apps/v1/namespaces/{namespace}/statefulsets/{name}/scale',
            ['{name}' => $name],
            $query,
            $this->namespace,
        );

        return $this->api->executeHttp(
            $uri,
            'get',
            $options,
        );
    }

    /**
     * Partially update scale of the specified StatefulSet
     *
     * Allowed query parameters:
     *   dryRun
     *   fieldManager
     *   fieldValidation
     *   force
     *   pretty
     *
     * @link https://kubernetes.io/docs/reference/generated/kubernetes-api/v1.30/#patch-scale-v1-autoscaling
     */
    public function patchAppsV1NamespacedStatefulSet(string $name, PatchInterface $patch, array $query = []): Scale
    {
        $options['query'] = $query;
        $options['method'] = 'patch';
        $options['body'] = $patch;
        $options['model'] = Scale::class;
        $uri = $this->api->makeUri(
            '/apis/apps/v1/namespaces/{namespace}/statefulsets/{name}/scale',
            ['{name}' => $name],
            $query,
            $this->namespace,
        );

        return $this->api->executeHttp(
            $uri,
            'patch',
            $options,
        );
    }

    /**
     * Replace scale of the specified StatefulSet
     *
     * Allowed query parameters:
     *   dryRun
     *   fieldManager
     *   fieldValidation
     *   pretty
     *
     * @link https://kubernetes.io/docs/reference/generated/kubernetes-api/v1.30/#put-scale-v1-autoscaling
     */
    public function replaceAppsV1NamespacedStatefulSet(string $name, Scale $scale, array $query = []): Scale
    {
        $options['query'] = $query;
        $options['method'] = 'put';
        $options['body'] = $scale;
        $options['model'] = Scale::class;
        $uri = $this->api->makeUri(
            '/apis/apps/v1/namespaces/{namespace}/statefulsets/{name}/scale',
            ['{name}' => $name],
            $query,
            $this->namespace,
        );

        return $this->api->executeHttp(
            $uri,
            'put',
            $options,
        );
    }
}
