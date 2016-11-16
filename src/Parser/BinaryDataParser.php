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
namespace Graze\UnicontrollerClient\Parser;

use Graze\UnicontrollerClient\Parser\Parser\ParserInterface;

class BinaryDataParser
{
    /**
     * @param string $string
     * @return string
     */
    public function parse($string)
    {
        list(, $length, $binaryData) = explode(',', $string, 3);
        $binaryData = substr($binaryData, 0, -10); // remove 'BinaryEnd,'
        return trim($binaryData, "\r\n");
    }
}
