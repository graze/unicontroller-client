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

class EntityPictureItem implements EntityInterface
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
     * @var int
     */
    protected $maintain;

    /**
     * @var string
     */
    protected $pictureName;

    /**
     * @var string
     */
    protected $printerReferenceName;

    /**
     * @var int
     */
    protected $usePixelSize;

    /**
     * @var string
     */
    protected $pictureData;

    /**
     * @var int
     */
    protected $storeInternally;

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
     * @return int
     */
    public function getMaintain()
    {
        return $this->maintain;
    }

    /**
     * @param int $maintain
     */
    public function setMaintain($maintain)
    {
        $this->maintain = $maintain;
    }

    /**
     * @return string
     */
    public function getPictureName()
    {
        return $this->pictureName;
    }

    /**
     * @param string $pictureName
     */
    public function setPictureName($pictureName)
    {
        $this->pictureName = $pictureName;
    }

    /**
     * @return string
     */
    public function getPrinterReferenceName()
    {
        return $this->printerReferenceName;
    }

    /**
     * @param string $printerReferenceName
     */
    public function setPrinterReferenceName($printerReferenceName)
    {
        $this->printerReferenceName = $printerReferenceName;
    }

    /**
     * @return int
     */
    public function getUsePixelSize()
    {
        return $this->usePixelSize;
    }

    /**
     * @param int $usePixelSize
     */
    public function setUsePixelSize($usePixelSize)
    {
        $this->usePixelSize = $usePixelSize;
    }

    /**
     * @return string
     */
    public function getPictureData()
    {
        return $this->pictureData;
    }

    /**
     * @param string $pictureData
     */
    public function setPictureData($pictureData)
    {
        $this->pictureData = $pictureData;
    }

    /**
     * @return int
     */
    public function getStoreInternally()
    {
        return $this->storeInternally;
    }

    /**
     * @param int $storeInternally
     */
    public function setStoreInternally($storeInternally)
    {
        $this->storeInternally = $storeInternally;
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
