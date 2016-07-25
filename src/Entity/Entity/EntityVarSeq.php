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

class EntityVarSeq implements EntityInterface
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
    protected $interval;

    /**
     * @var int
     */
    protected $inputType;

    /**
     * @var int
     */
    protected $outputType;

    /**
     * @var int
     */
    protected $minValue;

    /**
     * @var int
     */
    protected $maxValue;

    /**
     * @var int
     */
    protected $rollOver;

    /**
     * @var int
     */
    protected $fixedStart;

    /**
     * @var int
     */
    protected $startValue;

    /**
     * @var int
     */
    protected $paddingType;

    /**
     * @var int
     */
    protected $repeatCount;

    /**
     * @var int
     */
    protected $resumeCount;

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
    public function getInterval()
    {
        return $this->interval;
    }

    /**
     * @param int $interval
     */
    public function setInterval($interval)
    {
        $this->interval = $interval;
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
    public function getOutputType()
    {
        return $this->outputType;
    }

    /**
     * @param int $outputType
     */
    public function setOutputType($outputType)
    {
        $this->outputType = $outputType;
    }

    /**
     * @return int
     */
    public function getMinValue()
    {
        return $this->minValue;
    }

    /**
     * @param int $minValue
     */
    public function setMinValue($minValue)
    {
        $this->minValue = $minValue;
    }

    /**
     * @return int
     */
    public function getMaxValue()
    {
        return $this->maxValue;
    }

    /**
     * @param int $maxValue
     */
    public function setMaxValue($maxValue)
    {
        $this->maxValue = $maxValue;
    }

    /**
     * @return int
     */
    public function getRollOver()
    {
        return $this->rollOver;
    }

    /**
     * @param int $rollOver
     */
    public function setRollOver($rollOver)
    {
        $this->rollOver = $rollOver;
    }

    /**
     * @return int
     */
    public function getFixedStart()
    {
        return $this->fixedStart;
    }

    /**
     * @param int $fixedStart
     */
    public function setFixedStart($fixedStart)
    {
        $this->fixedStart = $fixedStart;
    }

    /**
     * @return int
     */
    public function getStartValue()
    {
        return $this->startValue;
    }

    /**
     * @param int $startValue
     */
    public function setStartValue($startValue)
    {
        $this->startValue = $startValue;
    }

    /**
     * @return int
     */
    public function getPaddingType()
    {
        return $this->paddingType;
    }

    /**
     * @param int $paddingType
     */
    public function setPaddingType($paddingType)
    {
        $this->paddingType = $paddingType;
    }

    /**
     * @return int
     */
    public function getRepeatCount()
    {
        return $this->repeatCount;
    }

    /**
     * @param int $repeatCount
     */
    public function setRepeatCount($repeatCount)
    {
        $this->repeatCount = $repeatCount;
    }

    /**
     * @return int
     */
    public function getResumeCount()
    {
        return $this->resumeCount;
    }

    /**
     * @param int $resumeCount
     */
    public function setResumeCount($resumeCount)
    {
        $this->resumeCount = $resumeCount;
    }
}
