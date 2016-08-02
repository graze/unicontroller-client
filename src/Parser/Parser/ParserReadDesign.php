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
            'lineArry',
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
     * @return EntityDesign
     */
    protected function getEntity()
    {
        return new EntityReadDesign();
    }
}
