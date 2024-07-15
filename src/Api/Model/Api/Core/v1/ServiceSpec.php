<?php

declare(strict_types=1);

namespace Kcs\K8s\Api\Model\Api\Core\v1;

use Kcs\K8s\Attribute as Kubernetes;
use Kcs\K8s\Attribute\AttributeType;
use Kcs\K8s\Collection;

/**
 * ServiceSpec describes the attributes that a user creates on a service.
 */
class ServiceSpec
{
    #[Kubernetes\Attribute('allocateLoadBalancerNodePorts')]
    protected bool|null $allocateLoadBalancerNodePorts = null;

    #[Kubernetes\Attribute('clusterIP')]
    protected string|null $clusterIP = null;

    /** @var string[]|null */
    #[Kubernetes\Attribute('clusterIPs')]
    protected array|null $clusterIPs = null;

    /** @var string[]|null */
    #[Kubernetes\Attribute('externalIPs')]
    protected array|null $externalIPs = null;

    #[Kubernetes\Attribute('externalName')]
    protected string|null $externalName = null;

    #[Kubernetes\Attribute('externalTrafficPolicy')]
    protected string|null $externalTrafficPolicy = null;

    #[Kubernetes\Attribute('healthCheckNodePort')]
    protected int|null $healthCheckNodePort = null;

    #[Kubernetes\Attribute('internalTrafficPolicy')]
    protected string|null $internalTrafficPolicy = null;

    /** @var string[]|null */
    #[Kubernetes\Attribute('ipFamilies')]
    protected array|null $ipFamilies = null;

    #[Kubernetes\Attribute('ipFamilyPolicy')]
    protected string|null $ipFamilyPolicy = null;

    #[Kubernetes\Attribute('loadBalancerClass')]
    protected string|null $loadBalancerClass = null;

    #[Kubernetes\Attribute('loadBalancerIP')]
    protected string|null $loadBalancerIP = null;

    /** @var string[]|null */
    #[Kubernetes\Attribute('loadBalancerSourceRanges')]
    protected array|null $loadBalancerSourceRanges = null;

    /** @var iterable|ServicePort[]|null */
    #[Kubernetes\Attribute('ports', type: AttributeType::Collection, model: ServicePort::class)]
    protected $ports = null;

    #[Kubernetes\Attribute('publishNotReadyAddresses')]
    protected bool|null $publishNotReadyAddresses = null;

    /** @var string[]|null */
    #[Kubernetes\Attribute('selector')]
    protected array|null $selector = null;

    #[Kubernetes\Attribute('sessionAffinity')]
    protected string|null $sessionAffinity = null;

    #[Kubernetes\Attribute('sessionAffinityConfig', type: AttributeType::Model, model: SessionAffinityConfig::class)]
    protected SessionAffinityConfig|null $sessionAffinityConfig = null;

    #[Kubernetes\Attribute('trafficDistribution')]
    protected string|null $trafficDistribution = null;

    #[Kubernetes\Attribute('type')]
    protected string|null $type = null;

    /**
     * allocateLoadBalancerNodePorts defines if NodePorts will be automatically allocated for services with
     * type LoadBalancer.  Default is "true". It may be set to "false" if the cluster load-balancer does
     * not rely on NodePorts.  If the caller requests specific NodePorts (by specifying a value), those
     * requests will be respected, regardless of this field. This field may only be set for services with
     * type LoadBalancer and will be cleared if the type is changed to any other type.
     */
    public function isAllocateLoadBalancerNodePorts(): bool|null
    {
        return $this->allocateLoadBalancerNodePorts;
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
        $this->allocateLoadBalancerNodePorts = $allocateLoadBalancerNodePorts;

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
        return $this->clusterIP;
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
        $this->clusterIP = $clusterIP;

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
        return $this->clusterIPs;
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
        $this->clusterIPs = $clusterIPs;

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
        return $this->externalIPs;
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
        $this->externalIPs = $externalIPs;

        return $this;
    }

    /**
     * externalName is the external reference that discovery mechanisms will return as an alias for this
     * service (e.g. a DNS CNAME record). No proxying will be involved.  Must be a lowercase RFC-1123
     * hostname (https://tools.ietf.org/html/rfc1123) and requires `type` to be "ExternalName".
     */
    public function getExternalName(): string|null
    {
        return $this->externalName;
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
        $this->externalName = $externalName;

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
        return $this->externalTrafficPolicy;
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
        $this->externalTrafficPolicy = $externalTrafficPolicy;

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
        return $this->healthCheckNodePort;
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
        $this->healthCheckNodePort = $healthCheckNodePort;

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
        return $this->internalTrafficPolicy;
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
        $this->internalTrafficPolicy = $internalTrafficPolicy;

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
        return $this->ipFamilies;
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
        $this->ipFamilies = $ipFamilies;

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
        return $this->ipFamilyPolicy;
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
        $this->ipFamilyPolicy = $ipFamilyPolicy;

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
        return $this->loadBalancerClass;
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
        $this->loadBalancerClass = $loadBalancerClass;

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
        return $this->loadBalancerIP;
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
        $this->loadBalancerIP = $loadBalancerIP;

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
        return $this->loadBalancerSourceRanges;
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
        $this->loadBalancerSourceRanges = $loadBalancerSourceRanges;

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
        return $this->ports;
    }

    /**
     * The list of ports that are exposed by this service. More info:
     * https://kubernetes.io/docs/concepts/services-networking/service/#virtual-ips-and-service-proxies
     *
     * @return static
     */
    public function setPorts(iterable $ports): static
    {
        $this->ports = $ports;

        return $this;
    }

    /** @return static */
    public function addPorts(ServicePort $port): static
    {
        if (! $this->ports) {
            $this->ports = new Collection();
        }

        $this->ports[] = $port;

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
        return $this->publishNotReadyAddresses;
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
        $this->publishNotReadyAddresses = $publishNotReadyAddresses;

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
        return $this->selector;
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
        $this->selector = $selector;

        return $this;
    }

    /**
     * Supports "ClientIP" and "None". Used to maintain session affinity. Enable client IP based session
     * affinity. Must be ClientIP or None. Defaults to None. More info:
     * https://kubernetes.io/docs/concepts/services-networking/service/#virtual-ips-and-service-proxies
     */
    public function getSessionAffinity(): string|null
    {
        return $this->sessionAffinity;
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
        $this->sessionAffinity = $sessionAffinity;

        return $this;
    }

    /**
     * sessionAffinityConfig contains the configurations of session affinity.
     */
    public function getSessionAffinityConfig(): SessionAffinityConfig|null
    {
        return $this->sessionAffinityConfig;
    }

    /**
     * sessionAffinityConfig contains the configurations of session affinity.
     *
     * @return static
     */
    public function setSessionAffinityConfig(SessionAffinityConfig $sessionAffinityConfig): static
    {
        $this->sessionAffinityConfig = $sessionAffinityConfig;

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
        return $this->trafficDistribution;
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
        $this->trafficDistribution = $trafficDistribution;

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
        return $this->type;
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
        $this->type = $type;

        return $this;
    }
}