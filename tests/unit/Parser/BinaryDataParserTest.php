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
use Graze\UnicontrollerClient\Parser\BinaryDataParser;

class BinaryDataParserTest extends \PHPUnit_Framework_TestCase
{
    public function testParse()
    {
        $parser = new BinaryDataParser();
        $binaryData = $parser->parse("BinaryData,19,\r\nthis is binary data\r\nBinaryEnd");
        $this->assertEquals('this is binary data', $binaryData);
    }
}
