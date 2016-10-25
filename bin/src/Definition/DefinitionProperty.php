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

class DefinitionProperty
{
    const PROPERTY_TYPE_INT = 'INT';

    const PROPERTY_TYPE_STRING = 'STRING';

    const PROPERTY_TYPE_ARRAY = 'ARRAY';

    const PROPERTY_TYPE_BINARY_DATA = 'BINARY DATA';

    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $type;

    /**
     * @var string
     */
    private $arrayElementName;

    /**
     * @param string $name
     * @param string $type
     * @param string $arrayElementName
     */
    public function __construct($name, $type, $arrayElementName = null)
    {
        $this->name = $name;
        $this->type = $type;
        $this->arrayElementName = $arrayElementName;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @return string
     */
    public function getArrayElementName()
    {
        return $this->arrayElementName;
    }
}
