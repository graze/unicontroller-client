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

class GeneratorSerialiser extends AbstractGenerator implements GeneratorInterface
{
    const OUTPUT_PATH = 'src/Serialiser/Serialiser/Serialiser%s.php';

    /**
     * @var string
     */
    private $callsSerialise = [];

    /**
     * @param string $name
     * @return string
     */
    public function generateClass($name)
    {
        return sprintf(
            $this->getTemplate('Serialiser/SerialiserClass'),
            $name,
            implode("\n", $this->callsSerialise)
        );
    }

    /**
     * @param DefinitionProperty $property
     */
    public function addCallSerialise(DefinitionProperty $property)
    {
        switch ($property->getType()) {
            case DefinitionProperty::PROPERTY_TYPE_ARRAY:
                $call = sprintf(
                    $this->getTemplate('Serialiser/SerialiserCallSerialiseArray'),
                    $property->getName(),
                    $property->getArrayElementName()
                );
                break;

            case DefinitionProperty::PROPERTY_TYPE_STRING:
                $call = sprintf(
                    $this->getTemplate('Serialiser/SerialiserCallSerialiseString'),
                    $property->getName()
                );
                break;

            case DefinitionProperty::PROPERTY_TYPE_INT:
                $call = sprintf(
                    $this->getTemplate('Serialiser/SerialiserCallSerialiseInt'),
                    $property->getName()
                );
                break;

            case DefinitionProperty::PROPERTY_TYPE_BINARY_DATA:
                $call = sprintf(
                    $this->getTemplate('Serialiser/SerialiserCallSerialiseBinaryData'),
                    $property->getName()
                );
                break;
        }

        $this->callsSerialise[] = $call;
    }

    /**
     * @param string $name
     *
     * @return [type]
     */
    public function getOutputPath($name)
    {
        return sprintf(self::OUTPUT_PATH, $name);
    }
}
