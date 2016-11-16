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

use Graze\UnicontrollerClient\StringEscaper;

class StringEscaperTest extends \PHPUnit_Framework_TestCase
{
    public function testEscape()
    {
        $stringEscaper = new StringEscaper();
        $this->assertEquals("\x02this is a test\x03", $stringEscaper->escape('this is a test'));
    }
}
