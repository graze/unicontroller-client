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

class EntityShiftDefinition implements EntityInterface
{
    /**
     * @var string
     */
    protected $fromDay;

    /**
     * @var int
     */
    protected $fromHour;

    /**
     * @var int
     */
    protected $fromMinutte;

    /**
     * @var string
     */
    protected $toDay;

    /**
     * @var int
     */
    protected $toHour;

    /**
     * @var int
     */
    protected $toMinutte;

    /**
     * @var string
     */
    protected $shiftText;

    /**
     * @var int
     */
    protected $fromDay;

    /**
     * @var int
     */
    protected $toDay;

    /**
     * @var string
     */
    protected $from;

    /**
     * @var string
     */
    protected $to;

    /**
     * @return string
     */
    public function getFromDay()
    {
        return $this->fromDay;
    }

    /**
     * @param string $fromDay
     */
    public function setFromDay($fromDay)
    {
        $this->fromDay = $fromDay;
    }

    /**
     * @return int
     */
    public function getFromHour()
    {
        return $this->fromHour;
    }

    /**
     * @param int $fromHour
     */
    public function setFromHour($fromHour)
    {
        $this->fromHour = $fromHour;
    }

    /**
     * @return int
     */
    public function getFromMinutte()
    {
        return $this->fromMinutte;
    }

    /**
     * @param int $fromMinutte
     */
    public function setFromMinutte($fromMinutte)
    {
        $this->fromMinutte = $fromMinutte;
    }

    /**
     * @return string
     */
    public function getToDay()
    {
        return $this->toDay;
    }

    /**
     * @param string $toDay
     */
    public function setToDay($toDay)
    {
        $this->toDay = $toDay;
    }

    /**
     * @return int
     */
    public function getToHour()
    {
        return $this->toHour;
    }

    /**
     * @param int $toHour
     */
    public function setToHour($toHour)
    {
        $this->toHour = $toHour;
    }

    /**
     * @return int
     */
    public function getToMinutte()
    {
        return $this->toMinutte;
    }

    /**
     * @param int $toMinutte
     */
    public function setToMinutte($toMinutte)
    {
        $this->toMinutte = $toMinutte;
    }

    /**
     * @return string
     */
    public function getShiftText()
    {
        return $this->shiftText;
    }

    /**
     * @param string $shiftText
     */
    public function setShiftText($shiftText)
    {
        $this->shiftText = $shiftText;
    }

    /**
     * @return int
     */
    public function getFromDay()
    {
        return $this->fromDay;
    }

    /**
     * @param int $fromDay
     */
    public function setFromDay($fromDay)
    {
        $this->fromDay = $fromDay;
    }

    /**
     * @return int
     */
    public function getToDay()
    {
        return $this->toDay;
    }

    /**
     * @param int $toDay
     */
    public function setToDay($toDay)
    {
        $this->toDay = $toDay;
    }

    /**
     * @return string
     */
    public function getFrom()
    {
        return $this->from;
    }

    /**
     * @param string $from
     */
    public function setFrom($from)
    {
        $this->from = $from;
    }

    /**
     * @return string
     */
    public function getTo()
    {
        return $this->to;
    }

    /**
     * @param string $to
     */
    public function setTo($to)
    {
        $this->to = $to;
    }
}
