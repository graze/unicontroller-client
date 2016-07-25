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
     * @return string
     */
    protected function getPattern()
    {
        return '/^(?<name>[\s\S]+)?,(?<format>[\s\S]+)?,(?<offsetType>-?[0-9]+)?,(?<offsetValue>-?[0-9]+)?,(?<offset2Type>-?[0-9]+)?,(?<offset2Value>-?[0-9]+)?,(?<truncateDay>-?[0-9]+)?,(?<updatePolicy>-?[0-9]+)?,(?<updateDay>[\s\S]+)?,(?<updateHour>-?[0-9]+)?,(?<updateMinutte>-?[0-9]+)?,(?<language>-?[0-9]+)?,(?<variableOffset>-?[0-9]+)?,(?<dataSource>[\s\S]+)?,(?<cPadding>-?[0-9]+)?,(?<length>-?[0-9]+)?/';
    }

    /**
     * @return EntityVarRtc
     */
    protected function getEntity()
    {
        return new EntityVarRtc();
    }
}
