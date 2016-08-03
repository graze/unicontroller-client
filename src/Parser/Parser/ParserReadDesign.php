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
namespace Graze\UnicontrollerClient\Parser\Parser;

use Graze\UnicontrollerClient\Parser\Parser\AbstractParser;
use Graze\UnicontrollerClient\Parser\Parser\ParserInterface;
use Graze\UnicontrollerClient\Entity\Entity\EntityReadDesign;

class ParserReadDesign extends AbstractParser implements ParserInterface
{
    /**
     * @return []
     */
    protected function getProperties()
    {
        return [
            'name',
            'height',
            'width',
            'storageMode',
            'saveDesign',
            'printDesign',
            'driverId',
            'printCount',
            'cycleSize',
            'readOk',
            'lineArray',
            'boxArray',
            'ttfArray',
            'barcodeArray',
            'pictureArray',
            'promptArray',
            'seqArray',
            'rtcArray',
            'databaseArray',
            'userIdArray',
            'shiftCodeArray',
            'machineIdArray',
            'databaseFieldArray',
            'macroArray',
            'macroOutputArray',
            'serialVarArray',
            'settingsArray',
        ];
    }

    /**
     * @param string $string
     * @return Graze\UnicontrollerClient\Entity\Entity\EntityInterface
     */
    public function parse($string)
    {
        // to make parsing easier, "\r\n," is used as the end token for an array
        // as this response ends with an array, the final ',' is missing, add it here
        return parent::parse($string . ', ');
    }

    /**
     * @return EntityDesign
     */
    protected function getEntity()
    {
        return new EntityReadDesign();
    }
}
