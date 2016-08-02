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

class EntityVarMacro implements EntityInterface
{
    /**
     * @var string
     */
    protected $name;

    /**
     * @var string
     */
    protected $macroDefinition;

    /**
     * @var int
     */
    protected $isSeq;

    /**
     * @var int
     */
    protected $isRtc;

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
     * @return string
     */
    public function getMacroDefinition()
    {
        return $this->macroDefinition;
    }

    /**
     * @param string $macroDefinition
     */
    public function setMacroDefinition($macroDefinition)
    {
        $this->macroDefinition = $macroDefinition;
    }

    /**
     * @return int
     */
    public function getIsSeq()
    {
        return $this->isSeq;
    }

    /**
     * @param int $isSeq
     */
    public function setIsSeq($isSeq)
    {
        $this->isSeq = $isSeq;
    }

    /**
     * @return int
     */
    public function getIsRtc()
    {
        return $this->isRtc;
    }

    /**
     * @param int $isRtc
     */
    public function setIsRtc($isRtc)
    {
        $this->isRtc = $isRtc;
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
