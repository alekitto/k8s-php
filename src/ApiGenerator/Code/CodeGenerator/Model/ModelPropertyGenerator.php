<?php

declare(strict_types=1);

namespace Kcs\K8s\ApiGenerator\Code\CodeGenerator\Model;

use Kcs\K8s\ApiGenerator\Code\CodeGenerator\CodeGeneratorTrait;
use Kcs\K8s\ApiGenerator\Code\CodeOptions;
use Kcs\K8s\ApiGenerator\Code\Formatter\PhpPropertyNameFormatter;
use Kcs\K8s\ApiGenerator\Code\ModelProperty;
use Kcs\K8s\ApiGenerator\Parser\Metadata\DefinitionMetadata;
use Kcs\K8s\ApiGenerator\Parser\Metadata\Metadata;
use Kcs\K8s\ApiGenerator\Parser\Metadata\PropertyMetadata;
use Kcs\K8s\Attribute\Attribute;
use Nette\PhpGenerator\ClassType;
use Nette\PhpGenerator\Literal;
use Nette\PhpGenerator\PhpNamespace;

use function sprintf;

readonly class ModelPropertyGenerator
{
    use CodeGeneratorTrait;

    private PhpPropertyNameFormatter $propertyNameFormatter;

    public function __construct()
    {
        $this->propertyNameFormatter = new PhpPropertyNameFormatter();
    }

    public function generate(
        PropertyMetadata $property,
        DefinitionMetadata $definition,
        Metadata $metadata,
        CodeOptions $options,
        ClassType $class,
        PhpNamespace $namespace,
    ): ModelProperty {
        $default = $this->getDefaultValue($definition, $property);

        $reference = $property->isModelReference() ?
            $metadata->findDefinitionByGoPackageName($property->getGoPackageName()) : null;
        $phpPropertyName = $this->propertyNameFormatter->format($property->getName());
        $modelProp = new ModelProperty($phpPropertyName, $property, $options, $reference);

        if ($modelProp->isDateTime()) {
            $namespace->addUse($modelProp->getPhpReturnType());
        }

        if ($modelProp->getModelFqcn()) {
            $namespace->addUse($modelProp->getModelFqcn());
        }

        $phpProperty = $class->addProperty(
            $phpPropertyName,
            $default,
        );
        $phpProperty->setProtected();
        $phpProperty->setNullable(! $this->isPropRequired($definition, $property));

        if ($default) {
            $phpProperty->setValue($default);
        }

        $phpProperty->setInitialized(! $this->isPropRequired($definition, $property));

        $annotationProps = [$property->getName()];
        if ($modelProp->getAnnotationType()) {
            $annotationProps['type'] = $modelProp->getAnnotationType();
        }

        $modelFqcn = $modelProp->getModelFqcn();
        if ($modelFqcn) {
            if ($modelFqcn === $namespace->resolveName($class->getName())) {
                $modelName = $modelFqcn;
            } else {
                $modelName = $namespace->simplifyName($modelFqcn);
            }

            $annotationProps['model'] = new Literal(sprintf('%s::class', $modelName));
        }

        if ($modelProp->isRequired()) {
            $annotationProps['required'] = true;
        }

        $phpProperty->addAttribute(Attribute::class, $annotationProps);
        $phpProperty->addComment(
            sprintf(
                '@var %s%s',
                $modelProp->getPhpDocType(),
                $this->isPropRequired($definition, $property) ? '' : '|null',
            ),
        );

        return $modelProp;
    }

    private function getDefaultValue(DefinitionMetadata $definition, PropertyMetadata $property): string|null
    {
        if ($property->getName() === 'kind') {
            return $definition->getKubernetesKind();
        }

        if ($property->getName() === 'apiVersion') {
            $default = '';
            if ($definition->getKubernetesGroup()) {
                $default .= $definition->getKubernetesGroup() . '/';
            }

            return $default . $definition->getKubernetesVersion();
        }

        return null;
    }

    private function isPropRequired(DefinitionMetadata $definition, PropertyMetadata $property): bool
    {
        if ($property->isRequired()) {
            return true;
        }

        if ($definition->isKindWithSpecAndMetadata() && ($property->getName() === 'apiVersion' || $property->getName() === 'kind')) {
            return true;
        }

        return $definition->isKindWithSpecAndMetadata()
            && ($property->getName() === 'spec' || $property->getName() === 'metadata');
    }
}
