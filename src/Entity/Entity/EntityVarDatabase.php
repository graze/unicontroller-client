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

class EntityVarDatabase implements EntityInterface
{
    /**
     * @var string
     */
    protected $name;

    /**
     * @var string
     */
    protected $dataSource;

    /**
     * @var string
     */
    protected $refFileName;

    /**
     * @var string
     */
    protected $table;

    /**
     * @var string
     */
    protected $keyField;

    /**
     * @var string
     */
    protected $dataField;

    /**
     * @var string
     */
    protected $prompt;

    /**
     * @var int
     */
    protected $displayLength;

    /**
     * @var int
     */
    protected $trimTrailingSpaces;

    /**
     * @var int
     */
    protected $printAll;

    /**
     * @var int
     */
    protected $fixedKey;

    /**
     * @var int
     */
    protected $singleData;

    /**
     * @var int
     */
    protected $usePrompt;

    /**
     * @var string
     */
    protected $keyData;

    /**
     * @var string
     */
    protected $fixedKeyData;

    /**
     * @var string
     */
    protected $codePage;

    /**
     * @var int
     */
    protected $numberOfDecimals;

    /**
     * @var int
     */
    protected $runSequence;

    /**
     * @var int
     */
    protected $actionWhenDone;

    /**
     * @var int
     */
    protected $rawBaseData;

    /**
     * @var int
     */
    protected $databaseType;

    /**
     * @var int
     */
    protected $cPadding;

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
     * @return string
     */
    public function getRefFileName()
    {
        return $this->refFileName;
    }

    /**
     * @param string $refFileName
     */
    public function setRefFileName($refFileName)
    {
        $this->refFileName = $refFileName;
    }

    /**
     * @return string
     */
    public function getTable()
    {
        return $this->table;
    }

    /**
     * @param string $table
     */
    public function setTable($table)
    {
        $this->table = $table;
    }

    /**
     * @return string
     */
    public function getKeyField()
    {
        return $this->keyField;
    }

    /**
     * @param string $keyField
     */
    public function setKeyField($keyField)
    {
        $this->keyField = $keyField;
    }

    /**
     * @return string
     */
    public function getDataField()
    {
        return $this->dataField;
    }

    /**
     * @param string $dataField
     */
    public function setDataField($dataField)
    {
        $this->dataField = $dataField;
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
    public function getDisplayLength()
    {
        return $this->displayLength;
    }

    /**
     * @param int $displayLength
     */
    public function setDisplayLength($displayLength)
    {
        $this->displayLength = $displayLength;
    }

    /**
     * @return int
     */
    public function getTrimTrailingSpaces()
    {
        return $this->trimTrailingSpaces;
    }

    /**
     * @param int $trimTrailingSpaces
     */
    public function setTrimTrailingSpaces($trimTrailingSpaces)
    {
        $this->trimTrailingSpaces = $trimTrailingSpaces;
    }

    /**
     * @return int
     */
    public function getPrintAll()
    {
        return $this->printAll;
    }

    /**
     * @param int $printAll
     */
    public function setPrintAll($printAll)
    {
        $this->printAll = $printAll;
    }

    /**
     * @return int
     */
    public function getFixedKey()
    {
        return $this->fixedKey;
    }

    /**
     * @param int $fixedKey
     */
    public function setFixedKey($fixedKey)
    {
        $this->fixedKey = $fixedKey;
    }

    /**
     * @return int
     */
    public function getSingleData()
    {
        return $this->singleData;
    }

    /**
     * @param int $singleData
     */
    public function setSingleData($singleData)
    {
        $this->singleData = $singleData;
    }

    /**
     * @return int
     */
    public function getUsePrompt()
    {
        return $this->usePrompt;
    }

    /**
     * @param int $usePrompt
     */
    public function setUsePrompt($usePrompt)
    {
        $this->usePrompt = $usePrompt;
    }

    /**
     * @return string
     */
    public function getKeyData()
    {
        return $this->keyData;
    }

    /**
     * @param string $keyData
     */
    public function setKeyData($keyData)
    {
        $this->keyData = $keyData;
    }

    /**
     * @return string
     */
    public function getFixedKeyData()
    {
        return $this->fixedKeyData;
    }

    /**
     * @param string $fixedKeyData
     */
    public function setFixedKeyData($fixedKeyData)
    {
        $this->fixedKeyData = $fixedKeyData;
    }

    /**
     * @return string
     */
    public function getCodePage()
    {
        return $this->codePage;
    }

    /**
     * @param string $codePage
     */
    public function setCodePage($codePage)
    {
        $this->codePage = $codePage;
    }

    /**
     * @return int
     */
    public function getNumberOfDecimals()
    {
        return $this->numberOfDecimals;
    }

    /**
     * @param int $numberOfDecimals
     */
    public function setNumberOfDecimals($numberOfDecimals)
    {
        $this->numberOfDecimals = $numberOfDecimals;
    }

    /**
     * @return int
     */
    public function getRunSequence()
    {
        return $this->runSequence;
    }

    /**
     * @param int $runSequence
     */
    public function setRunSequence($runSequence)
    {
        $this->runSequence = $runSequence;
    }

    /**
     * @return int
     */
    public function getActionWhenDone()
    {
        return $this->actionWhenDone;
    }

    /**
     * @param int $actionWhenDone
     */
    public function setActionWhenDone($actionWhenDone)
    {
        $this->actionWhenDone = $actionWhenDone;
    }

    /**
     * @return int
     */
    public function getrawBaseData()
    {
        return $this->rawBaseData;
    }

    /**
     * @param int $rawBaseData
     */
    public function setrawBaseData($rawBaseData)
    {
        $this->rawBaseData = $rawBaseData;
    }

    /**
     * @return int
     */
    public function getDatabaseType()
    {
        return $this->databaseType;
    }

    /**
     * @param int $databaseType
     */
    public function setDatabaseType($databaseType)
    {
        $this->databaseType = $databaseType;
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
}
