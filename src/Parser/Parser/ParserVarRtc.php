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
use Graze\UnicontrollerClient\Entity\Entity\EntityVarRtc;

class ParserVarRtc extends AbstractParser implements ParserInterface
{
    /**
     * @return []
     */
    protected function getProperties()
    {
        return [
            'name',
            'format',
            'offsetType',
            'offsetValue',
            'offset2Type',
            'offset2Value',
            'truncateDay',
            'updatePolicy',
            'updateDay',
            'updateHour',
            'updateMinutte',
            'language',
            'variableOffset',
            'dataSource',
            'cPadding',
            'length'
        ];
    }

    /**
     * @return EntityVarRtc
     */
    protected function getEntity()
    {
        return new EntityVarRtc();
    }
}
