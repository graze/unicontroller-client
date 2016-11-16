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

class EntityTtfItem implements EntityInterface
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
    protected $width;

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
     * @var string
     */
    protected $fontName;

    /**
     * @var int
     */
    protected $fontSize;

    /**
     * @var int
     */
    protected $fontBold;

    /**
     * @var int
     */
    protected $fontItalic;

    /**
     * @var int
     */
    protected $fontUnderline;

    /**
     * @var int
     */
    protected $inverted;

    /**
     * @var int
     */
    protected $alignment;

    /**
     * @var string
     */
    protected $data;

    /**
     * @var int
     */
    protected $ftbMode;

    /**
     * @var int
     */
    protected $lineSpacing;

    /**
     * @var int
     */
    protected $removeBlank;

    /**
     * @var int
     */
    protected $fontWidth;

    /**
     * @var int
     */
    protected $charSpacing;

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
    public function getWidth()
    {
        return $this->width;
    }

    /**
     * @param int $width
     */
    public function setWidth($width)
    {
        $this->width = $width;
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
    public function getFontSize()
    {
        return $this->fontSize;
    }

    /**
     * @param int $fontSize
     */
    public function setFontSize($fontSize)
    {
        $this->fontSize = $fontSize;
    }

    /**
     * @return int
     */
    public function getFontBold()
    {
        return $this->fontBold;
    }

    /**
     * @param int $fontBold
     */
    public function setFontBold($fontBold)
    {
        $this->fontBold = $fontBold;
    }

    /**
     * @return int
     */
    public function getFontItalic()
    {
        return $this->fontItalic;
    }

    /**
     * @param int $fontItalic
     */
    public function setFontItalic($fontItalic)
    {
        $this->fontItalic = $fontItalic;
    }

    /**
     * @return int
     */
    public function getFontUnderline()
    {
        return $this->fontUnderline;
    }

    /**
     * @param int $fontUnderline
     */
    public function setFontUnderline($fontUnderline)
    {
        $this->fontUnderline = $fontUnderline;
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
    public function getAlignment()
    {
        return $this->alignment;
    }

    /**
     * @param int $alignment
     */
    public function setAlignment($alignment)
    {
        $this->alignment = $alignment;
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
    public function getFtbMode()
    {
        return $this->ftbMode;
    }

    /**
     * @param int $ftbMode
     */
    public function setFtbMode($ftbMode)
    {
        $this->ftbMode = $ftbMode;
    }

    /**
     * @return int
     */
    public function getLineSpacing()
    {
        return $this->lineSpacing;
    }

    /**
     * @param int $lineSpacing
     */
    public function setLineSpacing($lineSpacing)
    {
        $this->lineSpacing = $lineSpacing;
    }

    /**
     * @return int
     */
    public function getRemoveBlank()
    {
        return $this->removeBlank;
    }

    /**
     * @param int $removeBlank
     */
    public function setRemoveBlank($removeBlank)
    {
        $this->removeBlank = $removeBlank;
    }

    /**
     * @return int
     */
    public function getFontWidth()
    {
        return $this->fontWidth;
    }

    /**
     * @param int $fontWidth
     */
    public function setFontWidth($fontWidth)
    {
        $this->fontWidth = $fontWidth;
    }

    /**
     * @return int
     */
    public function getCharSpacing()
    {
        return $this->charSpacing;
    }

    /**
     * @param int $charSpacing
     */
    public function setCharSpacing($charSpacing)
    {
        $this->charSpacing = $charSpacing;
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
