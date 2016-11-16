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
use Graze\UnicontrollerClient\Serialiser\BinaryDataSerialiser;

class BinaryDataSerialiserTest extends \PHPUnit_Framework_TestCase
{
    public function testSerialise()
    {
        $serialiser = new BinaryDataSerialiser();
        $serialised = $serialiser->serialise('this is binary data');
        $this->assertEquals("BinaryData,19,\r\nthis is binary data\r\nBinaryEnd", $serialised);
    }
}
