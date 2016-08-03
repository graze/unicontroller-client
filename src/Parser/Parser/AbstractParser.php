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
namespace Graze\UnicontrollerClient\Parser\Parser;

use Graze\UnicontrollerClient\Parser\Parser\ParserInterface;
use Graze\UnicontrollerClient\Entity\EntityHydrator;
use Graze\UnicontrollerClient\Parser\ArrayParser;
use Graze\UnicontrollerClient\Parser\BinaryParser;

abstract class AbstractParser implements ParserInterface
{
    const CONTEXT_NONE = 1;
    const CONTEXT_ANSWER = 2;
    const CONTEXT_FLUSH = 3;
    const CONTEXT_STRING = 4;
    const CONTEXT_ARRAY = 5;
    const CONTEXT_BINARY = 6;

    /**
     * @var EntityHydrator
     */
    private $entityHydrator;

    /**
     * @var ArrayParser
     */
    private $arrayParser;

    /**
     * @var BinaryParser
     */
    private $binaryParser;

    /**
     * @var []
     */
    private $contextCurrentToTokenToContextNew = [
        self::CONTEXT_NONE => [
            '=' => self::CONTEXT_ANSWER,
            ',' => self::CONTEXT_FLUSH,
            "\x02" => self::CONTEXT_STRING,
            'BinaryData' => self::CONTEXT_BINARY,
        ],
        self::CONTEXT_STRING => [
            "\x03" => self::CONTEXT_NONE,
            "\x02LineItem\x03" => self::CONTEXT_ARRAY,
            "\x02BoxItem\x03" => self::CONTEXT_ARRAY,
            "\x02TtfItem\x03" => self::CONTEXT_ARRAY,
            "\x02BarcodeItem\x03" => self::CONTEXT_ARRAY,
            "\x02PictureItem\x03" => self::CONTEXT_ARRAY,
            "\x02VarPrompt\x03" => self::CONTEXT_ARRAY,
            "\x02VarSeq\x03" => self::CONTEXT_ARRAY,
            "\x02VarRtc\x03" => self::CONTEXT_ARRAY,
            "\x02VarDatabase\x03" => self::CONTEXT_ARRAY,
            "\x02VarUserId\x03" => self::CONTEXT_ARRAY,
            "\x02VarShiftCode\x03" => self::CONTEXT_ARRAY,
            "\x02VarMachineId\x03" => self::CONTEXT_ARRAY,
            "\x02VarDatabaseField\x03" => self::CONTEXT_ARRAY,
            "\x02VarMacro\x03" => self::CONTEXT_ARRAY,
            "\x02VarMacroOutput\x03" => self::CONTEXT_ARRAY,
            "\x02VarSerial\x03" => self::CONTEXT_ARRAY,
            "\x02SettingsById\x03" => self::CONTEXT_ARRAY,
        ],
        self::CONTEXT_ARRAY => [
            "\x02" => self::CONTEXT_STRING,
            'BinaryData' => self::CONTEXT_BINARY,
            "\r\n," => self::CONTEXT_NONE,
        ],
        self::CONTEXT_BINARY => [
            'BinaryEnd' => self::CONTEXT_NONE,
        ],
    ];

    /**
     * @var []
     */
    private $context = [
        self::CONTEXT_NONE
    ];

    /**
     * @var string
     */
    private $contextPrevious;

    /**
     * @var string
     */
    private $buffer = '';

    /**
     * @var []
     */
    private $propertyValues = [];

    /**
     * @param EntityHydrator $entityHydrator
     * @param ArrayParser $arrayParser
     * @param BinaryParser $binaryParser
     */
    public function __construct(EntityHydrator $entityHydrator, ArrayParser $arrayParser, BinaryParser $binaryParser)
    {
        $this->entityHydrator = $entityHydrator;
        $this->arrayParser = $arrayParser;
        $this->binaryParser = $binaryParser;
    }

    /**
     * @param string $string
     * @return []
     */
    public function parse($string)
    {
        for ($pointer = 0; $pointer < strlen($string); $pointer++) {
            $character = $string[$pointer];

            $tokenToContextNew = $this->contextCurrentToTokenToContextNew[$this->getContext()];
            foreach ($tokenToContextNew as $token => $contextNew) {
                $tokenLength = strlen($token);
                $subject = substr($this->buffer, $tokenLength * -1);
                if ($subject != $token) {
                    continue;
                }

                $this->changeContext($contextNew);
            }

            $this->buffer .= $character;
        }

        if ($this->contextPrevious != self::CONTEXT_ARRAY) {
            // flush the buffer unless we were in an array - this would have been explicitly flushed
            $this->flushBuffer();
        }

        $data = array_combine($this->getProperties(), $this->propertyValues);
        $this->propertyValues = [];

        return $this->entityHydrator->hydrate($this->getEntity(), $data);
    }

    /**
     * @return string
     */
    private function getContext()
    {
        return end($this->context);
    }

    /**
     * @param string $context
     */
    private function changeContext($context)
    {
        if ($context == self::CONTEXT_ANSWER) {
            $this->buffer = ''; // remove 'answerName='
            return;
        }

        if ($context == self::CONTEXT_FLUSH) {
            $this->flushBuffer();
            $this->contextPrevious = self::CONTEXT_NONE;
            return;
        }

        if ($context != self::CONTEXT_NONE) {
            // enter new context
            $this->context[] = $context;
            return;
        }

        // exit current context
        $this->contextPrevious = array_pop($this->context);

        // have to manually flush buffer for this transition as comma is part of exit token
        if ($this->contextPrevious == self::CONTEXT_ARRAY) {
            $this->flushBuffer();
        }
    }

    private function flushBuffer()
    {
        switch ($this->contextPrevious) {
            case self::CONTEXT_ARRAY:
                $propertyValue = $this->arrayParser->parse($this->buffer);
                break;

            case self::CONTEXT_BINARY:
                if ($this->getContext() != self::CONTEXT_NONE) {
                    break;
                }

                $propertyValue = $this->binaryParser->parse($this->buffer);
                break;

            default:
                $propertyValue = trim($this->buffer, "\x02\x03,");
        }

        $this->propertyValues[] = $propertyValue;
        $this->buffer = '';
    }

    /**
     * @return array
     */
    abstract protected function getProperties();

    /**
     * @return Graze\UnicontrollerClient\Entity\Entity\EntityInterface
     */
    abstract protected function getEntity();

    /**
     * @return ParserInterface
     */
    public static function factory()
    {
        return new static(
            new EntityHydrator(),
            ArrayParser::factory(),
            new BinaryParser()
        );
    }
}
