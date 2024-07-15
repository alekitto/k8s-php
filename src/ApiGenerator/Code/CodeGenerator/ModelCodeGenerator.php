<?php

declare(strict_types=1);

namespace Kcs\K8s\ApiGenerator\Code\CodeGenerator;

use Kcs\K8s\ApiGenerator\Code\CodeFile;
use Kcs\K8s\ApiGenerator\Code\CodeGenerator\Model\AllowedPropsMethodGenerator;
use Kcs\K8s\ApiGenerator\Code\CodeGenerator\Model\ModelAttributeGenerator;
use Kcs\K8s\ApiGenerator\Code\CodeGenerator\Model\ModelConstructorGenerator;
use Kcs\K8s\ApiGenerator\Code\CodeGenerator\Model\ModelMethodGenerator;
use Kcs\K8s\ApiGenerator\Code\CodeGenerator\Model\ModelPropertyGenerator;
use Kcs\K8s\ApiGenerator\Code\CodeGenerator\Model\ModelPropsTrait;
use Kcs\K8s\ApiGenerator\Code\CodeOptions;
use Kcs\K8s\ApiGenerator\Code\Formatter\DocBlockFormatterTrait;
use Kcs\K8s\ApiGenerator\Parser\Metadata\DefinitionMetadata;
use Kcs\K8s\ApiGenerator\Parser\Metadata\Metadata;
use Kcs\K8s\Attribute\AttributeType;
use Nette\PhpGenerator\PhpNamespace;
use Traversable;

use function sprintf;

readonly class ModelCodeGenerator
{
    use CodeGeneratorTrait;
    use DocBlockFormatterTrait;
    use ModelPropsTrait;

    private ModelPropertyGenerator $modelPropertyGenerator;

    private ModelMethodGenerator $modelMethodGenerator;

    private AllowedPropsMethodGenerator $allowedPropsMethodGenerator;

    private ModelAttributeGenerator $modelAnnotationGenerator;

    private ModelConstructorGenerator $modelConstructorGenerator;

    public function __construct()
    {
        $this->modelPropertyGenerator = new ModelPropertyGenerator();
        $this->modelMethodGenerator = new ModelMethodGenerator();
        $this->allowedPropsMethodGenerator = new AllowedPropsMethodGenerator();
        $this->modelAnnotationGenerator = new ModelAttributeGenerator();
        $this->modelConstructorGenerator = new ModelConstructorGenerator();
    }

    public function generate(DefinitionMetadata $model, Metadata $metadata, CodeOptions $options): CodeFile
    {
        $namespace = new PhpNamespace($this->makeFinalNamespace($model->getNamespace(), $options));
        $namespace->addUse($options->getAnnotationsNamespace(), 'Kubernetes');
        $namespace->addUse(AttributeType::class);

        $class = $namespace->addClass($model->getClassName());
        $class->addComment($this->formatDocblockDescription($model->getDescription()));
        $this->modelAnnotationGenerator->generate($model, $class, $metadata, $options);

        $properties = [];
        foreach ($model->getProperties() as $property) {
            $properties[] = $this->modelPropertyGenerator->generate(
                $property,
                $model,
                $metadata,
                $options,
                $class,
                $namespace,
            );
        }

        [
            'metadata' => $metadataProp,
            'spec' => $specProp,
        ] = $this->getCoreProps($properties);

        $this->modelConstructorGenerator->generate(
            $model,
            $properties,
            $class,
            $namespace,
            $metadata,
            $options,
        );

        if ($metadataProp) {
            $this->allowedPropsMethodGenerator->generate(
                $class,
                $namespace,
                $metadataProp,
                $metadata,
                $options,
                onlyGetters: ($metadataProp->getModelClassName() === 'ListMeta'),
            );
        }

        if ($specProp) {
            $this->allowedPropsMethodGenerator->generate(
                $class,
                $namespace,
                $specProp,
                $metadata,
                $options,
                denyList: ['uid', 'namespace', 'finalizers', 'metadata', 'spec'],
            );
        }

        if ($model->isItemList()) {
            $item = null;
            foreach ($properties as $property) {
                if ($property->getName() === 'items') {
                    $item = $property;
                    break;
                }
            }

            $class->addImplement('IteratorAggregate');
            $method = $class->addMethod('getIterator');
            $method->setReturnType(Traversable::class);
            $method->addBody('return new \ArrayIterator(iterator_to_array($this->items));');
            if ($item) {
                $method->addComment(sprintf(
                    '@return \ArrayIterator|%s',
                    $item->getPhpDocType(),
                ));
            }

            if ($class->getComment()) {
                $class->addComment('');
            }

            $class->addComment(sprintf(
                '@implements \IteratorAggregate<int, %s>',
                $item->getModelClassName(),
            ));
        }

        foreach ($properties as $property) {
            $this->modelMethodGenerator->generate(
                $class,
                $namespace,
                $property,
                $model,
                $options,
            );
        }

        return new CodeFile(
            $namespace,
            $class,
        );
    }
}
