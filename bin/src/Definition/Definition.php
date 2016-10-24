<?php

namespace Graze\UnicontrollerClient\ClassGenerator\Definition;

use Graze\UnicontrollerClient\ClassGenerator\Definition\DefinitionProperty;

class Definition
{
    private $name;

    private $properties;

    public function __construct($name, array $properties)
    {
        $this->name = $name;
        $this->properties = $properties;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getProperties()
    {
        return $this->properties;
    }
}
