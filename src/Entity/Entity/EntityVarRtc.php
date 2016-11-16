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

class EntityVarRtc implements EntityInterface
{
    /**
     * @var string
     */
    protected $name;

    /**
     * @var string
     */
    protected $format;

    /**
     * @var int
     */
    protected $offsetType;

    /**
     * @var int
     */
    protected $offsetValue;

    /**
     * @var int
     */
    protected $offset2Type;

    /**
     * @var int
     */
    protected $offset2Value;

    /**
     * @var int
     */
    protected $truncateDay;

    /**
     * @var int
     */
    protected $updatePolicy;

    /**
     * @var string
     */
    protected $updateDay;

    /**
     * @var int
     */
    protected $updateHour;

    /**
     * @var int
     */
    protected $updateMinutte;

    /**
     * @var int
     */
    protected $language;

    /**
     * @var int
     */
    protected $variableOffset;

    /**
     * @var string
     */
    protected $dataSource;

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
    public function getFormat()
    {
        return $this->format;
    }

    /**
     * @param string $format
     */
    public function setFormat($format)
    {
        $this->format = $format;
    }

    /**
     * @return int
     */
    public function getOffsetType()
    {
        return $this->offsetType;
    }

    /**
     * @param int $offsetType
     */
    public function setOffsetType($offsetType)
    {
        $this->offsetType = $offsetType;
    }

    /**
     * @return int
     */
    public function getOffsetValue()
    {
        return $this->offsetValue;
    }

    /**
     * @param int $offsetValue
     */
    public function setOffsetValue($offsetValue)
    {
        $this->offsetValue = $offsetValue;
    }

    /**
     * @return int
     */
    public function getOffset2Type()
    {
        return $this->offset2Type;
    }

    /**
     * @param int $offset2Type
     */
    public function setOffset2Type($offset2Type)
    {
        $this->offset2Type = $offset2Type;
    }

    /**
     * @return int
     */
    public function getOffset2Value()
    {
        return $this->offset2Value;
    }

    /**
     * @param int $offset2Value
     */
    public function setOffset2Value($offset2Value)
    {
        $this->offset2Value = $offset2Value;
    }

    /**
     * @return int
     */
    public function getTruncateDay()
    {
        return $this->truncateDay;
    }

    /**
     * @param int $truncateDay
     */
    public function setTruncateDay($truncateDay)
    {
        $this->truncateDay = $truncateDay;
    }

    /**
     * @return int
     */
    public function getUpdatePolicy()
    {
        return $this->updatePolicy;
    }

    /**
     * @param int $updatePolicy
     */
    public function setUpdatePolicy($updatePolicy)
    {
        $this->updatePolicy = $updatePolicy;
    }

    /**
     * @return string
     */
    public function getUpdateDay()
    {
        return $this->updateDay;
    }

    /**
     * @param string $updateDay
     */
    public function setUpdateDay($updateDay)
    {
        $this->updateDay = $updateDay;
    }

    /**
     * @return int
     */
    public function getUpdateHour()
    {
        return $this->updateHour;
    }

    /**
     * @param int $updateHour
     */
    public function setUpdateHour($updateHour)
    {
        $this->updateHour = $updateHour;
    }

    /**
     * @return int
     */
    public function getUpdateMinutte()
    {
        return $this->updateMinutte;
    }

    /**
     * @param int $updateMinutte
     */
    public function setUpdateMinutte($updateMinutte)
    {
        $this->updateMinutte = $updateMinutte;
    }

    /**
     * @return int
     */
    public function getLanguage()
    {
        return $this->language;
    }

    /**
     * @param int $language
     */
    public function setLanguage($language)
    {
        $this->language = $language;
    }

    /**
     * @return int
     */
    public function getVariableOffset()
    {
        return $this->variableOffset;
    }

    /**
     * @param int $variableOffset
     */
    public function setVariableOffset($variableOffset)
    {
        $this->variableOffset = $variableOffset;
    }

    /**
     * @return string
     */
    public function getDataSource()
    {
        return $this->dataSource;
    }

    /**
     * @param string $dataSource
     */
    public function setDataSource($dataSource)
    {
        $this->dataSource = $dataSource;
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
