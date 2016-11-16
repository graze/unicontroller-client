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

class EntityVarPrompt implements EntityInterface
{
    /**
     * @var string
     */
    protected $name;

    /**
     * @var string
     */
    protected $prompt;

    /**
     * @var int
     */
    protected $length;

    /**
     * @var int
     */
    protected $inputType;

    /**
     * @var int
     */
    protected $jumpSpecial;

    /**
     * @var int
     */
    protected $cPadding;

    /**
     * @var string
     */
    protected $mask;

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
     * @return string
     */
    public function getPrompt()
    {
        return $this->prompt;
    }

    /**
     * @param string $prompt
     */
    public function setPrompt($prompt)
    {
        $this->prompt = $prompt;
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

    /**
     * @return int
     */
    public function getInputType()
    {
        return $this->inputType;
    }

    /**
     * @param int $inputType
     */
    public function setInputType($inputType)
    {
        $this->inputType = $inputType;
    }

    /**
     * @return int
     */
    public function getJumpSpecial()
    {
        return $this->jumpSpecial;
    }

    /**
     * @param int $jumpSpecial
     */
    public function setJumpSpecial($jumpSpecial)
    {
        $this->jumpSpecial = $jumpSpecial;
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
     * @return string
     */
    public function getMask()
    {
        return $this->mask;
    }

    /**
     * @param string $mask
     */
    public function setMask($mask)
    {
        $this->mask = $mask;
    }
}
