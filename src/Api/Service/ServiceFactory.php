<?php

declare(strict_types=1);

namespace Kcs\K8s\Api\Service;

use Kcs\K8s\Api\Service\AdmissionRegistration\v1\MutatingWebhookConfigurationService;
use Kcs\K8s\Api\Service\AdmissionRegistration\v1\ValidatingAdmissionPolicyBindingService;
use Kcs\K8s\Api\Service\AdmissionRegistration\v1\ValidatingAdmissionPolicyService;
use Kcs\K8s\Api\Service\AdmissionRegistration\v1\ValidatingWebhookConfigurationService;
use Kcs\K8s\Api\Service\AdmissionRegistration\v1alpha1\ValidatingAdmissionPolicyBindingService as ValidatingAdmissionPolicyBindingService1;
use Kcs\K8s\Api\Service\AdmissionRegistration\v1alpha1\ValidatingAdmissionPolicyService as ValidatingAdmissionPolicyService1;
use Kcs\K8s\Api\Service\AdmissionRegistration\v1beta1\ValidatingAdmissionPolicyBindingService as ValidatingAdmissionPolicyBindingService2;
use Kcs\K8s\Api\Service\AdmissionRegistration\v1beta1\ValidatingAdmissionPolicyService as ValidatingAdmissionPolicyService2;
use Kcs\K8s\Api\Service\ApiExtensions\v1\CustomResourceDefinitionService;
use Kcs\K8s\Api\Service\ApiRegistration\v1\APIServiceService;
use Kcs\K8s\Api\Service\Apps\v1\ControllerRevisionService;
use Kcs\K8s\Api\Service\Apps\v1\DaemonSetService;
use Kcs\K8s\Api\Service\Apps\v1\DeploymentService;
use Kcs\K8s\Api\Service\Apps\v1\ReplicaSetService;
use Kcs\K8s\Api\Service\Apps\v1\StatefulSetService;
use Kcs\K8s\Api\Service\Authentication\v1\SelfSubjectReviewService;
use Kcs\K8s\Api\Service\Authentication\v1\TokenRequestService;
use Kcs\K8s\Api\Service\Authentication\v1\TokenReviewService;
use Kcs\K8s\Api\Service\Authentication\v1alpha1\SelfSubjectReviewService as SelfSubjectReviewService1;
use Kcs\K8s\Api\Service\Authentication\v1beta1\SelfSubjectReviewService as SelfSubjectReviewService2;
use Kcs\K8s\Api\Service\Authorization\v1\LocalSubjectAccessReviewService;
use Kcs\K8s\Api\Service\Authorization\v1\SelfSubjectAccessReviewService;
use Kcs\K8s\Api\Service\Authorization\v1\SelfSubjectRulesReviewService;
use Kcs\K8s\Api\Service\Authorization\v1\SubjectAccessReviewService;
use Kcs\K8s\Api\Service\AutoScaling\v1\HorizontalPodAutoscalerService;
use Kcs\K8s\Api\Service\AutoScaling\v1\ScaleService;
use Kcs\K8s\Api\Service\AutoScaling\v2\HorizontalPodAutoscalerService as HorizontalPodAutoscalerService1;
use Kcs\K8s\Api\Service\Batch\v1\CronJobService;
use Kcs\K8s\Api\Service\Batch\v1\JobService;
use Kcs\K8s\Api\Service\Certificates\v1\CertificateSigningRequestService;
use Kcs\K8s\Api\Service\Certificates\v1alpha1\ClusterTrustBundleService;
use Kcs\K8s\Api\Service\Coordination\v1\LeaseService;
use Kcs\K8s\Api\Service\Core\v1\BindingService;
use Kcs\K8s\Api\Service\Core\v1\ComponentStatusService;
use Kcs\K8s\Api\Service\Core\v1\ConfigMapService;
use Kcs\K8s\Api\Service\Core\v1\EndpointsService;
use Kcs\K8s\Api\Service\Core\v1\EventService;
use Kcs\K8s\Api\Service\Core\v1\LimitRangeService;
use Kcs\K8s\Api\Service\Core\v1\NamespaceService;
use Kcs\K8s\Api\Service\Core\v1\NodeProxyOptionsService;
use Kcs\K8s\Api\Service\Core\v1\NodeService;
use Kcs\K8s\Api\Service\Core\v1\PersistentVolumeClaimService;
use Kcs\K8s\Api\Service\Core\v1\PersistentVolumeService;
use Kcs\K8s\Api\Service\Core\v1\PodAttachOptionsService;
use Kcs\K8s\Api\Service\Core\v1\PodExecOptionsService;
use Kcs\K8s\Api\Service\Core\v1\PodPortForwardOptionsService;
use Kcs\K8s\Api\Service\Core\v1\PodProxyOptionsService;
use Kcs\K8s\Api\Service\Core\v1\PodService;
use Kcs\K8s\Api\Service\Core\v1\PodTemplateService;
use Kcs\K8s\Api\Service\Core\v1\ReplicationControllerService;
use Kcs\K8s\Api\Service\Core\v1\ResourceQuotaService;
use Kcs\K8s\Api\Service\Core\v1\SecretService;
use Kcs\K8s\Api\Service\Core\v1\ServiceAccountService;
use Kcs\K8s\Api\Service\Core\v1\ServiceProxyOptionsService;
use Kcs\K8s\Api\Service\Core\v1\ServiceService;
use Kcs\K8s\Api\Service\Discovery\v1\EndpointSliceService;
use Kcs\K8s\Api\Service\Events\v1\EventService as EventService1;
use Kcs\K8s\Api\Service\FlowControl\ApiServer\v1\FlowSchemaService;
use Kcs\K8s\Api\Service\FlowControl\ApiServer\v1\PriorityLevelConfigurationService;
use Kcs\K8s\Api\Service\FlowControl\ApiServer\v1beta3\FlowSchemaService as FlowSchemaService1;
use Kcs\K8s\Api\Service\FlowControl\ApiServer\v1beta3\PriorityLevelConfigurationService as PriorityLevelConfigurationService1;
use Kcs\K8s\Api\Service\Internal\ApiServer\v1alpha1\StorageVersionService;
use Kcs\K8s\Api\Service\Networking\v1\IngressClassService;
use Kcs\K8s\Api\Service\Networking\v1\IngressService;
use Kcs\K8s\Api\Service\Networking\v1\NetworkPolicyService;
use Kcs\K8s\Api\Service\Networking\v1beta1\IPAddressService;
use Kcs\K8s\Api\Service\Networking\v1beta1\ServiceCIDRService;
use Kcs\K8s\Api\Service\Node\v1\RuntimeClassService;
use Kcs\K8s\Api\Service\Policy\v1\EvictionService;
use Kcs\K8s\Api\Service\Policy\v1\PodDisruptionBudgetService;
use Kcs\K8s\Api\Service\Rbac\Authorization\v1\ClusterRoleBindingService;
use Kcs\K8s\Api\Service\Rbac\Authorization\v1\ClusterRoleService;
use Kcs\K8s\Api\Service\Rbac\Authorization\v1\RoleBindingService;
use Kcs\K8s\Api\Service\Rbac\Authorization\v1\RoleService;
use Kcs\K8s\Api\Service\Resource\v1alpha2\PodSchedulingContextService;
use Kcs\K8s\Api\Service\Resource\v1alpha2\ResourceClaimParametersService;
use Kcs\K8s\Api\Service\Resource\v1alpha2\ResourceClaimService;
use Kcs\K8s\Api\Service\Resource\v1alpha2\ResourceClaimTemplateService;
use Kcs\K8s\Api\Service\Resource\v1alpha2\ResourceClassParametersService;
use Kcs\K8s\Api\Service\Resource\v1alpha2\ResourceClassService;
use Kcs\K8s\Api\Service\Resource\v1alpha2\ResourceSliceService;
use Kcs\K8s\Api\Service\Scheduling\v1\PriorityClassService;
use Kcs\K8s\Api\Service\Storage\v1\CSIDriverService;
use Kcs\K8s\Api\Service\Storage\v1\CSINodeService;
use Kcs\K8s\Api\Service\Storage\v1\CSIStorageCapacityService;
use Kcs\K8s\Api\Service\Storage\v1\StorageClassService;
use Kcs\K8s\Api\Service\Storage\v1\VolumeAttachmentService;
use Kcs\K8s\Api\Service\Storage\v1alpha1\VolumeAttributesClassService;
use Kcs\K8s\Api\Service\Storagemigration\v1alpha1\StorageVersionMigrationService;
use Kcs\K8s\Contract\ApiInterface;

class ServiceFactory
{
    public function __construct(private ApiInterface $api)
    {
    }

    public function v1CoreComponentStatus(): ComponentStatusService
    {
        return new ComponentStatusService($this->api);
    }

    public function v1CoreConfigMap(): ConfigMapService
    {
        return new ConfigMapService($this->api);
    }

    public function v1CoreEndpoints(): EndpointsService
    {
        return new EndpointsService($this->api);
    }

    public function v1CoreEvent(): EventService
    {
        return new EventService($this->api);
    }

    public function v1CoreLimitRange(): LimitRangeService
    {
        return new LimitRangeService($this->api);
    }

    public function v1CoreNamespace(): NamespaceService
    {
        return new NamespaceService($this->api);
    }

    public function v1CoreBinding(): BindingService
    {
        return new BindingService($this->api);
    }

    public function v1CorePersistentVolumeClaim(): PersistentVolumeClaimService
    {
        return new PersistentVolumeClaimService($this->api);
    }

    public function v1CorePod(): PodService
    {
        return new PodService($this->api);
    }

    public function v1CorePodAttachOptions(): PodAttachOptionsService
    {
        return new PodAttachOptionsService($this->api);
    }

    public function v1CorePodExecOptions(): PodExecOptionsService
    {
        return new PodExecOptionsService($this->api);
    }

    public function v1CorePodPortForwardOptions(): PodPortForwardOptionsService
    {
        return new PodPortForwardOptionsService($this->api);
    }

    public function v1CorePodProxyOptions(): PodProxyOptionsService
    {
        return new PodProxyOptionsService($this->api);
    }

    public function v1CorePodTemplate(): PodTemplateService
    {
        return new PodTemplateService($this->api);
    }

    public function v1CoreReplicationController(): ReplicationControllerService
    {
        return new ReplicationControllerService($this->api);
    }

    public function v1CoreResourceQuota(): ResourceQuotaService
    {
        return new ResourceQuotaService($this->api);
    }

    public function v1CoreSecret(): SecretService
    {
        return new SecretService($this->api);
    }

    public function v1CoreServiceAccount(): ServiceAccountService
    {
        return new ServiceAccountService($this->api);
    }

    public function v1CoreService(): ServiceService
    {
        return new ServiceService($this->api);
    }

    public function v1CoreServiceProxyOptions(): ServiceProxyOptionsService
    {
        return new ServiceProxyOptionsService($this->api);
    }

    public function v1CoreNode(): NodeService
    {
        return new NodeService($this->api);
    }

    public function v1CoreNodeProxyOptions(): NodeProxyOptionsService
    {
        return new NodeProxyOptionsService($this->api);
    }

    public function v1CorePersistentVolume(): PersistentVolumeService
    {
        return new PersistentVolumeService($this->api);
    }

    public function v1PolicyEviction(): EvictionService
    {
        return new EvictionService($this->api);
    }

    public function v1PolicyPodDisruptionBudget(): PodDisruptionBudgetService
    {
        return new PodDisruptionBudgetService($this->api);
    }

    public function v1AutoscalingScale(): ScaleService
    {
        return new ScaleService($this->api);
    }

    public function v1AutoscalingHorizontalPodAutoscaler(): HorizontalPodAutoscalerService
    {
        return new HorizontalPodAutoscalerService($this->api);
    }

    public function v2AutoscalingHorizontalPodAutoscaler(): HorizontalPodAutoscalerService1
    {
        return new HorizontalPodAutoscalerService1($this->api);
    }

    public function v1AuthenticationTokenRequest(): TokenRequestService
    {
        return new TokenRequestService($this->api);
    }

    public function v1AuthenticationSelfSubjectReview(): SelfSubjectReviewService
    {
        return new SelfSubjectReviewService($this->api);
    }

    public function v1alpha1AuthenticationSelfSubjectReview(): SelfSubjectReviewService1
    {
        return new SelfSubjectReviewService1($this->api);
    }

    public function v1beta1AuthenticationSelfSubjectReview(): SelfSubjectReviewService2
    {
        return new SelfSubjectReviewService2($this->api);
    }

    public function v1AuthenticationTokenReview(): TokenReviewService
    {
        return new TokenReviewService($this->api);
    }

    public function v1AdmissionregistrationMutatingWebhookConfiguration(): MutatingWebhookConfigurationService
    {
        return new MutatingWebhookConfigurationService($this->api);
    }

    public function v1AdmissionregistrationValidatingAdmissionPolicy(): ValidatingAdmissionPolicyService
    {
        return new ValidatingAdmissionPolicyService($this->api);
    }

    public function v1alpha1AdmissionregistrationValidatingAdmissionPolicy(): ValidatingAdmissionPolicyService1
    {
        return new ValidatingAdmissionPolicyService1($this->api);
    }

    public function v1beta1AdmissionregistrationValidatingAdmissionPolicy(): ValidatingAdmissionPolicyService2
    {
        return new ValidatingAdmissionPolicyService2($this->api);
    }

    public function v1AdmissionregistrationValidatingAdmissionPolicyBinding(): ValidatingAdmissionPolicyBindingService
    {
        return new ValidatingAdmissionPolicyBindingService($this->api);
    }

    public function v1alpha1AdmissionregistrationValidatingAdmissionPolicyBinding(): ValidatingAdmissionPolicyBindingService1
    {
        return new ValidatingAdmissionPolicyBindingService1($this->api);
    }

    public function v1beta1AdmissionregistrationValidatingAdmissionPolicyBinding(): ValidatingAdmissionPolicyBindingService2
    {
        return new ValidatingAdmissionPolicyBindingService2($this->api);
    }

    public function v1AdmissionregistrationValidatingWebhookConfiguration(): ValidatingWebhookConfigurationService
    {
        return new ValidatingWebhookConfigurationService($this->api);
    }

    public function v1ApiextensionsCustomResourceDefinition(): CustomResourceDefinitionService
    {
        return new CustomResourceDefinitionService($this->api);
    }

    public function v1ApiregistrationAPIService(): APIServiceService
    {
        return new APIServiceService($this->api);
    }

    public function v1AppsControllerRevision(): ControllerRevisionService
    {
        return new ControllerRevisionService($this->api);
    }

    public function v1AppsDaemonSet(): DaemonSetService
    {
        return new DaemonSetService($this->api);
    }

    public function v1AppsDeployment(): DeploymentService
    {
        return new DeploymentService($this->api);
    }

    public function v1AppsReplicaSet(): ReplicaSetService
    {
        return new ReplicaSetService($this->api);
    }

    public function v1AppsStatefulSet(): StatefulSetService
    {
        return new StatefulSetService($this->api);
    }

    public function v1AuthorizationLocalSubjectAccessReview(): LocalSubjectAccessReviewService
    {
        return new LocalSubjectAccessReviewService($this->api);
    }

    public function v1AuthorizationSelfSubjectAccessReview(): SelfSubjectAccessReviewService
    {
        return new SelfSubjectAccessReviewService($this->api);
    }

    public function v1AuthorizationSelfSubjectRulesReview(): SelfSubjectRulesReviewService
    {
        return new SelfSubjectRulesReviewService($this->api);
    }

    public function v1AuthorizationSubjectAccessReview(): SubjectAccessReviewService
    {
        return new SubjectAccessReviewService($this->api);
    }

    public function v1BatchCronJob(): CronJobService
    {
        return new CronJobService($this->api);
    }

    public function v1BatchJob(): JobService
    {
        return new JobService($this->api);
    }

    public function v1CertificatesCertificateSigningRequest(): CertificateSigningRequestService
    {
        return new CertificateSigningRequestService($this->api);
    }

    public function v1alpha1CertificatesClusterTrustBundle(): ClusterTrustBundleService
    {
        return new ClusterTrustBundleService($this->api);
    }

    public function v1CoordinationLease(): LeaseService
    {
        return new LeaseService($this->api);
    }

    public function v1DiscoveryEndpointSlice(): EndpointSliceService
    {
        return new EndpointSliceService($this->api);
    }

    public function v1EventsEvent(): EventService1
    {
        return new EventService1($this->api);
    }

    public function v1FlowcontrolFlowSchema(): FlowSchemaService
    {
        return new FlowSchemaService($this->api);
    }

    public function v1beta3FlowcontrolFlowSchema(): FlowSchemaService1
    {
        return new FlowSchemaService1($this->api);
    }

    public function v1FlowcontrolPriorityLevelConfiguration(): PriorityLevelConfigurationService
    {
        return new PriorityLevelConfigurationService($this->api);
    }

    public function v1beta3FlowcontrolPriorityLevelConfiguration(): PriorityLevelConfigurationService1
    {
        return new PriorityLevelConfigurationService1($this->api);
    }

    public function v1alpha1InternalStorageVersion(): StorageVersionService
    {
        return new StorageVersionService($this->api);
    }

    public function v1NetworkingIngressClass(): IngressClassService
    {
        return new IngressClassService($this->api);
    }

    public function v1NetworkingIngress(): IngressService
    {
        return new IngressService($this->api);
    }

    public function v1NetworkingNetworkPolicy(): NetworkPolicyService
    {
        return new NetworkPolicyService($this->api);
    }

    public function v1beta1NetworkingIPAddress(): IPAddressService
    {
        return new IPAddressService($this->api);
    }

    public function v1beta1NetworkingServiceCIDR(): ServiceCIDRService
    {
        return new ServiceCIDRService($this->api);
    }

    public function v1NodeRuntimeClass(): RuntimeClassService
    {
        return new RuntimeClassService($this->api);
    }

    public function v1RbacClusterRoleBinding(): ClusterRoleBindingService
    {
        return new ClusterRoleBindingService($this->api);
    }

    public function v1RbacClusterRole(): ClusterRoleService
    {
        return new ClusterRoleService($this->api);
    }

    public function v1RbacRoleBinding(): RoleBindingService
    {
        return new RoleBindingService($this->api);
    }

    public function v1RbacRole(): RoleService
    {
        return new RoleService($this->api);
    }

    public function v1alpha2ResourcePodSchedulingContext(): PodSchedulingContextService
    {
        return new PodSchedulingContextService($this->api);
    }

    public function v1alpha2ResourceResourceClaimParameters(): ResourceClaimParametersService
    {
        return new ResourceClaimParametersService($this->api);
    }

    public function v1alpha2ResourceResourceClaim(): ResourceClaimService
    {
        return new ResourceClaimService($this->api);
    }

    public function v1alpha2ResourceResourceClaimTemplate(): ResourceClaimTemplateService
    {
        return new ResourceClaimTemplateService($this->api);
    }

    public function v1alpha2ResourceResourceClassParameters(): ResourceClassParametersService
    {
        return new ResourceClassParametersService($this->api);
    }

    public function v1alpha2ResourceResourceClass(): ResourceClassService
    {
        return new ResourceClassService($this->api);
    }

    public function v1alpha2ResourceResourceSlice(): ResourceSliceService
    {
        return new ResourceSliceService($this->api);
    }

    public function v1SchedulingPriorityClass(): PriorityClassService
    {
        return new PriorityClassService($this->api);
    }

    public function v1StorageCSIDriver(): CSIDriverService
    {
        return new CSIDriverService($this->api);
    }

    public function v1StorageCSINode(): CSINodeService
    {
        return new CSINodeService($this->api);
    }

    public function v1StorageCSIStorageCapacity(): CSIStorageCapacityService
    {
        return new CSIStorageCapacityService($this->api);
    }

    public function v1StorageStorageClass(): StorageClassService
    {
        return new StorageClassService($this->api);
    }

    public function v1StorageVolumeAttachment(): VolumeAttachmentService
    {
        return new VolumeAttachmentService($this->api);
    }

    public function v1alpha1StorageVolumeAttributesClass(): VolumeAttributesClassService
    {
        return new VolumeAttributesClassService($this->api);
    }

    public function v1alpha1StoragemigrationStorageVersionMigration(): StorageVersionMigrationService
    {
        return new StorageVersionMigrationService($this->api);
    }
}
