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

class CommandSerialiser
{
    /**
     * @param string $command
     * @param string $argumentsSerialised
     * @return string
     */
    public function serialiseCommand($command, $argumentsSerialised)
    {
        return sprintf(
            "%c%s=%s%c\r\n",
            ControlCharacters::SOH,
            $command,
            $argumentsSerialised,
            ControlCharacters::ETB
        );
    }

    /**
     * @param array $arguments
     * @return string
     */
    public function serialiseArguments(array $arguments)
    {
        // escape strings
        array_walk($arguments, function (&$value) {
            if (is_numeric($value)) {
                return;
            }
            $value = sprintf('%c%s%c', ControlCharacters::STX, $value, ControlCharacters::ETX);
        });

        return implode(',', $arguments);
    }
}
