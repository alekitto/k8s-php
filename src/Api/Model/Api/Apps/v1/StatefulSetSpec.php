<?php

declare(strict_types=1);

namespace Kcs\K8s\Api\Model\Api\Apps\v1;

use Kcs\K8s\Api\Model\Api\Core\v1\PersistentVolumeClaim;
use Kcs\K8s\Api\Model\Api\Core\v1\PodTemplateSpec;
use Kcs\K8s\Api\Model\ApiMachinery\Apis\Meta\v1\LabelSelector;
use Kcs\K8s\Attribute as Kubernetes;
use Kcs\K8s\Attribute\AttributeType;
use Kcs\K8s\Collection;

/**
 * A StatefulSetSpec is the specification of a StatefulSet.
 */
class StatefulSetSpec
{
    #[Kubernetes\Attribute('minReadySeconds')]
    protected int|null $minReadySeconds = null;

    #[Kubernetes\Attribute('ordinals', type: AttributeType::Model, model: StatefulSetOrdinals::class)]
    protected StatefulSetOrdinals|null $ordinals = null;

    #[Kubernetes\Attribute(
        'persistentVolumeClaimRetentionPolicy',
        type: AttributeType::Model,
        model: StatefulSetPersistentVolumeClaimRetentionPolicy::class,
    )]
    protected StatefulSetPersistentVolumeClaimRetentionPolicy|null $persistentVolumeClaimRetentionPolicy = null;

    #[Kubernetes\Attribute('podManagementPolicy')]
    protected string|null $podManagementPolicy = null;

    #[Kubernetes\Attribute('replicas')]
    protected int|null $replicas = null;

    #[Kubernetes\Attribute('revisionHistoryLimit')]
    protected int|null $revisionHistoryLimit = null;

    #[Kubernetes\Attribute('selector', type: AttributeType::Model, model: LabelSelector::class, required: true)]
    protected LabelSelector $selector;

    #[Kubernetes\Attribute('serviceName', required: true)]
    protected string $serviceName;

    #[Kubernetes\Attribute('template', type: AttributeType::Model, model: PodTemplateSpec::class, required: true)]
    protected PodTemplateSpec $template;

    #[Kubernetes\Attribute('updateStrategy', type: AttributeType::Model, model: StatefulSetUpdateStrategy::class)]
    protected StatefulSetUpdateStrategy|null $updateStrategy = null;

    /** @var iterable|PersistentVolumeClaim[]|null */
    #[Kubernetes\Attribute('volumeClaimTemplates', type: AttributeType::Collection, model: PersistentVolumeClaim::class)]
    protected $volumeClaimTemplates = null;

    public function __construct(LabelSelector $selector, string $serviceName, PodTemplateSpec $template)
    {
        $this->selector = $selector;
        $this->serviceName = $serviceName;
        $this->template = $template;
    }

    /**
     * Minimum number of seconds for which a newly created pod should be ready without any of its container
     * crashing for it to be considered available. Defaults to 0 (pod will be considered available as soon
     * as it is ready)
     */
    public function getMinReadySeconds(): int|null
    {
        return $this->minReadySeconds;
    }

    /**
     * Minimum number of seconds for which a newly created pod should be ready without any of its container
     * crashing for it to be considered available. Defaults to 0 (pod will be considered available as soon
     * as it is ready)
     *
     * @return static
     */
    public function setMinReadySeconds(int $minReadySeconds): static
    {
        $this->minReadySeconds = $minReadySeconds;

        return $this;
    }

    /**
     * ordinals controls the numbering of replica indices in a StatefulSet. The default ordinals behavior
     * assigns a "0" index to the first replica and increments the index by one for each additional replica
     * requested.
     */
    public function getOrdinals(): StatefulSetOrdinals|null
    {
        return $this->ordinals;
    }

    /**
     * ordinals controls the numbering of replica indices in a StatefulSet. The default ordinals behavior
     * assigns a "0" index to the first replica and increments the index by one for each additional replica
     * requested.
     *
     * @return static
     */
    public function setOrdinals(StatefulSetOrdinals $ordinals): static
    {
        $this->ordinals = $ordinals;

        return $this;
    }

    /**
     * persistentVolumeClaimRetentionPolicy describes the lifecycle of persistent volume claims created
     * from volumeClaimTemplates. By default, all persistent volume claims are created as needed and
     * retained until manually deleted. This policy allows the lifecycle to be altered, for example by
     * deleting persistent volume claims when their stateful set is deleted, or when their pod is scaled
     * down. This requires the StatefulSetAutoDeletePVC feature gate to be enabled, which is beta.
     */
    public function getPersistentVolumeClaimRetentionPolicy(): StatefulSetPersistentVolumeClaimRetentionPolicy|null
    {
        return $this->persistentVolumeClaimRetentionPolicy;
    }

    /**
     * persistentVolumeClaimRetentionPolicy describes the lifecycle of persistent volume claims created
     * from volumeClaimTemplates. By default, all persistent volume claims are created as needed and
     * retained until manually deleted. This policy allows the lifecycle to be altered, for example by
     * deleting persistent volume claims when their stateful set is deleted, or when their pod is scaled
     * down. This requires the StatefulSetAutoDeletePVC feature gate to be enabled, which is beta.
     *
     * @return static
     */
    public function setPersistentVolumeClaimRetentionPolicy(
        StatefulSetPersistentVolumeClaimRetentionPolicy $persistentVolumeClaimRetentionPolicy,
    ): static {
        $this->persistentVolumeClaimRetentionPolicy = $persistentVolumeClaimRetentionPolicy;

        return $this;
    }

    /**
     * podManagementPolicy controls how pods are created during initial scale up, when replacing pods on
     * nodes, or when scaling down. The default policy is `OrderedReady`, where pods are created in
     * increasing order (pod-0, then pod-1, etc) and the controller will wait until each pod is ready
     * before continuing. When scaling down, the pods are removed in the opposite order. The alternative
     * policy is `Parallel` which will create pods in parallel to match the desired scale without waiting,
     * and on scale down will delete all pods at once.
     */
    public function getPodManagementPolicy(): string|null
    {
        return $this->podManagementPolicy;
    }

    /**
     * podManagementPolicy controls how pods are created during initial scale up, when replacing pods on
     * nodes, or when scaling down. The default policy is `OrderedReady`, where pods are created in
     * increasing order (pod-0, then pod-1, etc) and the controller will wait until each pod is ready
     * before continuing. When scaling down, the pods are removed in the opposite order. The alternative
     * policy is `Parallel` which will create pods in parallel to match the desired scale without waiting,
     * and on scale down will delete all pods at once.
     *
     * @return static
     */
    public function setPodManagementPolicy(string $podManagementPolicy): static
    {
        $this->podManagementPolicy = $podManagementPolicy;

        return $this;
    }

    /**
     * replicas is the desired number of replicas of the given Template. These are replicas in the sense
     * that they are instantiations of the same Template, but individual replicas also have a consistent
     * identity. If unspecified, defaults to 1.
     */
    public function getReplicas(): int|null
    {
        return $this->replicas;
    }

    /**
     * replicas is the desired number of replicas of the given Template. These are replicas in the sense
     * that they are instantiations of the same Template, but individual replicas also have a consistent
     * identity. If unspecified, defaults to 1.
     *
     * @return static
     */
    public function setReplicas(int $replicas): static
    {
        $this->replicas = $replicas;

        return $this;
    }

    /**
     * revisionHistoryLimit is the maximum number of revisions that will be maintained in the StatefulSet's
     * revision history. The revision history consists of all revisions not represented by a currently
     * applied StatefulSetSpec version. The default value is 10.
     */
    public function getRevisionHistoryLimit(): int|null
    {
        return $this->revisionHistoryLimit;
    }

    /**
     * revisionHistoryLimit is the maximum number of revisions that will be maintained in the StatefulSet's
     * revision history. The revision history consists of all revisions not represented by a currently
     * applied StatefulSetSpec version. The default value is 10.
     *
     * @return static
     */
    public function setRevisionHistoryLimit(int $revisionHistoryLimit): static
    {
        $this->revisionHistoryLimit = $revisionHistoryLimit;

        return $this;
    }

    /**
     * selector is a label query over pods that should match the replica count. It must match the pod
     * template's labels. More info:
     * https://kubernetes.io/docs/concepts/overview/working-with-objects/labels/#label-selectors
     */
    public function getSelector(): LabelSelector
    {
        return $this->selector;
    }

    /**
     * selector is a label query over pods that should match the replica count. It must match the pod
     * template's labels. More info:
     * https://kubernetes.io/docs/concepts/overview/working-with-objects/labels/#label-selectors
     *
     * @return static
     */
    public function setSelector(LabelSelector $selector): static
    {
        $this->selector = $selector;

        return $this;
    }

    /**
     * serviceName is the name of the service that governs this StatefulSet. This service must exist before
     * the StatefulSet, and is responsible for the network identity of the set. Pods get DNS/hostnames that
     * follow the pattern: pod-specific-string.serviceName.default.svc.cluster.local where
     * "pod-specific-string" is managed by the StatefulSet controller.
     */
    public function getServiceName(): string
    {
        return $this->serviceName;
    }

    /**
     * serviceName is the name of the service that governs this StatefulSet. This service must exist before
     * the StatefulSet, and is responsible for the network identity of the set. Pods get DNS/hostnames that
     * follow the pattern: pod-specific-string.serviceName.default.svc.cluster.local where
     * "pod-specific-string" is managed by the StatefulSet controller.
     *
     * @return static
     */
    public function setServiceName(string $serviceName): static
    {
        $this->serviceName = $serviceName;

        return $this;
    }

    /**
     * template is the object that describes the pod that will be created if insufficient replicas are
     * detected. Each pod stamped out by the StatefulSet will fulfill this Template, but have a unique
     * identity from the rest of the StatefulSet. Each pod will be named with the format
     * <statefulsetname>-<podindex>. For example, a pod in a StatefulSet named "web" with index number "3"
     * would be named "web-3". The only allowed template.spec.restartPolicy value is "Always".
     */
    public function getTemplate(): PodTemplateSpec
    {
        return $this->template;
    }

    /**
     * template is the object that describes the pod that will be created if insufficient replicas are
     * detected. Each pod stamped out by the StatefulSet will fulfill this Template, but have a unique
     * identity from the rest of the StatefulSet. Each pod will be named with the format
     * <statefulsetname>-<podindex>. For example, a pod in a StatefulSet named "web" with index number "3"
     * would be named "web-3". The only allowed template.spec.restartPolicy value is "Always".
     *
     * @return static
     */
    public function setTemplate(PodTemplateSpec $template): static
    {
        $this->template = $template;

        return $this;
    }

    /**
     * updateStrategy indicates the StatefulSetUpdateStrategy that will be employed to update Pods in the
     * StatefulSet when a revision is made to Template.
     */
    public function getUpdateStrategy(): StatefulSetUpdateStrategy|null
    {
        return $this->updateStrategy;
    }

    /**
     * updateStrategy indicates the StatefulSetUpdateStrategy that will be employed to update Pods in the
     * StatefulSet when a revision is made to Template.
     *
     * @return static
     */
    public function setUpdateStrategy(StatefulSetUpdateStrategy $updateStrategy): static
    {
        $this->updateStrategy = $updateStrategy;

        return $this;
    }

    /**
     * volumeClaimTemplates is a list of claims that pods are allowed to reference. The StatefulSet
     * controller is responsible for mapping network identities to claims in a way that maintains the
     * identity of a pod. Every claim in this list must have at least one matching (by name) volumeMount in
     * one container in the template. A claim in this list takes precedence over any volumes in the
     * template, with the same name.
     *
     * @return iterable|PersistentVolumeClaim[]
     */
    public function getVolumeClaimTemplates(): iterable|null
    {
        return $this->volumeClaimTemplates;
    }

    /**
     * volumeClaimTemplates is a list of claims that pods are allowed to reference. The StatefulSet
     * controller is responsible for mapping network identities to claims in a way that maintains the
     * identity of a pod. Every claim in this list must have at least one matching (by name) volumeMount in
     * one container in the template. A claim in this list takes precedence over any volumes in the
     * template, with the same name.
     *
     * @return static
     */
    public function setVolumeClaimTemplates(iterable $volumeClaimTemplates): static
    {
        $this->volumeClaimTemplates = $volumeClaimTemplates;

        return $this;
    }

    /** @return static */
    public function addVolumeClaimTemplates(PersistentVolumeClaim $volumeClaimTemplate): static
    {
        if (! $this->volumeClaimTemplates) {
            $this->volumeClaimTemplates = new Collection();
        }

        $this->volumeClaimTemplates[] = $volumeClaimTemplate;

        return $this;
    }
}
