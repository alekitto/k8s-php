<?php

declare(strict_types=1);

namespace Kcs\K8s\ApiGenerator\Code\CodeGenerator\Model;

use Kcs\K8s\ApiGenerator\Code\CodeGenerator\CodeGeneratorTrait;
use Kcs\K8s\ApiGenerator\Code\CodeOptions;
use Kcs\K8s\ApiGenerator\Parser\Metadata\DefinitionMetadata;
use Kcs\K8s\ApiGenerator\Parser\Metadata\Metadata;
use Kcs\K8s\ApiGenerator\Parser\Metadata\OperationMetadata;
use Kcs\K8s\Attribute\Kind;
use Kcs\K8s\Attribute\Operation;
use Nette\PhpGenerator\ClassType;

use function array_filter;

readonly class ModelAttributeGenerator
{
    use CodeGeneratorTrait;

    public function generate(DefinitionMetadata $model, ClassType $class, Metadata $metadata, CodeOptions $options): void
    {
        if (! ($model->getKubernetesKind() && $model->getKubernetesVersion())) {
            return;
        }

        $args = [$model->getKubernetesKind()];
        if ($model->getKubernetesGroup()) {
            $args['group'] = $model->getKubernetesGroup();
        }

        $args['version'] = $model->getKubernetesVersion();
        $class->addAttribute(Kind::class, $args);

        $modelSvcGroup = null;
        foreach ($metadata->getServiceGroups() as $serviceGroup) {
            $def = $serviceGroup->getModelDefinition();
            if ($def && $def->getPhpFqcn() === $model->getPhpFqcn()) {
                $modelSvcGroup = $serviceGroup;
                break;
            }
        }

        if (! $modelSvcGroup) {
            return;
        }

        $operations = [
            'get' => $modelSvcGroup->getReadOperation(),
            'get-status' => $modelSvcGroup->getReadStatusOperation(),
            'post' => $modelSvcGroup->getCreateOperation(),
            'delete' => $modelSvcGroup->getDeleteOperation(),
            'watch' => $modelSvcGroup->getWatchOperation(),
            'put' => $modelSvcGroup->getPutOperation(),
            'put-status' => $modelSvcGroup->getPutStatusOperation(),
            'deletecollection' => $modelSvcGroup->getDeleteCollectionOperation(),
            'deletecollection-all' => $modelSvcGroup->getDeleteCollectionOperation(false),
            'watch-all' => $modelSvcGroup->getWatchOperation(false),
            'patch' => $modelSvcGroup->getPatchOperation(),
            'patch-status' => $modelSvcGroup->getPatchStatusOperation(),
            'list' =>  $modelSvcGroup->getListOperation(),
            'list-all' => $modelSvcGroup->getListOperation(false),
            'proxy' => $this->getProxyOperation($metadata, $modelSvcGroup->getKind()),
        ];

        /**@var OperationMetadata $operation */
        foreach (array_filter($operations) as $action => $operation) {
            $params = [$action, 'path' => $operation->getUriPath()];

            foreach ($operation->getParameters() as $parameter) {
                if (! $parameter->isRequiredDefinition()) {
                    continue;
                }

                $definition = $metadata->findDefinitionByGoPackageName($parameter->getDefinitionGoPackageName());
                $params['body'] = $definition->isValidModel() ? 'model' : 'patch';
            }

            $isWatchAction = ($action === 'watch' || $action === 'watch-all');
            $returnedDefinition = $operation->getReturnedDefinition();
            if ($returnedDefinition && ! $isWatchAction) {
                $responseModel = $returnedDefinition === $model
                    ? 'self'
                    : $this->makeFinalNamespace($returnedDefinition->getPhpFqcn(), $options);
                $params['response'] = $responseModel;
            } elseif ($isWatchAction) {
                $responseModel = $metadata->findDefinitionByKind('WatchEvent', 'v1');
                $responseModel = $this->makeFinalNamespace($responseModel->getPhpFqcn(), $options);
                $params['response'] = $responseModel;
            }

            $class->addAttribute(Operation::class, $params);
        }
    }

    private function getProxyOperation(Metadata $metadata, string $kind): OperationMetadata|null
    {
        $operations = $metadata->findOperationsByKind($kind . 'ProxyOptions');
        if (empty($operations)) {
            return null;
        }

        foreach ($operations as $operation) {
            if ($operation->isProxyWithPath()) {
                return $operation;
            }
        }

        return null;
    }
}
