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
     * @param string $property
     * @param string $type
     * @param string $arrayItem
     */
    public function addProperty($property, $type, $arrayItem = null)
    {
        $this->properties[] = sprintf(
            $this->getTemplate('Entity/EntityProperty'),
            $type == 'array' ? sprintf('%s[]', $arrayItem) : $type,
            lcfirst($property)
        );
    }

    /**
     * @param string $property
     * @param string $type
     * @param string $arrayItem
     */
    public function addMethod($property, $type, $arrayItem = null)
    {
        $propertyLowerCase = lcfirst($property);
        $this->methods[] = sprintf(
            $this->getTemplate('Entity/EntityMethod'),
            $type == 'array' ? sprintf('%s[]', $arrayItem) : $type,
            $property,
            $propertyLowerCase,
            $type,
            $propertyLowerCase,
            $property,
            $type == 'array' ? 'array ' : '',
            $propertyLowerCase,
            $propertyLowerCase,
            $propertyLowerCase
        );
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
