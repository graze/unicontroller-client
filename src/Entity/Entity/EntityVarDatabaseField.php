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

class EntityVarDatabaseField implements EntityInterface
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
    protected $dataField;

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
    protected $numberOfDecimals;

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
