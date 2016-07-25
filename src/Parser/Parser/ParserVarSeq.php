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
use Graze\UnicontrollerClient\Entity\Entity\EntityVarSeq;

class ParserVarSeq extends AbstractParser implements ParserInterface
{
    /**
     * @return string
     */
    protected function getPattern()
    {
        return '/^(?<name>[\s\S]+)?,(?<prompt>[\s\S]+)?,(?<length>-?[0-9]+)?,(?<interval>-?[0-9]+)?,(?<inputType>-?[0-9]+)?,(?<outputType>-?[0-9]+)?,(?<minValue>-?[0-9]+)?,(?<maxValue>-?[0-9]+)?,(?<rollOver>-?[0-9]+)?,(?<fixedStart>-?[0-9]+)?,(?<startValue>-?[0-9]+)?,(?<paddingType>-?[0-9]+)?,(?<repeatCount>-?[0-9]+)?,(?<resumeCount>-?[0-9]+)?/';
    }

    /**
     * @return EntityVarSeq
     */
    protected function getEntity()
    {
        return new EntityVarSeq();
    }
}
