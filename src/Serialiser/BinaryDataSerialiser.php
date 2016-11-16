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
namespace Graze\UnicontrollerClient\Serialiser;

class BinaryDataSerialiser
{
    /**
     * @param string $binaryData
     * @return string
     */
    public function serialise($binaryData)
    {
        return sprintf(
            "BinaryData,%d,\r\n%s\r\nBinaryEnd",
            strlen($binaryData), // this is returning the number of bytes, but I think they want chars.
            $binaryData
        );
    }
}
