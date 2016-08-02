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
            "%s%s=%s%s\r\n",
            "\x01",
            $command,
            $argumentsSerialised,
            "\x17"
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
            $value = sprintf('%s%s%s', "\x02", $value, "\x03");
        });

        return implode(',', $arguments);
    }
}
