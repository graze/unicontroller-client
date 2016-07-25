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
     * @return string
     */
    protected function getPattern()
    {
        return '/^(?<name>[\s\S]+)?,(?<height>-?[0-9]+)?,(?<width>-?[0-9]+)?,(?<storageMode>-?[0-9]+)?,(?<saveDesign>-?[0-9]+)?,(?<printDesign>-?[0-9]+)?,(?<driverID>-?[0-9]+)?,(?<printCount>-?[0-9]+)?,(?<cycleSize>-?[0-9]+)?,(?<readOk>-?[0-9]+)?,(?<lineArray>LineItem,[0-9]+,[\s\S]*),(?<boxArray>BoxItem,[0-9]+,[\s\S]*),(?<ttfArray>TtfItem,[0-9]+,[\s\S]*),(?<barcodeArray>BarcodeItem,[0-9]+,[\s\S]*),(?<pictureArray>PictureItem,[0-9]+,[\s\S]*),(?<promptArray>VarPrompt,[0-9]+,[\s\S]*),(?<seqArray>VarSeq,[0-9]+,[\s\S]*),(?<rtcArray>VarRtc,[0-9]+,[\s\S]*),(?<databaseArray>VarDatabase,[0-9]+,[\s\S]*),(?<userIdArray>VarUserId,[0-9]+,[\s\S]*),(?<shiftCodeArray>VarShiftCode,[0-9]+,[\s\S]*),(?<machineIdArray>VarMachineId,[0-9]+,[\s\S]*),(?<databaseFieldArray>VarDatabaseField,[0-9]+,[\s\S]*),(?<macroArray>VarMacro,[0-9]+,[\s\S]*),(?<macroOutputArray>VarMacroOutput,[0-9]+,[\s\S]*),(?<serialVarArray>VarSerial,[0-9]+,[\s\S]*),(?<settingsArray>SettingsById,[0-9]+,[\s\S]*)$/';
    }

    /**
     * @return EntityDesign
     */
    protected function getEntity()
    {
        return new EntityReadDesign();
    }
}
