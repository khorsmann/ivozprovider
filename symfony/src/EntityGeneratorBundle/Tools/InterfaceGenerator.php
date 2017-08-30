<?php

namespace EntityGeneratorBundle\Tools;

use EntityGeneratorBundle\Tools\AbstractEntityGenerator as ParentGenerator;
use Doctrine\ORM\Mapping\ClassMetadata;
use Doctrine\ORM\Mapping\ClassMetadataInfo;

/**
 * Description of DTOGenerator
 *
 * @author Mikel Madariaga <mikel@irontec.com>
 */
class InterfaceGenerator extends ParentGenerator
{

    protected $codeCoverageIgnoreBlock = false;

    /**
     * @var string
     */
    protected static $classTemplate =
'<?php

<namespace>
<useStatement>
<entityClassName>
{
<entityBody>
}
';

    /**
     * @var string
     */
    protected static $customMethodTemplate =
        '<docComment><spaces>public function <methodName>(<methodArguments>);
';


    protected function transformMetadata(ClassMetadataInfo $metadata)
    {
        $metadata->name = str_replace('Abstract', '', $metadata->name);
        $metadata->name .= 'Interface';
        $metadata->rootEntityName = $metadata->name;
        $metadata->customRepositoryClassName = null;

        foreach ($metadata->associationMappings as $key => $association) {
            $metadata->associationMappings[$key]['targetEntity'] .= 'Interface';
        }

        return $metadata;
    }

    protected function generateEntityRealUse(ClassMetadata $metadata)
    {
        $useCollections = false;

        foreach ($metadata->associationMappings as $mapping) {
            if ($mapping['mappedBy']) {
                $useCollections = true;
                break;
            }
        }

        $response = [
            'use Core\Domain\Model\EntityInterface;'
        ];
        if ($useCollections) {
            $response[] = 'use Doctrine\\Common\\Collections\\Criteria;';
        }

        return "\n". implode("\n", $response) ."\n";
    }

    /**
     * {@inheritDoc}
     */
    protected function generateEntityClassName(ClassMetadataInfo $metadata)
    {
        $class =
            'interface '
            . $this->getClassName($metadata)
            . ' extends EntityInterface';

        return $class;
    }


    /**
     * @param ClassMetadataInfo $metadata
     *
     * @return string
     */
    protected function generateEntityBody(ClassMetadataInfo $metadata)
    {
        $stubMethods = $this->generateEntityStubMethods ? $this->generateEntityStubMethods($metadata) : null;
        $code = array();

        if ($stubMethods) {
            $code[] = $stubMethods;
        }

        return implode("\n", $code);
    }


    /**
     * {@inheritDoc}
     */
    protected function generateEntityStubMethods(ClassMetadataInfo $metadata)
    {
        $entityInterfaceMethods = get_class_methods('Core\\Domain\\Model\\EntityInterface');

        $response = [];

        $className = str_replace('Interface', '', $metadata->getName());
        $reflectionClass = new \ReflectionClass($className);
        $publicMethods = $reflectionClass->getMethods(\ReflectionMethod::IS_PUBLIC);

        foreach ($publicMethods as $publicMethod) {

            if ($publicMethod->isConstructor()) {
                continue;
            }

            $methodName = $publicMethod->getName();
            if (in_array($methodName, $entityInterfaceMethods)) {
                continue;
            }

            $docComment = $publicMethod->getDocComment()
                ? $this->spaces . $publicMethod->getDocComment() . "\n"
                : '';

            $methodParameters = $publicMethod->getParameters();

            $methodParameterArray = [];
            foreach ($methodParameters as $methodParameter) {

                $str = '';
                try {
                    $parameterClass = $methodParameter->getClass();
                } catch (\Exception $e) {
                    // Interface does not exist yet
                    continue;
                }

                if ($parameterClass) {
                    $str = '\\' . $parameterClass->getName() . ' ';
                } else if ($methodParameter->isArray()) {
                    $str = 'array ';
                }

                $str .= '$' . $methodParameter->getName();
                if ($methodParameter->isOptional()  && $methodParameter->getDefaultValue()) {
                    $str .= " = '" . $methodParameter->getDefaultValue() . "'";
                } else if ($methodParameter->isOptional()) {
                    $str .= " = null";
                }

                $methodParameterArray[] = $str;
            }

            $methodParameterStr = implode(', ', $methodParameterArray);

            $response[$methodName] = str_replace(
                ['<docComment>', '<methodName>', '<methodArguments>'],
                [$docComment, $methodName, $methodParameterStr],
                self::$customMethodTemplate
            );
        }

        return implode("\n", $response);
    }
}
