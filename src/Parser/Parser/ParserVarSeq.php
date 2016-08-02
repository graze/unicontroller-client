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
     * @return []
     */
    protected function getProperties()
    {
        return [
            'name',
            'prompt',
            'length',
            'interval',
            'inputType',
            'outputType',
            'minValue',
            'maxValue',
            'rollOver',
            'fixedStart',
            'startValue',
            'paddingType',
            'repeatCount',
            'resumeCount'
        ];
    }

    /**
     * @return EntityVarSeq
     */
    protected function getEntity()
    {
        return new EntityVarSeq();
    }
}
