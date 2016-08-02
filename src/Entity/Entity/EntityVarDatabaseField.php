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
    protected $dBaseField;

    /**
     * @var string
     */
    protected $varDatabase1;

    /**
     * @var string
     */
    protected $cOL_DATA2;

    /**
     * @var int
     */
    protected $0;

    /**
     * @var int
     */
    protected $0;

    /**
     * @var int
     */
    protected $4;

    /**
     * @var int
     */
    protected $1;

    /**
     * @var int
     */
    protected $10;

    /**
     * @return string
     */
    public function getdBaseField()
    {
        return $this->dBaseField;
    }

    /**
     * @param string $dBaseField
     */
    public function setdBaseField($dBaseField)
    {
        $this->dBaseField = $dBaseField;
    }

    /**
     * @return string
     */
    public function getVarDatabase1()
    {
        return $this->varDatabase1;
    }

    /**
     * @param string $varDatabase1
     */
    public function setVarDatabase1($varDatabase1)
    {
        $this->varDatabase1 = $varDatabase1;
    }

    /**
     * @return string
     */
    public function getCOL_DATA2()
    {
        return $this->cOL_DATA2;
    }

    /**
     * @param string $cOL_DATA2
     */
    public function setCOL_DATA2($cOL_DATA2)
    {
        $this->cOL_DATA2 = $cOL_DATA2;
    }

    /**
     * @return int
     */
    public function get0()
    {
        return $this->0;
    }

    /**
     * @param int $0
     */
    public function set0($0)
    {
        $this->0 = $0;
    }

    /**
     * @return int
     */
    public function get0()
    {
        return $this->0;
    }

    /**
     * @param int $0
     */
    public function set0($0)
    {
        $this->0 = $0;
    }

    /**
     * @return int
     */
    public function get4()
    {
        return $this->4;
    }

    /**
     * @param int $4
     */
    public function set4($4)
    {
        $this->4 = $4;
    }

    /**
     * @return int
     */
    public function get1()
    {
        return $this->1;
    }

    /**
     * @param int $1
     */
    public function set1($1)
    {
        $this->1 = $1;
    }

    /**
     * @return int
     */
    public function get10()
    {
        return $this->10;
    }

    /**
     * @param int $10
     */
    public function set10($10)
    {
        $this->10 = $10;
    }
}
