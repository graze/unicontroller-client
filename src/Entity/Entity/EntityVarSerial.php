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
namespace Graze\UnicontrollerClient\Entity\Entity;

use Graze\UnicontrollerClient\Entity\Entity\EntityInterface;

class EntityVarSerial implements EntityInterface
{
    /**
     * @var string
     */
    protected $name;

    /**
     * @var int
     */
    protected $update;

    /**
     * @var int
     */
    protected $useDefault;

    /**
     * @var string
     */
    protected $defaultText;

    /**
     * @var int
     */
    protected $bufferSize;

    /**
     * @var string
     */
    protected $inputDefinition;

    /**
     * @var int
     */
    protected $cPadding;

    /**
     * @var int
     */
    protected $length;

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return int
     */
    public function getUpdate()
    {
        return $this->update;
    }

    /**
     * @param int $update
     */
    public function setUpdate($update)
    {
        $this->update = $update;
    }

    /**
     * @return int
     */
    public function getUseDefault()
    {
        return $this->useDefault;
    }

    /**
     * @param int $useDefault
     */
    public function setUseDefault($useDefault)
    {
        $this->useDefault = $useDefault;
    }

    /**
     * @return string
     */
    public function getDefaultText()
    {
        return $this->defaultText;
    }

    /**
     * @param string $defaultText
     */
    public function setDefaultText($defaultText)
    {
        $this->defaultText = $defaultText;
    }

    /**
     * @return int
     */
    public function getBufferSize()
    {
        return $this->bufferSize;
    }

    /**
     * @param int $bufferSize
     */
    public function setBufferSize($bufferSize)
    {
        $this->bufferSize = $bufferSize;
    }

    /**
     * @return string
     */
    public function getInputDefinition()
    {
        return $this->inputDefinition;
    }

    /**
     * @param string $inputDefinition
     */
    public function setInputDefinition($inputDefinition)
    {
        $this->inputDefinition = $inputDefinition;
    }

    /**
     * @return int
     */
    public function getcPadding()
    {
        return $this->cPadding;
    }

    /**
     * @param int $cPadding
     */
    public function setcPadding($cPadding)
    {
        $this->cPadding = $cPadding;
    }

    /**
     * @return int
     */
    public function getLength()
    {
        return $this->length;
    }

    /**
     * @param int $length
     */
    public function setLength($length)
    {
        $this->length = $length;
    }
}
