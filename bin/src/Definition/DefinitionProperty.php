<?php

namespace Graze\UnicontrollerClient\ClassGenerator\Definition;

class DefinitionProperty
{
    const PROPERTY_TYPE_INT = 'INT';

    const PROPERTY_TYPE_STRING = 'STRING';

    const PROPERTY_TYPE_ARRAY = 'ARRAY';

    const PROPERTY_TYPE_BINARY_DATA = 'BINARY DATA';

    private $name;

    private $type;

    private $arrayElementName;

    public function __construct($name, $type, $arrayElementName = null)
    {
        $this->name = $name;
        $this->type = $type;
        $this->arrayElementName = $arrayElementName;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getType()
    {
        return $this->type;
    }

    public function getArrayElementName()
    {
        return $this->arrayElementName;
    }
}
