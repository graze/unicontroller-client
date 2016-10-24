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
     * @var EntityLineItem[]
     */
    protected $lineArray = [];

    /**
     * @var EntityBoxItem[]
     */
    protected $boxArray = [];

    /**
     * @var EntityTtfItem[]
     */
    protected $ttfArray = [];

    /**
     * @var EntityBarcodeItem[]
     */
    protected $barcodeArray = [];

    /**
     * @var EntityPictureItem[]
     */
    protected $pictureArray = [];

    /**
     * @var EntityVarPrompt[]
     */
    protected $promptArray = [];

    /**
     * @var EntityVarSeq[]
     */
    protected $seqArray = [];

    /**
     * @var EntityVarRtc[]
     */
    protected $rtcArray = [];

    /**
     * @var EntityVarDatabase[]
     */
    protected $databaseArray = [];

    /**
     * @var EntityVarUserId[]
     */
    protected $userIdArray = [];

    /**
     * @var EntityVarShiftCode[]
     */
    protected $shiftCodeArray = [];

    /**
     * @var EntityVarMachineId[]
     */
    protected $machineIdArray = [];

    /**
     * @var EntityVarDatabaseField[]
     */
    protected $databaseFieldArray = [];

    /**
     * @var EntityVarMacro[]
     */
    protected $macroArray = [];

    /**
     * @var EntityVarMacroOutput[]
     */
    protected $macroOutputArray = [];

    /**
     * @var EntityVarSerial[]
     */
    protected $serialVarArray = [];

    /**
     * @var EntitySettingsById[]
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
     * @return EntityLineItem[]
     */
    public function getLineArray()
    {
        return $this->lineArray;
    }

    /**
     * @param EntityLineItem[] $lineArray
     */
    public function setLineArray(array $lineArray)
    {
        $this->lineArray = $lineArray;
    }

    /**
     * @return EntityBoxItem[]
     */
    public function getBoxArray()
    {
        return $this->boxArray;
    }

    /**
     * @param EntityBoxItem[] $boxArray
     */
    public function setBoxArray(array $boxArray)
    {
        $this->boxArray = $boxArray;
    }

    /**
     * @return EntityTtfItem[]
     */
    public function getTtfArray()
    {
        return $this->ttfArray;
    }

    /**
     * @param EntityTtfItem[] $ttfArray
     */
    public function setTtfArray(array $ttfArray)
    {
        $this->ttfArray = $ttfArray;
    }

    /**
     * @return EntityBarcodeItem[]
     */
    public function getBarcodeArray()
    {
        return $this->barcodeArray;
    }

    /**
     * @param EntityBarcodeItem[] $barcodeArray
     */
    public function setBarcodeArray(array $barcodeArray)
    {
        $this->barcodeArray = $barcodeArray;
    }

    /**
     * @return EntityPictureItem[]
     */
    public function getPictureArray()
    {
        return $this->pictureArray;
    }

    /**
     * @param EntityPictureItem[] $pictureArray
     */
    public function setPictureArray(array $pictureArray)
    {
        $this->pictureArray = $pictureArray;
    }

    /**
     * @return EntityVarPrompt[]
     */
    public function getPromptArray()
    {
        return $this->promptArray;
    }

    /**
     * @param EntityVarPrompt[] $promptArray
     */
    public function setPromptArray(array $promptArray)
    {
        $this->promptArray = $promptArray;
    }

    /**
     * @return EntityVarSeq[]
     */
    public function getSeqArray()
    {
        return $this->seqArray;
    }

    /**
     * @param EntityVarSeq[] $seqArray
     */
    public function setSeqArray(array $seqArray)
    {
        $this->seqArray = $seqArray;
    }

    /**
     * @return EntityVarRtc[]
     */
    public function getRtcArray()
    {
        return $this->rtcArray;
    }

    /**
     * @param EntityVarRtc[] $rtcArray
     */
    public function setRtcArray(array $rtcArray)
    {
        $this->rtcArray = $rtcArray;
    }

    /**
     * @return EntityVarDatabase[]
     */
    public function getDatabaseArray()
    {
        return $this->databaseArray;
    }

    /**
     * @param EntityVarDatabase[] $databaseArray
     */
    public function setDatabaseArray(array $databaseArray)
    {
        $this->databaseArray = $databaseArray;
    }

    /**
     * @return EntityVarUserId[]
     */
    public function getUserIdArray()
    {
        return $this->userIdArray;
    }

    /**
     * @param EntityVarUserId[] $userIdArray
     */
    public function setUserIdArray(array $userIdArray)
    {
        $this->userIdArray = $userIdArray;
    }

    /**
     * @return EntityVarShiftCode[]
     */
    public function getShiftCodeArray()
    {
        return $this->shiftCodeArray;
    }

    /**
     * @param EntityVarShiftCode[] $shiftCodeArray
     */
    public function setShiftCodeArray(array $shiftCodeArray)
    {
        $this->shiftCodeArray = $shiftCodeArray;
    }

    /**
     * @return EntityVarMachineId[]
     */
    public function getMachineIdArray()
    {
        return $this->machineIdArray;
    }

    /**
     * @param EntityVarMachineId[] $machineIdArray
     */
    public function setMachineIdArray(array $machineIdArray)
    {
        $this->machineIdArray = $machineIdArray;
    }

    /**
     * @return EntityVarDatabaseField[]
     */
    public function getDatabaseFieldArray()
    {
        return $this->databaseFieldArray;
    }

    /**
     * @param EntityVarDatabaseField[] $databaseFieldArray
     */
    public function setDatabaseFieldArray(array $databaseFieldArray)
    {
        $this->databaseFieldArray = $databaseFieldArray;
    }

    /**
     * @return EntityVarMacro[]
     */
    public function getMacroArray()
    {
        return $this->macroArray;
    }

    /**
     * @param EntityVarMacro[] $macroArray
     */
    public function setMacroArray(array $macroArray)
    {
        $this->macroArray = $macroArray;
    }

    /**
     * @return EntityVarMacroOutput[]
     */
    public function getMacroOutputArray()
    {
        return $this->macroOutputArray;
    }

    /**
     * @param EntityVarMacroOutput[] $macroOutputArray
     */
    public function setMacroOutputArray(array $macroOutputArray)
    {
        $this->macroOutputArray = $macroOutputArray;
    }

    /**
     * @return EntityVarSerial[]
     */
    public function getSerialVarArray()
    {
        return $this->serialVarArray;
    }

    /**
     * @param EntityVarSerial[] $serialVarArray
     */
    public function setSerialVarArray(array $serialVarArray)
    {
        $this->serialVarArray = $serialVarArray;
    }

    /**
     * @return EntitySettingsById[]
     */
    public function getSettingsArray()
    {
        return $this->settingsArray;
    }

    /**
     * @param EntitySettingsById[] $settingsArray
     */
    public function setSettingsArray(array $settingsArray)
    {
        $this->settingsArray = $settingsArray;
    }
}
