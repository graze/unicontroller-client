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
namespace Graze\UnicontrollerClient\ClassGenerator\Definition;

use Graze\UnicontrollerClient\ClassGenerator\Definition\DefinitionProperty;

class Definition
{
    /**
     * @var string
     */
    private $name;

    /**
     * @var DefinitionProperty[]
     */
    private $properties;

    /**
     * @param string $name
     * @param array $properties
     */
    public function __construct($name, array $properties)
    {
        $this->name = $name;
        $this->properties = $properties;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return DefinitionProperty[]
     */
    public function getProperties()
    {
        return $this->properties;
    }
}
