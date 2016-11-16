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

namespace Graze\UniControllerClient\Test\Unit;

use Mockery as m;
use Graze\UnicontrollerClient\StringEscaper;
use Graze\UnicontrollerClient\CommandSerialiser;

class CommandSerialiserTest extends \PHPUnit_Framework_TestCase
{
    public function testSerialiseCommand()
    {
        $stringEscaper = m::mock(StringEscaper::class);
        $commandSerialiser = new CommandSerialiser($stringEscaper);

        $commandSerialised = $commandSerialiser->serialiseCommand('ReadDesign', "1,2,3,\x02Test\x03");
        $this->assertEquals("\x01ReadDesign=1,2,3,\x02Test\x03\x17\r\n", $commandSerialised);
    }

    public function testSerialiseArguments()
    {
        $stringEscaper = m::mock(StringEscaper::class)
            ->shouldReceive('escape')
            ->with('foo')
            ->andReturn('fooescaped')
            ->once()
            ->shouldReceive('escape')
            ->with('bar')
            ->andReturn('barescaped')
            ->once()
            ->getMock();
        $commandSerialiser = new CommandSerialiser($stringEscaper);

        $argumentsSerialised = $commandSerialiser->serialiseArguments([
            12,
            'foo',
            13,
            'bar'
        ]);
        $this->assertEquals("12,fooescaped,13,barescaped", $argumentsSerialised);
    }
}
