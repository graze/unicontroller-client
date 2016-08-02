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
namespace Graze\UnicontrollerClient;

use Graze\UnicontrollerClient\ControlCharacters;

class StringEscaper
{
    /**
     * @param string $string
     * @return string
     */
    public function escape($string)
    {
        return sprintf('%c%s%c', ControlCharacters::STX, $string, ControlCharacters::ETX);
    }
}