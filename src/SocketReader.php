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

use Socket\Raw\Socket;

class SocketReader
{
    /**
     * @param Socket $socket
     * @return string
     */
    public function read(Socket $socket)
    {
        $characterEtb = null;
        $buffer = '';
        while (true) {
            $character = $socket->read(1);

            // the character we terminate on depends on the first character in the response
            if (!isset($characterEtb)) {
                if ($character == "\x01") {
                    $characterEtb = "\x17";
                } else {
                    $characterEtb = "\n";
                }
            }

            $buffer .= $character;
            if ($character == $characterEtb) {
                break;
            }
        }

        return trim($buffer, "\x01\x17");
    }
}
