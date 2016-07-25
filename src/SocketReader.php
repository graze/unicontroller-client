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

use Graze\UnicontrollerClient\Parser\PreParser;
use Socket\Raw\Socket;
use Graze\UnicontrollerClient\ControlCharacters;

class SocketReader
{
    /**
     * @var PreParser
     */
    protected $preParser;

    /**
     * @param PreParser $preParser
     */
    public function __construct(PreParser $preParser)
    {
        $this->preParser = $preParser;
    }

    /**
     * @param Socket $socket
     * @return string
     */
    public function read(Socket $socket)
    {
        $characterSoh = chr(ControlCharacters::SOH);
        $characterEtb = null;
        $requiresPreParsing = false;
        $response = '';
        while (true) {
            $character = $socket->read(1);

            // the character we terminate on depends on the first character in the response
            if (!isset($characterEtb)) {
                if ($character == $characterSoh) {
                    $requiresPreParsing = true;
                    $characterEtb = chr(ControlCharacters::ETB);
                } else {
                    $characterEtb = "\n";
                }
            }

            $response .= $character;
            if ($character == $characterEtb) {
                break;
            }
        }

        if ($requiresPreParsing) {
            $response = $this->preParser->parse($response);
        }

        return $response;
    }

    /**
     * @return SocketReader
     */
    public static function factory()
    {
        return new static(
            new PreParser()
        );
    }
}
