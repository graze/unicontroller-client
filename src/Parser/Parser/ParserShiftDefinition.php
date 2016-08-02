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
use Graze\UnicontrollerClient\Entity\Entity\EntityShiftDefinition;

class ParserShiftDefinition extends AbstractParser implements ParserInterface
{
    /**
     * @return []
     */
    protected function getProperties()
    {
        return [
            'fromDay',
            'fromHour',
            'fromMinutte',
            'toDay',
            'toHour',
            'toMinutte',
            'shiftText',
            'fromDay',
            'toDay',
            'from',
            'to'
        ];
    }

    /**
     * @return EntityShiftDefinition
     */
    protected function getEntity()
    {
        return new EntityShiftDefinition();
    }
}
