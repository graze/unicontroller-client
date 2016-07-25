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

class EntityBarcodeItem implements EntityInterface
{
    /**
     * @var int
     */
    protected $anchorPoint;

    /**
     * @var int
     */
    protected $xPos;

    /**
     * @var int
     */
    protected $yPos;

    /**
     * @var int
     */
    protected $height;

    /**
     * @var int
     */
    protected $orion;

    /**
     * @var string
     */
    protected $description;

    /**
     * @var int
     */
    protected $narrow;

    /**
     * @var int
     */
    protected $inverted;

    /**
     * @var int
     */
    protected $barcodeType;

    /**
     * @var string
     */
    protected $data;

    /**
     * @var int
     */
    protected $humanReadable;

    /**
     * @var int
     */
    protected $ratio;

    /**
     * @var int
     */
    protected $frame;

    /**
     * @var int
     */
    protected $showDropDowns;

    /**
     * @var string
     */
    protected $fontName;

    /**
     * @var int
     */
    protected $pointSize;

    /**
     * @var int
     */
    protected $bold;

    /**
     * @var int
     */
    protected $italic;

    /**
     * @var int
     */
    protected $subType;

    /**
     * @var int
     */
    protected $preferredFormat;

    /**
     * @var int
     */
    protected $processTilde;

    /**
     * @var int
     */
    protected $separatorHeight;

    /**
     * @var int
     */
    protected $segmentWidth;

    /**
     * @var int
     */
    protected $useHibc;

    /**
     * @var int
     */
    protected $phantomField;

    /**
     * @return int
     */
    public function getAnchorPoint()
    {
        return $this->anchorPoint;
    }

    /**
     * @param int $anchorPoint
     */
    public function setAnchorPoint($anchorPoint)
    {
        $this->anchorPoint = $anchorPoint;
    }

    /**
     * @return int
     */
    public function getXPos()
    {
        return $this->xPos;
    }

    /**
     * @param int $xPos
     */
    public function setXPos($xPos)
    {
        $this->xPos = $xPos;
    }

    /**
     * @return int
     */
    public function getYPos()
    {
        return $this->yPos;
    }

    /**
     * @param int $yPos
     */
    public function setYPos($yPos)
    {
        $this->yPos = $yPos;
    }

    /**
     * @return int
     */
    public function getHeight()
    {
        return $this->height;
    }

    /**
     * @param int $height
     */
    public function setHeight($height)
    {
        $this->height = $height;
    }

    /**
     * @return int
     */
    public function getOrion()
    {
        return $this->orion;
    }

    /**
     * @param int $orion
     */
    public function setOrion($orion)
    {
        $this->orion = $orion;
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param string $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * @return int
     */
    public function getNarrow()
    {
        return $this->narrow;
    }

    /**
     * @param int $narrow
     */
    public function setNarrow($narrow)
    {
        $this->narrow = $narrow;
    }

    /**
     * @return int
     */
    public function getInverted()
    {
        return $this->inverted;
    }

    /**
     * @param int $inverted
     */
    public function setInverted($inverted)
    {
        $this->inverted = $inverted;
    }

    /**
     * @return int
     */
    public function getBarcodeType()
    {
        return $this->barcodeType;
    }

    /**
     * @param int $barcodeType
     */
    public function setBarcodeType($barcodeType)
    {
        $this->barcodeType = $barcodeType;
    }

    /**
     * @return string
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * @param string $data
     */
    public function setData($data)
    {
        $this->data = $data;
    }

    /**
     * @return int
     */
    public function getHumanReadable()
    {
        return $this->humanReadable;
    }

    /**
     * @param int $humanReadable
     */
    public function setHumanReadable($humanReadable)
    {
        $this->humanReadable = $humanReadable;
    }

    /**
     * @return int
     */
    public function getRatio()
    {
        return $this->ratio;
    }

    /**
     * @param int $ratio
     */
    public function setRatio($ratio)
    {
        $this->ratio = $ratio;
    }

    /**
     * @return int
     */
    public function getFrame()
    {
        return $this->frame;
    }

    /**
     * @param int $frame
     */
    public function setFrame($frame)
    {
        $this->frame = $frame;
    }

    /**
     * @return int
     */
    public function getShowDropDowns()
    {
        return $this->showDropDowns;
    }

    /**
     * @param int $showDropDowns
     */
    public function setShowDropDowns($showDropDowns)
    {
        $this->showDropDowns = $showDropDowns;
    }

    /**
     * @return string
     */
    public function getFontName()
    {
        return $this->fontName;
    }

    /**
     * @param string $fontName
     */
    public function setFontName($fontName)
    {
        $this->fontName = $fontName;
    }

    /**
     * @return int
     */
    public function getPointSize()
    {
        return $this->pointSize;
    }

    /**
     * @param int $pointSize
     */
    public function setPointSize($pointSize)
    {
        $this->pointSize = $pointSize;
    }

    /**
     * @return int
     */
    public function getBold()
    {
        return $this->bold;
    }

    /**
     * @param int $bold
     */
    public function setBold($bold)
    {
        $this->bold = $bold;
    }

    /**
     * @return int
     */
    public function getItalic()
    {
        return $this->italic;
    }

    /**
     * @param int $italic
     */
    public function setItalic($italic)
    {
        $this->italic = $italic;
    }

    /**
     * @return int
     */
    public function getSubType()
    {
        return $this->subType;
    }

    /**
     * @param int $subType
     */
    public function setSubType($subType)
    {
        $this->subType = $subType;
    }

    /**
     * @return int
     */
    public function getPreferredFormat()
    {
        return $this->preferredFormat;
    }

    /**
     * @param int $preferredFormat
     */
    public function setPreferredFormat($preferredFormat)
    {
        $this->preferredFormat = $preferredFormat;
    }

    /**
     * @return int
     */
    public function getProcessTilde()
    {
        return $this->processTilde;
    }

    /**
     * @param int $processTilde
     */
    public function setProcessTilde($processTilde)
    {
        $this->processTilde = $processTilde;
    }

    /**
     * @return int
     */
    public function getSeparatorHeight()
    {
        return $this->separatorHeight;
    }

    /**
     * @param int $separatorHeight
     */
    public function setSeparatorHeight($separatorHeight)
    {
        $this->separatorHeight = $separatorHeight;
    }

    /**
     * @return int
     */
    public function getSegmentWidth()
    {
        return $this->segmentWidth;
    }

    /**
     * @param int $segmentWidth
     */
    public function setSegmentWidth($segmentWidth)
    {
        $this->segmentWidth = $segmentWidth;
    }

    /**
     * @return int
     */
    public function getUseHibc()
    {
        return $this->useHibc;
    }

    /**
     * @param int $useHibc
     */
    public function setUseHibc($useHibc)
    {
        $this->useHibc = $useHibc;
    }

    /**
     * @return int
     */
    public function getPhantomField()
    {
        return $this->phantomField;
    }

    /**
     * @param int $phantomField
     */
    public function setPhantomField($phantomField)
    {
        $this->phantomField = $phantomField;
    }
}
