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

use Graze\UnicontrollerClient\ControlCharacters;

class PreParser
{
    /**
     * @param string $response
     * @return string
     */
    public function parse($response)
    {
        // remove response name, control characters and new lines
        $pattern = sprintf(
            '/(^%c[a-z]+=|%c|%c|%c|%s)/i',
            ControlCharacters::SOH,
            ControlCharacters::ETB,
            ControlCharacters::STX,
            ControlCharacters::ETX,
            "\r\n"
        );
        return preg_replace($pattern, '', $response);
    }
}
