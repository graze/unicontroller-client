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

class GeneratorParser extends AbstractGenerator implements GeneratorInterface
{
    const OUTPUT_PATH = 'src/Parser/Parser/Parser%s.php';

    /**
     * @var array
     */
    private $properties = [];

    /**
     * @var bool
     */
    private $isFinalPropertyArray = false;

    /**
     * @param string $name
     * @return string
     */
    public function generateClass($name)
    {
        return sprintf(
            $this->getTemplate('Parser/ParserClass'),
            $name,
            $name,
            implode(",\n", $this->properties),
            $name,
            $name,
            $this->isFinalPropertyArray ? $this->getTemplate('Parser/ParserCallParse') : ''
        );
    }

    /**
     * @param DefinitionProperty $property
     */
    public function addProperty(DefinitionProperty $property)
    {
        $this->properties[] = sprintf("            '%s'", lcfirst($property->getName()));
        $this->isFinalPropertyArray = $property->getType() == DefinitionProperty::PROPERTY_TYPE_ARRAY;
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
