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

use Graze\UnicontrollerClient\StringEscaper;

class CommandSerialiser
{
    /**
     * @var StringEscaper
     */
    private $stringEscaper;

    /**
     * @param StringEscaper $stringEscaper
     */
    public function __construct(StringEscaper $stringEscaper)
    {
        $this->stringEscaper = $stringEscaper;
    }
    /**
     * @param string $command
     * @param string $argumentsSerialised
     * @return string
     */
    public function serialiseCommand($command, $argumentsSerialised)
    {
        return sprintf(
            "\x01%s=%s\x17\r\n",
            $command,
            $argumentsSerialised
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
            if (!is_numeric($value)) {
                $value = $this->stringEscaper->escape($value);
            }
        });

        return implode(',', $arguments);
    }

    /**
     * @return CommandSerialiser
     */
    public static function factory()
    {
        return new static(
            new StringEscaper()
        );
    }
}
