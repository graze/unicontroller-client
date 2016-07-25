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
    const PATH = 'src/Serialiser/Serialiser/Serialiser%s.php';

    const CODE_CLASS = <<<CODE_CLASS
%s
namespace Graze\UnicontrollerClient\Serialiser\Serialiser;

use Graze\UnicontrollerClient\Serialiser\Serialiser\AbstractSerialiser;
use Graze\UnicontrollerClient\Serialiser\Serialiser\SerialiserInterface;
use Graze\UnicontrollerClient\Entity\Entity\EntityInterface;

class Serialiser%s extends AbstractSerialiser implements SerialiserInterface
{
    /**
     * @param EntityInterface \$entity
     * @return string
     */
    public function serialise(EntityInterface \$entity)
    {
        \$properties = [];
%s

        return implode(',', \$properties);
    }
}

CODE_CLASS;

    const CODE_CALL_SERIALISE_ARRAY = <<<CODE_CALL_SERIALISE_ARRAY
        \$properties[] = \$this->serialiseArray(\$entity->get%s(), '%s');
CODE_CALL_SERIALISE_ARRAY;

    const CODE_CALL_SERIALISE_STRING =<<<CODE_CALL_SERIALISE_STRING
        \$properties[] = \$this->stringEscaper->escape(\$entity->get%s());
CODE_CALL_SERIALISE_STRING;

    const CODE_CALL_SERIALISE_INT =<<<CODE_CALL_SERIALISE_INT
        \$properties[] = \$entity->get%s();
CODE_CALL_SERIALISE_INT;

    private $callsSerialise = [];

    public function generateClass($name)
    {
        return sprintf(
            self::CODE_CLASS,
            $this->getClassDocBlock(),
            $name,
            implode("\n", $this->callsSerialise)
        );
    }

    public function addCallSerialise($property, $type, $arrayItem = null)
    {
        switch ($type) {
            case 'array':
                $call = sprintf(
                    self::CODE_CALL_SERIALISE_ARRAY,
                    $property,
                    $arrayItem
                );
                break;

            case 'string':
                $call = sprintf(self::CODE_CALL_SERIALISE_STRING, $property);
                break;

            case 'int':
                $call = sprintf(self::CODE_CALL_SERIALISE_INT, $property);
                break;
        }

        $this->callsSerialise[] = $call;
    }

    protected function getPath()
    {
        return self::PATH;
    }
}
