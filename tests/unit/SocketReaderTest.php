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
use Socket\Raw\Socket;
use Graze\UnicontrollerClient\SocketReader;

class SocketReaderTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @dataProvider readDataProvider
     *
     * @param array $stream
     * @param string $expected
     */
    public function testRead(array $stream, $expected)
    {
        $socket = m::mock(Socket::class)
            ->shouldReceive('read')
            ->times(count($stream));

        call_user_func_array([$socket, 'andReturn'], $stream);
        $socket = $socket->getMock();

        $socketReader = new SocketReader();
        $response = $socketReader->read($socket);

        $this->assertEquals($expected, $response);
    }

    /**
     * @return array
     */
    public function readDataProvider()
    {
        return [
            [
                ["\x01", 't', 'e', 's', 't', 'i', 'n', 'g', ' ', '1', "\x17"],
                'testing 1'
            ],
            [
                ['t', 'e', 's', 't', 'i', 'n', 'g', ' ', '2', "\n"],
                "testing 2\n"
            ]
        ];
    }
}
