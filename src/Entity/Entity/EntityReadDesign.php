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

class EntityReadDesign implements EntityInterface
{
    /**
     * @var string
     */
    protected $name;

    /**
     * @var int
     */
    protected $height;

    /**
     * @var int
     */
    protected $width;

    /**
     * @var int
     */
    protected $storageMode;

    /**
     * @var int
     */
    protected $saveDesign;

    /**
     * @var int
     */
    protected $printDesign;

    /**
     * @var int
     */
    protected $driverId;

    /**
     * @var int
     */
    protected $printCount;

    /**
     * @var int
     */
    protected $cycleSize;

    /**
     * @var int
     */
    protected $readOk;

    /**
     * @var LineItem[]
     */
    protected $lineArray = [];

    /**
     * @var BoxItem[]
     */
    protected $boxArray = [];

    /**
     * @var TtfItem[]
     */
    protected $ttfArray = [];

    /**
     * @var BarcodeItem[]
     */
    protected $barcodeArray = [];

    /**
     * @var PictureItem[]
     */
    protected $pictureArray = [];

    /**
     * @var VarPrompt[]
     */
    protected $promptArray = [];

    /**
     * @var VarSeq[]
     */
    protected $seqArray = [];

    /**
     * @var VarRtc[]
     */
    protected $rtcArray = [];

    /**
     * @var VarDatabase[]
     */
    protected $databaseArray = [];

    /**
     * @var VarUserId[]
     */
    protected $userIdArray = [];

    /**
     * @var VarShiftCode[]
     */
    protected $shiftCodeArray = [];

    /**
     * @var VarMachineId[]
     */
    protected $machineIdArray = [];

    /**
     * @var VarDatabaseField[]
     */
    protected $databaseFieldArray = [];

    /**
     * @var VarMacro[]
     */
    protected $macroArray = [];

    /**
     * @var VarMacroOutput[]
     */
    protected $macroOutputArray = [];

    /**
     * @var VarSerial[]
     */
    protected $serialVarArray = [];

    /**
     * @var SettingsById[]
     */
    protected $settingsArray = [];

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
    public function getStorageMode()
    {
        return $this->storageMode;
    }

    /**
     * @param int $storageMode
     */
    public function setStorageMode($storageMode)
    {
        $this->storageMode = $storageMode;
    }

    /**
     * @return int
     */
    public function getSaveDesign()
    {
        return $this->saveDesign;
    }

    /**
     * @param int $saveDesign
     */
    public function setSaveDesign($saveDesign)
    {
        $this->saveDesign = $saveDesign;
    }

    /**
     * @return int
     */
    public function getPrintDesign()
    {
        return $this->printDesign;
    }

    /**
     * @param int $printDesign
     */
    public function setPrintDesign($printDesign)
    {
        $this->printDesign = $printDesign;
    }

    /**
     * @return int
     */
    public function getDriverId()
    {
        return $this->driverId;
    }

    /**
     * @param int $driverId
     */
    public function setDriverId($driverId)
    {
        $this->driverId = $driverId;
    }

    /**
     * @return int
     */
    public function getPrintCount()
    {
        return $this->printCount;
    }

    /**
     * @param int $printCount
     */
    public function setPrintCount($printCount)
    {
        $this->printCount = $printCount;
    }

    /**
     * @return int
     */
    public function getCycleSize()
    {
        return $this->cycleSize;
    }

    /**
     * @param int $cycleSize
     */
    public function setCycleSize($cycleSize)
    {
        $this->cycleSize = $cycleSize;
    }

    /**
     * @return int
     */
    public function getReadOk()
    {
        return $this->readOk;
    }

    /**
     * @param int $readOk
     */
    public function setReadOk($readOk)
    {
        $this->readOk = $readOk;
    }

    /**
     * @return LineItem[]
     */
    public function getLineArray()
    {
        return $this->lineArray;
    }

    /**
     * @param array $lineArray
     */
    public function setLineArray(array $lineArray)
    {
        $this->lineArray = $lineArray;
    }

    /**
     * @return BoxItem[]
     */
    public function getBoxArray()
    {
        return $this->boxArray;
    }

    /**
     * @param array $boxArray
     */
    public function setBoxArray(array $boxArray)
    {
        $this->boxArray = $boxArray;
    }

    /**
     * @return TtfItem[]
     */
    public function getTtfArray()
    {
        return $this->ttfArray;
    }

    /**
     * @param array $ttfArray
     */
    public function setTtfArray(array $ttfArray)
    {
        $this->ttfArray = $ttfArray;
    }

    /**
     * @return BarcodeItem[]
     */
    public function getBarcodeArray()
    {
        return $this->barcodeArray;
    }

    /**
     * @param array $barcodeArray
     */
    public function setBarcodeArray(array $barcodeArray)
    {
        $this->barcodeArray = $barcodeArray;
    }

    /**
     * @return PictureItem[]
     */
    public function getPictureArray()
    {
        return $this->pictureArray;
    }

    /**
     * @param array $pictureArray
     */
    public function setPictureArray(array $pictureArray)
    {
        $this->pictureArray = $pictureArray;
    }

    /**
     * @return VarPrompt[]
     */
    public function getPromptArray()
    {
        return $this->promptArray;
    }

    /**
     * @param array $promptArray
     */
    public function setPromptArray(array $promptArray)
    {
        $this->promptArray = $promptArray;
    }

    /**
     * @return VarSeq[]
     */
    public function getSeqArray()
    {
        return $this->seqArray;
    }

    /**
     * @param array $seqArray
     */
    public function setSeqArray(array $seqArray)
    {
        $this->seqArray = $seqArray;
    }

    /**
     * @return VarRtc[]
     */
    public function getRtcArray()
    {
        return $this->rtcArray;
    }

    /**
     * @param array $rtcArray
     */
    public function setRtcArray(array $rtcArray)
    {
        $this->rtcArray = $rtcArray;
    }

    /**
     * @return VarDatabase[]
     */
    public function getDatabaseArray()
    {
        return $this->databaseArray;
    }

    /**
     * @param array $databaseArray
     */
    public function setDatabaseArray(array $databaseArray)
    {
        $this->databaseArray = $databaseArray;
    }

    /**
     * @return VarUserId[]
     */
    public function getUserIdArray()
    {
        return $this->userIdArray;
    }

    /**
     * @param array $userIdArray
     */
    public function setUserIdArray(array $userIdArray)
    {
        $this->userIdArray = $userIdArray;
    }

    /**
     * @return VarShiftCode[]
     */
    public function getShiftCodeArray()
    {
        return $this->shiftCodeArray;
    }

    /**
     * @param array $shiftCodeArray
     */
    public function setShiftCodeArray(array $shiftCodeArray)
    {
        $this->shiftCodeArray = $shiftCodeArray;
    }

    /**
     * @return VarMachineId[]
     */
    public function getMachineIdArray()
    {
        return $this->machineIdArray;
    }

    /**
     * @param array $machineIdArray
     */
    public function setMachineIdArray(array $machineIdArray)
    {
        $this->machineIdArray = $machineIdArray;
    }

    /**
     * @return VarDatabaseField[]
     */
    public function getDatabaseFieldArray()
    {
        return $this->databaseFieldArray;
    }

    /**
     * @param array $databaseFieldArray
     */
    public function setDatabaseFieldArray(array $databaseFieldArray)
    {
        $this->databaseFieldArray = $databaseFieldArray;
    }

    /**
     * @return VarMacro[]
     */
    public function getMacroArray()
    {
        return $this->macroArray;
    }

    /**
     * @param array $macroArray
     */
    public function setMacroArray(array $macroArray)
    {
        $this->macroArray = $macroArray;
    }

    /**
     * @return VarMacroOutput[]
     */
    public function getMacroOutputArray()
    {
        return $this->macroOutputArray;
    }

    /**
     * @param array $macroOutputArray
     */
    public function setMacroOutputArray(array $macroOutputArray)
    {
        $this->macroOutputArray = $macroOutputArray;
    }

    /**
     * @return VarSerial[]
     */
    public function getSerialVarArray()
    {
        return $this->serialVarArray;
    }

    /**
     * @param array $serialVarArray
     */
    public function setSerialVarArray(array $serialVarArray)
    {
        $this->serialVarArray = $serialVarArray;
    }

    /**
     * @return SettingsById[]
     */
    public function getSettingsArray()
    {
        return $this->settingsArray;
    }

    /**
     * @param array $settingsArray
     */
    public function setSettingsArray(array $settingsArray)
    {
        $this->settingsArray = $settingsArray;
    }
}
