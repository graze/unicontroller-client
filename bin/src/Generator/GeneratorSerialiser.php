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
     * @param string $property
     * @param string $type
     * @param string $arrayItem
     */
    public function addCallSerialise($property, $type, $arrayItem = null)
    {
        switch ($type) {
            case 'array':
                $call = sprintf(
                    $this->getTemplate('Serialiser/SerialiserCallSerialiseArray'),
                    $property,
                    $arrayItem
                );
                break;

            case 'string':
                $call = sprintf(
                    $this->getTemplate('Serialiser/SerialiserCallSerialiseString'),
                    $property
                );
                break;

            case 'int':
                $call = sprintf(
                    $this->getTemplate('Serialiser/SerialiserCallSerialiseInt'),
                    $property
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
