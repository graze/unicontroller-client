<?php
/**
 * This file is part of graze/unicontroller-client.
 *
 * Copyright (c) 2016 Nature Delivered Ltd. <https://www.graze.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @license https://github.com/graze/unicontroller-client/blob/master/LICENSE.md
 * @link https://github.com/graze/unicontroller-client
 */
namespace Graze\UnicontrollerClient\ClassGenerator\Generator;

use Graze\UnicontrollerClient\ClassGenerator\Generator\AbstractGenerator;
use Graze\UnicontrollerClient\ClassGenerator\Generator\GeneratorInterface;
use Graze\UnicontrollerClient\ClassGenerator\Definition\DefinitionProperty;

class GeneratorEntity extends AbstractGenerator implements GeneratorInterface
{
    const OUTPUT_PATH = 'src/Entity/Entity/Entity%s.php';

    /**
     * @var array
     */
    private $properties = [];

    /**
     * @var array
     */
    private $methods = [];

    /**
     * @param string $name
     * @return string
     */
    public function generateClass($name)
    {
        return sprintf(
            $this->getTemplate('Entity/EntityClass'),
            $name,
            implode("\n\n", $this->properties),
            implode("\n\n", $this->methods)
        );
    }

    /**
     * @param DefinitionProperty $property
     */
    public function addProperty(DefinitionProperty $property)
    {
        $this->properties[] = sprintf(
            $this->getTemplate('Entity/EntityProperty'),
            $this->getTypeHint($property),
            lcfirst($property->getName())
        );
    }

    /**
     * @param DefinitionProperty $property
     */
    public function addMethod(DefinitionProperty $property)
    {
        $propertyLowerCase = lcfirst($property->getName());
        $this->methods[] = sprintf(
            $this->getTemplate('Entity/EntityMethod'),
            $this->getTypeHint($property),
            $property->getName(),
            $propertyLowerCase,
            $this->getTypeHint($property),
            $propertyLowerCase,
            $property->getName(),
            $property->getType() ==  DefinitionProperty::PROPERTY_TYPE_ARRAY ? 'array ' : '',
            $propertyLowerCase,
            $propertyLowerCase,
            $propertyLowerCase
        );
    }

    /**
     * @param DefinitionProperty $property
     * @return string
     */
    private function getTypeHint(DefinitionProperty $property)
    {
        switch ($property->getType()) {
            case DefinitionProperty::PROPERTY_TYPE_ARRAY:
                return sprintf('%s[]', $property->getArrayElementName());

            default:
                return strtolower($property->getType());
        }
    }

    /**
     * @param string $name
     * @return string
     */
    public function getOutputPath($name)
    {
        return sprintf(self::OUTPUT_PATH, $name);
    }
}
