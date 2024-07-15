<?php

declare(strict_types=1);

namespace Kcs\K8s\Api\Model\Api\Core\v1;

use DateTimeInterface;
use Kcs\K8s\Api\Model\ApiMachinery\Apis\Meta\v1\ManagedFieldsEntry;
use Kcs\K8s\Api\Model\ApiMachinery\Apis\Meta\v1\ObjectMeta;
use Kcs\K8s\Api\Model\ApiMachinery\Apis\Meta\v1\OwnerReference;
use Kcs\K8s\Attribute as Kubernetes;
use Kcs\K8s\Attribute\AttributeType;

/**
 * Service is a named abstraction of software service (for example, mysql) consisting of local port
 * (for example 3306) that the proxy listens on, and the selector that determines which pods will
 * answer requests sent through the proxy.
 */
#[Kubernetes\Kind('Service', version: 'v1')]
#[Kubernetes\Operation('get', path: '/api/v1/namespaces/{namespace}/services/{name}', response: 'self')]
#[Kubernetes\Operation('get-status', path: '/api/v1/namespaces/{namespace}/services/{name}/status', response: 'self')]
#[Kubernetes\Operation('post', path: '/api/v1/namespaces/{namespace}/services', body: 'model', response: 'self')]
#[Kubernetes\Operation('delete', path: '/api/v1/namespaces/{namespace}/services/{name}', response: 'self')]
#[Kubernetes\Operation(
    'watch',
    path: '/api/v1/namespaces/{namespace}/services',
    response: 'Kcs\K8s\Api\Model\ApiMachinery\Apis\Meta\v1\WatchEvent',
)]
#[Kubernetes\Operation('put', path: '/api/v1/namespaces/{namespace}/services/{name}', body: 'model', response: 'self')]
#[Kubernetes\Operation('put-status', path: '/api/v1/namespaces/{namespace}/services/{name}/status', body: 'model', response: 'self')]
#[Kubernetes\Operation(
    'deletecollection-all',
    path: '/api/v1/namespaces/{namespace}/services',
    response: 'Kcs\K8s\Api\Model\ApiMachinery\Apis\Meta\v1\Status',
)]
#[Kubernetes\Operation('watch-all', path: '/api/v1/services', response: 'Kcs\K8s\Api\Model\ApiMachinery\Apis\Meta\v1\WatchEvent')]
#[Kubernetes\Operation('patch', path: '/api/v1/namespaces/{namespace}/services/{name}', body: 'patch', response: 'self')]
#[Kubernetes\Operation('patch-status', path: '/api/v1/namespaces/{namespace}/services/{name}/status', body: 'patch', response: 'self')]
#[Kubernetes\Operation('list', path: '/api/v1/namespaces/{namespace}/services', response: 'Kcs\K8s\Api\Model\Api\Core\v1\ServiceList')]
#[Kubernetes\Operation('list-all', path: '/api/v1/services', response: 'Kcs\K8s\Api\Model\Api\Core\v1\ServiceList')]
#[Kubernetes\Operation('proxy', path: '/api/v1/namespaces/{namespace}/services/{name}/proxy/{path}')]
class Service
{
    #[Kubernetes\Attribute('apiVersion')]
    protected string $apiVersion = 'v1';

    #[Kubernetes\Attribute('kind')]
    protected string $kind = 'Service';

    #[Kubernetes\Attribute('metadata', type: AttributeType::Model, model: ObjectMeta::class)]
    protected ObjectMeta $metadata;

    #[Kubernetes\Attribute('spec', type: AttributeType::Model, model: ServiceSpec::class)]
    protected ServiceSpec $spec;

    #[Kubernetes\Attribute('status', type: AttributeType::Model, model: ServiceStatus::class)]
    protected ServiceStatus|null $status = null;

    public function __construct(string|null $name)
    {
        $this->metadata = new ObjectMeta($name);
    }

    /**
     * Annotations is an unstructured key value map stored with a resource that may be set by external
     * tools to store and retrieve arbitrary metadata. They are not queryable and should be preserved when
     * modifying objects. More info:
     * https://kubernetes.io/docs/concepts/overview/working-with-objects/annotations
     */
    public function getAnnotations(): array|null
    {
        return $this->metadata->getAnnotations();
    }

    /**
     * Annotations is an unstructured key value map stored with a resource that may be set by external
     * tools to store and retrieve arbitrary metadata. They are not queryable and should be preserved when
     * modifying objects. More info:
     * https://kubernetes.io/docs/concepts/overview/working-with-objects/annotations
     *
     * @return static
     */
    public function setAnnotations(array $annotations): static
    {
        $this->metadata->setAnnotations($annotations);

        return $this;
    }

    /**
     * CreationTimestamp is a timestamp representing the server time when this object was created. It is
     * not guaranteed to be set in happens-before order across separate operations. Clients may not set
     * this value. It is represented in RFC3339 form and is in UTC.
     *
     * Populated by the system. Read-only. Null for lists. More info:
     * https://git.k8s.io/community/contributors/devel/sig-architecture/api-conventions.md#metadata
     */
    public function getCreationTimestamp(): DateTimeInterface|null
    {
        return $this->metadata->getCreationTimestamp();
    }

    /**
     * Number of seconds allowed for this object to gracefully terminate before it will be removed from the
     * system. Only set when deletionTimestamp is also set. May only be shortened. Read-only.
     */
    public function getDeletionGracePeriodSeconds(): int|null
    {
        return $this->metadata->getDeletionGracePeriodSeconds();
    }

    /**
     * DeletionTimestamp is RFC 3339 date and time at which this resource will be deleted. This field is
     * set by the server when a graceful deletion is requested by the user, and is not directly settable by
     * a client. The resource is expected to be deleted (no longer visible from resource lists, and not
     * reachable by name) after the time in this field, once the finalizers list is empty. As long as the
     * finalizers list contains items, deletion is blocked. Once the deletionTimestamp is set, this value
     * may not be unset or be set further into the future, although it may be shortened or the resource may
     * be deleted prior to this time. For example, a user may request that a pod is deleted in 30 seconds.
     * The Kubelet will react by sending a graceful termination signal to the containers in the pod. After
     * that 30 seconds, the Kubelet will send a hard termination signal (SIGKILL) to the container and
     * after cleanup, remove the pod from the API. In the presence of network partitions, this object may
     * still exist after this timestamp, until an administrator or automated process can determine the
     * resource is fully terminated. If not set, graceful deletion of the object has not been requested.
     *
     * Populated by the system when a graceful deletion is requested. Read-only. More info:
     * https://git.k8s.io/community/contributors/devel/sig-architecture/api-conventions.md#metadata
     */
    public function getDeletionTimestamp(): DateTimeInterface|null
    {
        return $this->metadata->getDeletionTimestamp();
    }

    /**
     * Must be empty before the object is deleted from the registry. Each entry is an identifier for the
     * responsible component that will remove the entry from the list. If the deletionTimestamp of the
     * object is non-nil, entries in this list can only be removed. Finalizers may be processed and removed
     * in any order.  Order is NOT enforced because it introduces significant risk of stuck finalizers.
     * finalizers is a shared field, any actor with permission can reorder it. If the finalizer list is
     * processed in order, then this can lead to a situation in which the component responsible for the
     * first finalizer in the list is waiting for a signal (field value, external system, or other)
     * produced by a component responsible for a finalizer later in the list, resulting in a deadlock.
     * Without enforced ordering finalizers are free to order amongst themselves and are not vulnerable to
     * ordering changes in the list.
     */
    public function getFinalizers(): array|null
    {
        return $this->metadata->getFinalizers();
    }

    /**
     * Must be empty before the object is deleted from the registry. Each entry is an identifier for the
     * responsible component that will remove the entry from the list. If the deletionTimestamp of the
     * object is non-nil, entries in this list can only be removed. Finalizers may be processed and removed
     * in any order.  Order is NOT enforced because it introduces significant risk of stuck finalizers.
     * finalizers is a shared field, any actor with permission can reorder it. If the finalizer list is
     * processed in order, then this can lead to a situation in which the component responsible for the
     * first finalizer in the list is waiting for a signal (field value, external system, or other)
     * produced by a component responsible for a finalizer later in the list, resulting in a deadlock.
     * Without enforced ordering finalizers are free to order amongst themselves and are not vulnerable to
     * ordering changes in the list.
     *
     * @return static
     */
    public function setFinalizers(array $finalizers): static
    {
        $this->metadata->setFinalizers($finalizers);

        return $this;
    }

    /**
     * GenerateName is an optional prefix, used by the server, to generate a unique name ONLY IF the Name
     * field has not been provided. If this field is used, the name returned to the client will be
     * different than the name passed. This value will also be combined with a unique suffix. The provided
     * value has the same validation rules as the Name field, and may be truncated by the length of the
     * suffix required to make the value unique on the server.
     *
     * If this field is specified and the generated name exists, the server will return a 409.
     *
     * Applied only if Name is not specified. More info:
     * https://git.k8s.io/community/contributors/devel/sig-architecture/api-conventions.md#idempotency
     */
    public function getGenerateName(): string|null
    {
        return $this->metadata->getGenerateName();
    }

    /**
     * GenerateName is an optional prefix, used by the server, to generate a unique name ONLY IF the Name
     * field has not been provided. If this field is used, the name returned to the client will be
     * different than the name passed. This value will also be combined with a unique suffix. The provided
     * value has the same validation rules as the Name field, and may be truncated by the length of the
     * suffix required to make the value unique on the server.
     *
     * If this field is specified and the generated name exists, the server will return a 409.
     *
     * Applied only if Name is not specified. More info:
     * https://git.k8s.io/community/contributors/devel/sig-architecture/api-conventions.md#idempotency
     *
     * @return static
     */
    public function setGenerateName(string $generateName): static
    {
        $this->metadata->setGenerateName($generateName);

        return $this;
    }

    /**
     * A sequence number representing a specific generation of the desired state. Populated by the system.
     * Read-only.
     */
    public function getGeneration(): int|null
    {
        return $this->metadata->getGeneration();
    }

    /**
     * Map of string keys and values that can be used to organize and categorize (scope and select)
     * objects. May match selectors of replication controllers and services. More info:
     * https://kubernetes.io/docs/concepts/overview/working-with-objects/labels
     */
    public function getLabels(): array|null
    {
        return $this->metadata->getLabels();
    }

    /**
     * Map of string keys and values that can be used to organize and categorize (scope and select)
     * objects. May match selectors of replication controllers and services. More info:
     * https://kubernetes.io/docs/concepts/overview/working-with-objects/labels
     *
     * @return static
     */
    public function setLabels(array $labels): static
    {
        $this->metadata->setLabels($labels);

        return $this;
    }

    /**
     * ManagedFields maps workflow-id and version to the set of fields that are managed by that workflow.
     * This is mostly for internal housekeeping, and users typically shouldn't need to set or understand
     * this field. A workflow can be the user's name, a controller's name, or the name of a specific apply
     * path like "ci-cd". The set of fields is always in the version that the workflow used when modifying
     * the object.
     *
     * @return iterable|ManagedFieldsEntry[]
     */
    public function getManagedFields(): iterable|null
    {
        return $this->metadata->getManagedFields();
    }

    /**
     * ManagedFields maps workflow-id and version to the set of fields that are managed by that workflow.
     * This is mostly for internal housekeeping, and users typically shouldn't need to set or understand
     * this field. A workflow can be the user's name, a controller's name, or the name of a specific apply
     * path like "ci-cd". The set of fields is always in the version that the workflow used when modifying
     * the object.
     *
     * @return static
     */
    public function setManagedFields(iterable $managedFields): static
    {
        $this->metadata->setManagedFields($managedFields);

        return $this;
    }

    /** @return static */
    public function addManagedFields(ManagedFieldsEntry $managedField): static
    {
        $this->metadata->addManagedFields($managedField);

        return $this;
    }

    /**
     * Name must be unique within a namespace. Is required when creating resources, although some resources
     * may allow a client to request the generation of an appropriate name automatically. Name is primarily
     * intended for creation idempotence and configuration definition. Cannot be updated. More info:
     * https://kubernetes.io/docs/concepts/overview/working-with-objects/names#names
     */
    public function getName(): string|null
    {
        return $this->metadata->getName();
    }

    /**
     * Name must be unique within a namespace. Is required when creating resources, although some resources
     * may allow a client to request the generation of an appropriate name automatically. Name is primarily
     * intended for creation idempotence and configuration definition. Cannot be updated. More info:
     * https://kubernetes.io/docs/concepts/overview/working-with-objects/names#names
     *
     * @return static
     */
    public function setName(string $name): static
    {
        $this->metadata->setName($name);

        return $this;
    }

    /**
     * Namespace defines the space within which each name must be unique. An empty namespace is equivalent
     * to the "default" namespace, but "default" is the canonical representation. Not all objects are
     * required to be scoped to a namespace - the value of this field for those objects will be empty.
     *
     * Must be a DNS_LABEL. Cannot be updated. More info:
     * https://kubernetes.io/docs/concepts/overview/working-with-objects/namespaces
     */
    public function getNamespace(): string|null
    {
        return $this->metadata->getNamespace();
    }

    /**
     * Namespace defines the space within which each name must be unique. An empty namespace is equivalent
     * to the "default" namespace, but "default" is the canonical representation. Not all objects are
     * required to be scoped to a namespace - the value of this field for those objects will be empty.
     *
     * Must be a DNS_LABEL. Cannot be updated. More info:
     * https://kubernetes.io/docs/concepts/overview/working-with-objects/namespaces
     *
     * @return static
     */
    public function setNamespace(string $namespace): static
    {
        $this->metadata->setNamespace($namespace);

        return $this;
    }

    /**
     * List of objects depended by this object. If ALL objects in the list have been deleted, this object
     * will be garbage collected. If this object is managed by a controller, then an entry in this list
     * will point to this controller, with the controller field set to true. There cannot be more than one
     * managing controller.
     *
     * @return iterable|OwnerReference[]
     */
    public function getOwnerReferences(): iterable|null
    {
        return $this->metadata->getOwnerReferences();
    }

    /**
     * List of objects depended by this object. If ALL objects in the list have been deleted, this object
     * will be garbage collected. If this object is managed by a controller, then an entry in this list
     * will point to this controller, with the controller field set to true. There cannot be more than one
     * managing controller.
     *
     * @return static
     */
    public function setOwnerReferences(iterable $ownerReferences): static
    {
        $this->metadata->setOwnerReferences($ownerReferences);

        return $this;
    }

    /** @return static */
    public function addOwnerReferences(OwnerReference $ownerReference): static
    {
        $this->metadata->addOwnerReferences($ownerReference);

        return $this;
    }

    /**
     * An opaque value that represents the internal version of this object that can be used by clients to
     * determine when objects have changed. May be used for optimistic concurrency, change detection, and
     * the watch operation on a resource or set of resources. Clients must treat these values as opaque and
     * passed unmodified back to the server. They may only be valid for a particular resource or set of
     * resources.
     *
     * Populated by the system. Read-only. Value must be treated as opaque by clients and . More info:
     * https://git.k8s.io/community/contributors/devel/sig-architecture/api-conventions.md#concurrency-control-and-consistency
     */
    public function getResourceVersion(): string|null
    {
        return $this->metadata->getResourceVersion();
    }

    /**
     * Deprecated: selfLink is a legacy read-only field that is no longer populated by the system.
     */
    public function getSelfLink(): string|null
    {
        return $this->metadata->getSelfLink();
    }

    /**
     * Deprecated: selfLink is a legacy read-only field that is no longer populated by the system.
     *
     * @return static
     */
    public function setSelfLink(string $selfLink): static
    {
        $this->metadata->setSelfLink($selfLink);

        return $this;
    }

    /**
     * UID is the unique in time and space value for this object. It is typically generated by the server
     * on successful creation of a resource and is not allowed to change on PUT operations.
     *
     * Populated by the system. Read-only. More info:
     * https://kubernetes.io/docs/concepts/overview/working-with-objects/names#uids
     */
    public function getUid(): string|null
    {
        return $this->metadata->getUid();
    }

    /**
     * allocateLoadBalancerNodePorts defines if NodePorts will be automatically allocated for services with
     * type LoadBalancer.  Default is "true". It may be set to "false" if the cluster load-balancer does
     * not rely on NodePorts.  If the caller requests specific NodePorts (by specifying a value), those
     * requests will be respected, regardless of this field. This field may only be set for services with
     * type LoadBalancer and will be cleared if the type is changed to any other type.
     */
    public function isAllocateLoadBalancerNodePorts(): bool|null
    {
        return $this->spec->isAllocateLoadBalancerNodePorts();
    }

    /**
     * allocateLoadBalancerNodePorts defines if NodePorts will be automatically allocated for services with
     * type LoadBalancer.  Default is "true". It may be set to "false" if the cluster load-balancer does
     * not rely on NodePorts.  If the caller requests specific NodePorts (by specifying a value), those
     * requests will be respected, regardless of this field. This field may only be set for services with
     * type LoadBalancer and will be cleared if the type is changed to any other type.
     *
     * @return static
     */
    public function setIsAllocateLoadBalancerNodePorts(bool $allocateLoadBalancerNodePorts): static
    {
        $this->spec->setIsAllocateLoadBalancerNodePorts($allocateLoadBalancerNodePorts);

        return $this;
    }

    /**
     * clusterIP is the IP address of the service and is usually assigned randomly. If an address is
     * specified manually, is in-range (as per system configuration), and is not in use, it will be
     * allocated to the service; otherwise creation of the service will fail. This field may not be changed
     * through updates unless the type field is also being changed to ExternalName (which requires this
     * field to be blank) or the type field is being changed from ExternalName (in which case this field
     * may optionally be specified, as describe above).  Valid values are "None", empty string (""), or a
     * valid IP address. Setting this to "None" makes a "headless service" (no virtual IP), which is useful
     * when direct endpoint connections are preferred and proxying is not required.  Only applies to types
     * ClusterIP, NodePort, and LoadBalancer. If this field is specified when creating a Service of type
     * ExternalName, creation will fail. This field will be wiped when updating a Service to type
     * ExternalName. More info:
     * https://kubernetes.io/docs/concepts/services-networking/service/#virtual-ips-and-service-proxies
     */
    public function getClusterIP(): string|null
    {
        return $this->spec->getClusterIP();
    }

    /**
     * clusterIP is the IP address of the service and is usually assigned randomly. If an address is
     * specified manually, is in-range (as per system configuration), and is not in use, it will be
     * allocated to the service; otherwise creation of the service will fail. This field may not be changed
     * through updates unless the type field is also being changed to ExternalName (which requires this
     * field to be blank) or the type field is being changed from ExternalName (in which case this field
     * may optionally be specified, as describe above).  Valid values are "None", empty string (""), or a
     * valid IP address. Setting this to "None" makes a "headless service" (no virtual IP), which is useful
     * when direct endpoint connections are preferred and proxying is not required.  Only applies to types
     * ClusterIP, NodePort, and LoadBalancer. If this field is specified when creating a Service of type
     * ExternalName, creation will fail. This field will be wiped when updating a Service to type
     * ExternalName. More info:
     * https://kubernetes.io/docs/concepts/services-networking/service/#virtual-ips-and-service-proxies
     *
     * @return static
     */
    public function setClusterIP(string $clusterIP): static
    {
        $this->spec->setClusterIP($clusterIP);

        return $this;
    }

    /**
     * ClusterIPs is a list of IP addresses assigned to this service, and are usually assigned randomly.
     * If an address is specified manually, is in-range (as per system configuration), and is not in use,
     * it will be allocated to the service; otherwise creation of the service will fail. This field may not
     * be changed through updates unless the type field is also being changed to ExternalName (which
     * requires this field to be empty) or the type field is being changed from ExternalName (in which case
     * this field may optionally be specified, as describe above).  Valid values are "None", empty string
     * (""), or a valid IP address.  Setting this to "None" makes a "headless service" (no virtual IP),
     * which is useful when direct endpoint connections are preferred and proxying is not required.  Only
     * applies to types ClusterIP, NodePort, and LoadBalancer. If this field is specified when creating a
     * Service of type ExternalName, creation will fail. This field will be wiped when updating a Service
     * to type ExternalName.  If this field is not specified, it will be initialized from the clusterIP
     * field.  If this field is specified, clients must ensure that clusterIPs[0] and clusterIP have the
     * same value.
     *
     * This field may hold a maximum of two entries (dual-stack IPs, in either order). These IPs must
     * correspond to the values of the ipFamilies field. Both clusterIPs and ipFamilies are governed by the
     * ipFamilyPolicy field. More info:
     * https://kubernetes.io/docs/concepts/services-networking/service/#virtual-ips-and-service-proxies
     */
    public function getClusterIPs(): array|null
    {
        return $this->spec->getClusterIPs();
    }

    /**
     * ClusterIPs is a list of IP addresses assigned to this service, and are usually assigned randomly.
     * If an address is specified manually, is in-range (as per system configuration), and is not in use,
     * it will be allocated to the service; otherwise creation of the service will fail. This field may not
     * be changed through updates unless the type field is also being changed to ExternalName (which
     * requires this field to be empty) or the type field is being changed from ExternalName (in which case
     * this field may optionally be specified, as describe above).  Valid values are "None", empty string
     * (""), or a valid IP address.  Setting this to "None" makes a "headless service" (no virtual IP),
     * which is useful when direct endpoint connections are preferred and proxying is not required.  Only
     * applies to types ClusterIP, NodePort, and LoadBalancer. If this field is specified when creating a
     * Service of type ExternalName, creation will fail. This field will be wiped when updating a Service
     * to type ExternalName.  If this field is not specified, it will be initialized from the clusterIP
     * field.  If this field is specified, clients must ensure that clusterIPs[0] and clusterIP have the
     * same value.
     *
     * This field may hold a maximum of two entries (dual-stack IPs, in either order). These IPs must
     * correspond to the values of the ipFamilies field. Both clusterIPs and ipFamilies are governed by the
     * ipFamilyPolicy field. More info:
     * https://kubernetes.io/docs/concepts/services-networking/service/#virtual-ips-and-service-proxies
     *
     * @return static
     */
    public function setClusterIPs(array $clusterIPs): static
    {
        $this->spec->setClusterIPs($clusterIPs);

        return $this;
    }

    /**
     * externalIPs is a list of IP addresses for which nodes in the cluster will also accept traffic for
     * this service.  These IPs are not managed by Kubernetes.  The user is responsible for ensuring that
     * traffic arrives at a node with this IP.  A common example is external load-balancers that are not
     * part of the Kubernetes system.
     */
    public function getExternalIPs(): array|null
    {
        return $this->spec->getExternalIPs();
    }

    /**
     * externalIPs is a list of IP addresses for which nodes in the cluster will also accept traffic for
     * this service.  These IPs are not managed by Kubernetes.  The user is responsible for ensuring that
     * traffic arrives at a node with this IP.  A common example is external load-balancers that are not
     * part of the Kubernetes system.
     *
     * @return static
     */
    public function setExternalIPs(array $externalIPs): static
    {
        $this->spec->setExternalIPs($externalIPs);

        return $this;
    }

    /**
     * externalName is the external reference that discovery mechanisms will return as an alias for this
     * service (e.g. a DNS CNAME record). No proxying will be involved.  Must be a lowercase RFC-1123
     * hostname (https://tools.ietf.org/html/rfc1123) and requires `type` to be "ExternalName".
     */
    public function getExternalName(): string|null
    {
        return $this->spec->getExternalName();
    }

    /**
     * externalName is the external reference that discovery mechanisms will return as an alias for this
     * service (e.g. a DNS CNAME record). No proxying will be involved.  Must be a lowercase RFC-1123
     * hostname (https://tools.ietf.org/html/rfc1123) and requires `type` to be "ExternalName".
     *
     * @return static
     */
    public function setExternalName(string $externalName): static
    {
        $this->spec->setExternalName($externalName);

        return $this;
    }

    /**
     * externalTrafficPolicy describes how nodes distribute service traffic they receive on one of the
     * Service's "externally-facing" addresses (NodePorts, ExternalIPs, and LoadBalancer IPs). If set to
     * "Local", the proxy will configure the service in a way that assumes that external load balancers
     * will take care of balancing the service traffic between nodes, and so each node will deliver traffic
     * only to the node-local endpoints of the service, without masquerading the client source IP. (Traffic
     * mistakenly sent to a node with no endpoints will be dropped.) The default value, "Cluster", uses the
     * standard behavior of routing to all endpoints evenly (possibly modified by topology and other
     * features). Note that traffic sent to an External IP or LoadBalancer IP from within the cluster will
     * always get "Cluster" semantics, but clients sending to a NodePort from within the cluster may need
     * to take traffic policy into account when picking a node.
     */
    public function getExternalTrafficPolicy(): string|null
    {
        return $this->spec->getExternalTrafficPolicy();
    }

    /**
     * externalTrafficPolicy describes how nodes distribute service traffic they receive on one of the
     * Service's "externally-facing" addresses (NodePorts, ExternalIPs, and LoadBalancer IPs). If set to
     * "Local", the proxy will configure the service in a way that assumes that external load balancers
     * will take care of balancing the service traffic between nodes, and so each node will deliver traffic
     * only to the node-local endpoints of the service, without masquerading the client source IP. (Traffic
     * mistakenly sent to a node with no endpoints will be dropped.) The default value, "Cluster", uses the
     * standard behavior of routing to all endpoints evenly (possibly modified by topology and other
     * features). Note that traffic sent to an External IP or LoadBalancer IP from within the cluster will
     * always get "Cluster" semantics, but clients sending to a NodePort from within the cluster may need
     * to take traffic policy into account when picking a node.
     *
     * @return static
     */
    public function setExternalTrafficPolicy(string $externalTrafficPolicy): static
    {
        $this->spec->setExternalTrafficPolicy($externalTrafficPolicy);

        return $this;
    }

    /**
     * healthCheckNodePort specifies the healthcheck nodePort for the service. This only applies when type
     * is set to LoadBalancer and externalTrafficPolicy is set to Local. If a value is specified, is
     * in-range, and is not in use, it will be used.  If not specified, a value will be automatically
     * allocated.  External systems (e.g. load-balancers) can use this port to determine if a given node
     * holds endpoints for this service or not.  If this field is specified when creating a Service which
     * does not need it, creation will fail. This field will be wiped when updating a Service to no longer
     * need it (e.g. changing type). This field cannot be updated once set.
     */
    public function getHealthCheckNodePort(): int|null
    {
        return $this->spec->getHealthCheckNodePort();
    }

    /**
     * healthCheckNodePort specifies the healthcheck nodePort for the service. This only applies when type
     * is set to LoadBalancer and externalTrafficPolicy is set to Local. If a value is specified, is
     * in-range, and is not in use, it will be used.  If not specified, a value will be automatically
     * allocated.  External systems (e.g. load-balancers) can use this port to determine if a given node
     * holds endpoints for this service or not.  If this field is specified when creating a Service which
     * does not need it, creation will fail. This field will be wiped when updating a Service to no longer
     * need it (e.g. changing type). This field cannot be updated once set.
     *
     * @return static
     */
    public function setHealthCheckNodePort(int $healthCheckNodePort): static
    {
        $this->spec->setHealthCheckNodePort($healthCheckNodePort);

        return $this;
    }

    /**
     * InternalTrafficPolicy describes how nodes distribute service traffic they receive on the ClusterIP.
     * If set to "Local", the proxy will assume that pods only want to talk to endpoints of the service on
     * the same node as the pod, dropping the traffic if there are no local endpoints. The default value,
     * "Cluster", uses the standard behavior of routing to all endpoints evenly (possibly modified by
     * topology and other features).
     */
    public function getInternalTrafficPolicy(): string|null
    {
        return $this->spec->getInternalTrafficPolicy();
    }

    /**
     * InternalTrafficPolicy describes how nodes distribute service traffic they receive on the ClusterIP.
     * If set to "Local", the proxy will assume that pods only want to talk to endpoints of the service on
     * the same node as the pod, dropping the traffic if there are no local endpoints. The default value,
     * "Cluster", uses the standard behavior of routing to all endpoints evenly (possibly modified by
     * topology and other features).
     *
     * @return static
     */
    public function setInternalTrafficPolicy(string $internalTrafficPolicy): static
    {
        $this->spec->setInternalTrafficPolicy($internalTrafficPolicy);

        return $this;
    }

    /**
     * IPFamilies is a list of IP families (e.g. IPv4, IPv6) assigned to this service. This field is
     * usually assigned automatically based on cluster configuration and the ipFamilyPolicy field. If this
     * field is specified manually, the requested family is available in the cluster, and ipFamilyPolicy
     * allows it, it will be used; otherwise creation of the service will fail. This field is conditionally
     * mutable: it allows for adding or removing a secondary IP family, but it does not allow changing the
     * primary IP family of the Service. Valid values are "IPv4" and "IPv6".  This field only applies to
     * Services of types ClusterIP, NodePort, and LoadBalancer, and does apply to "headless" services. This
     * field will be wiped when updating a Service to type ExternalName.
     *
     * This field may hold a maximum of two entries (dual-stack families, in either order).  These families
     * must correspond to the values of the clusterIPs field, if specified. Both clusterIPs and ipFamilies
     * are governed by the ipFamilyPolicy field.
     */
    public function getIpFamilies(): array|null
    {
        return $this->spec->getIpFamilies();
    }

    /**
     * IPFamilies is a list of IP families (e.g. IPv4, IPv6) assigned to this service. This field is
     * usually assigned automatically based on cluster configuration and the ipFamilyPolicy field. If this
     * field is specified manually, the requested family is available in the cluster, and ipFamilyPolicy
     * allows it, it will be used; otherwise creation of the service will fail. This field is conditionally
     * mutable: it allows for adding or removing a secondary IP family, but it does not allow changing the
     * primary IP family of the Service. Valid values are "IPv4" and "IPv6".  This field only applies to
     * Services of types ClusterIP, NodePort, and LoadBalancer, and does apply to "headless" services. This
     * field will be wiped when updating a Service to type ExternalName.
     *
     * This field may hold a maximum of two entries (dual-stack families, in either order).  These families
     * must correspond to the values of the clusterIPs field, if specified. Both clusterIPs and ipFamilies
     * are governed by the ipFamilyPolicy field.
     *
     * @return static
     */
    public function setIpFamilies(array $ipFamilies): static
    {
        $this->spec->setIpFamilies($ipFamilies);

        return $this;
    }

    /**
     * IPFamilyPolicy represents the dual-stack-ness requested or required by this Service. If there is no
     * value provided, then this field will be set to SingleStack. Services can be "SingleStack" (a single
     * IP family), "PreferDualStack" (two IP families on dual-stack configured clusters or a single IP
     * family on single-stack clusters), or "RequireDualStack" (two IP families on dual-stack configured
     * clusters, otherwise fail). The ipFamilies and clusterIPs fields depend on the value of this field.
     * This field will be wiped when updating a service to type ExternalName.
     */
    public function getIpFamilyPolicy(): string|null
    {
        return $this->spec->getIpFamilyPolicy();
    }

    /**
     * IPFamilyPolicy represents the dual-stack-ness requested or required by this Service. If there is no
     * value provided, then this field will be set to SingleStack. Services can be "SingleStack" (a single
     * IP family), "PreferDualStack" (two IP families on dual-stack configured clusters or a single IP
     * family on single-stack clusters), or "RequireDualStack" (two IP families on dual-stack configured
     * clusters, otherwise fail). The ipFamilies and clusterIPs fields depend on the value of this field.
     * This field will be wiped when updating a service to type ExternalName.
     *
     * @return static
     */
    public function setIpFamilyPolicy(string $ipFamilyPolicy): static
    {
        $this->spec->setIpFamilyPolicy($ipFamilyPolicy);

        return $this;
    }

    /**
     * loadBalancerClass is the class of the load balancer implementation this Service belongs to. If
     * specified, the value of this field must be a label-style identifier, with an optional prefix, e.g.
     * "internal-vip" or "example.com/internal-vip". Unprefixed names are reserved for end-users. This
     * field can only be set when the Service type is 'LoadBalancer'. If not set, the default load balancer
     * implementation is used, today this is typically done through the cloud provider integration, but
     * should apply for any default implementation. If set, it is assumed that a load balancer
     * implementation is watching for Services with a matching class. Any default load balancer
     * implementation (e.g. cloud providers) should ignore Services that set this field. This field can
     * only be set when creating or updating a Service to type 'LoadBalancer'. Once set, it can not be
     * changed. This field will be wiped when a service is updated to a non 'LoadBalancer' type.
     */
    public function getLoadBalancerClass(): string|null
    {
        return $this->spec->getLoadBalancerClass();
    }

    /**
     * loadBalancerClass is the class of the load balancer implementation this Service belongs to. If
     * specified, the value of this field must be a label-style identifier, with an optional prefix, e.g.
     * "internal-vip" or "example.com/internal-vip". Unprefixed names are reserved for end-users. This
     * field can only be set when the Service type is 'LoadBalancer'. If not set, the default load balancer
     * implementation is used, today this is typically done through the cloud provider integration, but
     * should apply for any default implementation. If set, it is assumed that a load balancer
     * implementation is watching for Services with a matching class. Any default load balancer
     * implementation (e.g. cloud providers) should ignore Services that set this field. This field can
     * only be set when creating or updating a Service to type 'LoadBalancer'. Once set, it can not be
     * changed. This field will be wiped when a service is updated to a non 'LoadBalancer' type.
     *
     * @return static
     */
    public function setLoadBalancerClass(string $loadBalancerClass): static
    {
        $this->spec->setLoadBalancerClass($loadBalancerClass);

        return $this;
    }

    /**
     * Only applies to Service Type: LoadBalancer. This feature depends on whether the underlying
     * cloud-provider supports specifying the loadBalancerIP when a load balancer is created. This field
     * will be ignored if the cloud-provider does not support the feature. Deprecated: This field was
     * under-specified and its meaning varies across implementations. Using it is non-portable and it may
     * not support dual-stack. Users are encouraged to use implementation-specific annotations when
     * available.
     */
    public function getLoadBalancerIP(): string|null
    {
        return $this->spec->getLoadBalancerIP();
    }

    /**
     * Only applies to Service Type: LoadBalancer. This feature depends on whether the underlying
     * cloud-provider supports specifying the loadBalancerIP when a load balancer is created. This field
     * will be ignored if the cloud-provider does not support the feature. Deprecated: This field was
     * under-specified and its meaning varies across implementations. Using it is non-portable and it may
     * not support dual-stack. Users are encouraged to use implementation-specific annotations when
     * available.
     *
     * @return static
     */
    public function setLoadBalancerIP(string $loadBalancerIP): static
    {
        $this->spec->setLoadBalancerIP($loadBalancerIP);

        return $this;
    }

    /**
     * If specified and supported by the platform, this will restrict traffic through the cloud-provider
     * load-balancer will be restricted to the specified client IPs. This field will be ignored if the
     * cloud-provider does not support the feature." More info:
     * https://kubernetes.io/docs/tasks/access-application-cluster/create-external-load-balancer/
     */
    public function getLoadBalancerSourceRanges(): array|null
    {
        return $this->spec->getLoadBalancerSourceRanges();
    }

    /**
     * If specified and supported by the platform, this will restrict traffic through the cloud-provider
     * load-balancer will be restricted to the specified client IPs. This field will be ignored if the
     * cloud-provider does not support the feature." More info:
     * https://kubernetes.io/docs/tasks/access-application-cluster/create-external-load-balancer/
     *
     * @return static
     */
    public function setLoadBalancerSourceRanges(array $loadBalancerSourceRanges): static
    {
        $this->spec->setLoadBalancerSourceRanges($loadBalancerSourceRanges);

        return $this;
    }

    /**
     * The list of ports that are exposed by this service. More info:
     * https://kubernetes.io/docs/concepts/services-networking/service/#virtual-ips-and-service-proxies
     *
     * @return iterable|ServicePort[]
     */
    public function getPorts(): iterable|null
    {
        return $this->spec->getPorts();
    }

    /**
     * The list of ports that are exposed by this service. More info:
     * https://kubernetes.io/docs/concepts/services-networking/service/#virtual-ips-and-service-proxies
     *
     * @return static
     */
    public function setPorts(iterable $ports): static
    {
        $this->spec->setPorts($ports);

        return $this;
    }

    /** @return static */
    public function addPorts(ServicePort $port): static
    {
        $this->spec->addPorts($port);

        return $this;
    }

    /**
     * publishNotReadyAddresses indicates that any agent which deals with endpoints for this Service should
     * disregard any indications of ready/not-ready. The primary use case for setting this field is for a
     * StatefulSet's Headless Service to propagate SRV DNS records for its Pods for the purpose of peer
     * discovery. The Kubernetes controllers that generate Endpoints and EndpointSlice resources for
     * Services interpret this to mean that all endpoints are considered "ready" even if the Pods
     * themselves are not. Agents which consume only Kubernetes generated endpoints through the Endpoints
     * or EndpointSlice resources can safely assume this behavior.
     */
    public function isPublishNotReadyAddresses(): bool|null
    {
        return $this->spec->isPublishNotReadyAddresses();
    }

    /**
     * publishNotReadyAddresses indicates that any agent which deals with endpoints for this Service should
     * disregard any indications of ready/not-ready. The primary use case for setting this field is for a
     * StatefulSet's Headless Service to propagate SRV DNS records for its Pods for the purpose of peer
     * discovery. The Kubernetes controllers that generate Endpoints and EndpointSlice resources for
     * Services interpret this to mean that all endpoints are considered "ready" even if the Pods
     * themselves are not. Agents which consume only Kubernetes generated endpoints through the Endpoints
     * or EndpointSlice resources can safely assume this behavior.
     *
     * @return static
     */
    public function setIsPublishNotReadyAddresses(bool $publishNotReadyAddresses): static
    {
        $this->spec->setIsPublishNotReadyAddresses($publishNotReadyAddresses);

        return $this;
    }

    /**
     * Route service traffic to pods with label keys and values matching this selector. If empty or not
     * present, the service is assumed to have an external process managing its endpoints, which Kubernetes
     * will not modify. Only applies to types ClusterIP, NodePort, and LoadBalancer. Ignored if type is
     * ExternalName. More info: https://kubernetes.io/docs/concepts/services-networking/service/
     */
    public function getSelector(): array|null
    {
        return $this->spec->getSelector();
    }

    /**
     * Route service traffic to pods with label keys and values matching this selector. If empty or not
     * present, the service is assumed to have an external process managing its endpoints, which Kubernetes
     * will not modify. Only applies to types ClusterIP, NodePort, and LoadBalancer. Ignored if type is
     * ExternalName. More info: https://kubernetes.io/docs/concepts/services-networking/service/
     *
     * @return static
     */
    public function setSelector(array $selector): static
    {
        $this->spec->setSelector($selector);

        return $this;
    }

    /**
     * Supports "ClientIP" and "None". Used to maintain session affinity. Enable client IP based session
     * affinity. Must be ClientIP or None. Defaults to None. More info:
     * https://kubernetes.io/docs/concepts/services-networking/service/#virtual-ips-and-service-proxies
     */
    public function getSessionAffinity(): string|null
    {
        return $this->spec->getSessionAffinity();
    }

    /**
     * Supports "ClientIP" and "None". Used to maintain session affinity. Enable client IP based session
     * affinity. Must be ClientIP or None. Defaults to None. More info:
     * https://kubernetes.io/docs/concepts/services-networking/service/#virtual-ips-and-service-proxies
     *
     * @return static
     */
    public function setSessionAffinity(string $sessionAffinity): static
    {
        $this->spec->setSessionAffinity($sessionAffinity);

        return $this;
    }

    /**
     * sessionAffinityConfig contains the configurations of session affinity.
     */
    public function getSessionAffinityConfig(): SessionAffinityConfig|null
    {
        return $this->spec->getSessionAffinityConfig();
    }

    /**
     * sessionAffinityConfig contains the configurations of session affinity.
     *
     * @return static
     */
    public function setSessionAffinityConfig(SessionAffinityConfig $sessionAffinityConfig): static
    {
        $this->spec->setSessionAffinityConfig($sessionAffinityConfig);

        return $this;
    }

    /**
     * TrafficDistribution offers a way to express preferences for how traffic is distributed to Service
     * endpoints. Implementations can use this field as a hint, but are not required to guarantee strict
     * adherence. If the field is not set, the implementation will apply its default routing strategy. If
     * set to "PreferClose", implementations should prioritize endpoints that are topologically close
     * (e.g., same zone). This is an alpha field and requires enabling ServiceTrafficDistribution feature.
     */
    public function getTrafficDistribution(): string|null
    {
        return $this->spec->getTrafficDistribution();
    }

    /**
     * TrafficDistribution offers a way to express preferences for how traffic is distributed to Service
     * endpoints. Implementations can use this field as a hint, but are not required to guarantee strict
     * adherence. If the field is not set, the implementation will apply its default routing strategy. If
     * set to "PreferClose", implementations should prioritize endpoints that are topologically close
     * (e.g., same zone). This is an alpha field and requires enabling ServiceTrafficDistribution feature.
     *
     * @return static
     */
    public function setTrafficDistribution(string $trafficDistribution): static
    {
        $this->spec->setTrafficDistribution($trafficDistribution);

        return $this;
    }

    /**
     * type determines how the Service is exposed. Defaults to ClusterIP. Valid options are ExternalName,
     * ClusterIP, NodePort, and LoadBalancer. "ClusterIP" allocates a cluster-internal IP address for
     * load-balancing to endpoints. Endpoints are determined by the selector or if that is not specified,
     * by manual construction of an Endpoints object or EndpointSlice objects. If clusterIP is "None", no
     * virtual IP is allocated and the endpoints are published as a set of endpoints rather than a virtual
     * IP. "NodePort" builds on ClusterIP and allocates a port on every node which routes to the same
     * endpoints as the clusterIP. "LoadBalancer" builds on NodePort and creates an external load-balancer
     * (if supported in the current cloud) which routes to the same endpoints as the clusterIP.
     * "ExternalName" aliases this service to the specified externalName. Several other fields do not apply
     * to ExternalName services. More info:
     * https://kubernetes.io/docs/concepts/services-networking/service/#publishing-services-service-types
     */
    public function getType(): string|null
    {
        return $this->spec->getType();
    }

    /**
     * type determines how the Service is exposed. Defaults to ClusterIP. Valid options are ExternalName,
     * ClusterIP, NodePort, and LoadBalancer. "ClusterIP" allocates a cluster-internal IP address for
     * load-balancing to endpoints. Endpoints are determined by the selector or if that is not specified,
     * by manual construction of an Endpoints object or EndpointSlice objects. If clusterIP is "None", no
     * virtual IP is allocated and the endpoints are published as a set of endpoints rather than a virtual
     * IP. "NodePort" builds on ClusterIP and allocates a port on every node which routes to the same
     * endpoints as the clusterIP. "LoadBalancer" builds on NodePort and creates an external load-balancer
     * (if supported in the current cloud) which routes to the same endpoints as the clusterIP.
     * "ExternalName" aliases this service to the specified externalName. Several other fields do not apply
     * to ExternalName services. More info:
     * https://kubernetes.io/docs/concepts/services-networking/service/#publishing-services-service-types
     *
     * @return static
     */
    public function setType(string $type): static
    {
        $this->spec->setType($type);

        return $this;
    }

    /**
     * APIVersion defines the versioned schema of this representation of an object. Servers should convert
     * recognized schemas to the latest internal value, and may reject unrecognized values. More info:
     * https://git.k8s.io/community/contributors/devel/sig-architecture/api-conventions.md#resources
     */
    public function getApiVersion(): string
    {
        return $this->apiVersion;
    }

    /**
     * APIVersion defines the versioned schema of this representation of an object. Servers should convert
     * recognized schemas to the latest internal value, and may reject unrecognized values. More info:
     * https://git.k8s.io/community/contributors/devel/sig-architecture/api-conventions.md#resources
     *
     * @return static
     */
    public function setApiVersion(string $apiVersion): static
    {
        $this->apiVersion = $apiVersion;

        return $this;
    }

    /**
     * Kind is a string value representing the REST resource this object represents. Servers may infer this
     * from the endpoint the client submits requests to. Cannot be updated. In CamelCase. More info:
     * https://git.k8s.io/community/contributors/devel/sig-architecture/api-conventions.md#types-kinds
     */
    public function getKind(): string
    {
        return $this->kind;
    }

    /**
     * Kind is a string value representing the REST resource this object represents. Servers may infer this
     * from the endpoint the client submits requests to. Cannot be updated. In CamelCase. More info:
     * https://git.k8s.io/community/contributors/devel/sig-architecture/api-conventions.md#types-kinds
     *
     * @return static
     */
    public function setKind(string $kind): static
    {
        $this->kind = $kind;

        return $this;
    }

    /**
     * Standard object's metadata. More info:
     * https://git.k8s.io/community/contributors/devel/sig-architecture/api-conventions.md#metadata
     */
    public function getMetadata(): ObjectMeta
    {
        return $this->metadata;
    }

    /**
     * Standard object's metadata. More info:
     * https://git.k8s.io/community/contributors/devel/sig-architecture/api-conventions.md#metadata
     *
     * @return static
     */
    public function setMetadata(ObjectMeta $metadata): static
    {
        $this->metadata = $metadata;

        return $this;
    }

    /**
     * Spec defines the behavior of a service.
     * https://git.k8s.io/community/contributors/devel/sig-architecture/api-conventions.md#spec-and-status
     */
    public function getSpec(): ServiceSpec
    {
        return $this->spec;
    }

    /**
     * Spec defines the behavior of a service.
     * https://git.k8s.io/community/contributors/devel/sig-architecture/api-conventions.md#spec-and-status
     *
     * @return static
     */
    public function setSpec(ServiceSpec $spec): static
    {
        $this->spec = $spec;

        return $this;
    }

    /**
     * Most recently observed status of the service. Populated by the system. Read-only. More info:
     * https://git.k8s.io/community/contributors/devel/sig-architecture/api-conventions.md#spec-and-status
     */
    public function getStatus(): ServiceStatus|null
    {
        return $this->status;
    }
}
