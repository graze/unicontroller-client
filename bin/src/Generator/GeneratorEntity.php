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
    const PATH = 'src/Entity/Entity/Entity%s.php';

    const CODE_CLASS = <<<CODE_CLASS
%s
namespace Graze\UnicontrollerClient\Entity\Entity;

use Graze\UnicontrollerClient\Entity\Entity\EntityInterface;

class Entity%s implements EntityInterface
{
%s

%s
}

CODE_CLASS;

    const CODE_PROPERTY = <<<CODE_PROPERTY
    /**
     * @var %s
     */
    protected $%s;
CODE_PROPERTY;

    const CODE_METHOD = <<<CODE_METHOD
    /**
     * @return %s
     */
    public function get%s()
    {
        return \$this->%s;
    }

    /**
     * @param %s \$%s
     */
    public function set%s(%s\$%s)
    {
        \$this->%s = \$%s;
    }
CODE_METHOD;

    private $properties = [];

    private $methods = [];

    public function generateClass($name)
    {
        return sprintf(
            self::CODE_CLASS,
            $this->getClassDocBlock(),
            $name,
            implode("\n\n", $this->properties),
            implode("\n\n", $this->methods)
        );
    }

    public function addProperty($property, $type, $arrayItem = null)
    {
        $type = $type == 'array' ? sprintf('%s[]', $arrayItem) : $type;
        $this->properties[] = sprintf(self::CODE_PROPERTY, $type, lcfirst($property));
    }

    public function addMethod($property, $type, $arrayItem = null)
    {
        $propertyLowerCase = lcfirst($property);
        $this->methods[] = sprintf(
            self::CODE_METHOD,
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

    protected function getPath()
    {
        return self::PATH;
    }
}
