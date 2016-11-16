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
use Graze\UnicontrollerClient\Parser\BinaryDataParser;

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
     * @var BinaryDataParser
     */
    private $binaryDataParser;

    /**
     * @var []
     */
     private $contextCurrentToTokensToContextNew = [
         self::CONTEXT_NONE => [
             ',' => self::CONTEXT_FLUSH,
              '=' => self::CONTEXT_ANSWER,
             "\x02" => self::CONTEXT_STRING,
             'BinaryData' => self::CONTEXT_BINARY,
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
             "\x02ShiftDefinition\x03" => self::CONTEXT_ARRAY,
         ],
         self::CONTEXT_STRING => [
             "\x03" => self::CONTEXT_NONE,
         ],
         self::CONTEXT_ARRAY => [
             "\x02" => self::CONTEXT_STRING,
             "\r\n" => self::CONTEXT_NONE,
             'BinaryData' => self::CONTEXT_BINARY,
         ],
         self::CONTEXT_BINARY => [
             'BinaryEnd' => self::CONTEXT_NONE,
         ]
     ];

    /**
     * @var []
     */
    private $contextStack = [
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
     * @var bool
     */
    private $arrayInitialised = false;

    /**
     * @var string
     */
     private $arrayName;

    /**
     * @var int
     */
    private $arrayLength;

    /**
     * @var int
     */
    private $arrayItemCount;

    /**
     * @var []
     */
    private $propertyValues = [];

    /**
     * @param EntityHydrator $entityHydrator
     * @param ArrayParser $arrayParser
     * @param BinaryDataParser $binaryDataParser
     */
    public function __construct(EntityHydrator $entityHydrator, ArrayParser $arrayParser, BinaryDataParser $binaryDataParser)
    {
        $this->entityHydrator = $entityHydrator;
        $this->arrayParser = $arrayParser;
        $this->binaryDataParser = $binaryDataParser;
    }

    /**
     * @param string $string
     * @return []
     */
    public function parse($string)
    {
        for ($pointer = 0; $pointer < strlen($string); $pointer++) {
            $this->buffer .= $string[$pointer];

            while (true) {
                $contextNext = $this->getContextFromToken($this->buffer);
                if (!$contextNext) {
                    // nothing found in the string, move to next character
                    break;
                }

                // we found a token, attempt to change context
                $contextChanged = $this->changeContext($contextNext);
                if (!$contextChanged) {
                    // no change, move to next character
                    break;
                };

                // context has changed, repeat this loop in the new context
            }
        }

        // final flush
        $this->flushBuffer();

        $data = array_combine($this->getProperties(), $this->propertyValues);
        $this->propertyValues = [];

        return $this->entityHydrator->hydrate($this->getEntity(), $data);
    }

    /**
     * @param string $string
     * @return string|bool
     */
    private function getContextFromToken($string)
    {
        $tokensToContextNew = $this->contextCurrentToTokensToContextNew[$this->getContextCurrent()];
        foreach ($tokensToContextNew as $token => $contextNew) {
            $offset = strlen($token) * -1;
            $subject = substr($string, $offset);

            if ($subject != $token) {
                continue;
            }

            return $contextNew;
        }

        return false;
    }

    /**
     * @return string
     */
    private function getContextCurrent()
    {
        return end($this->contextStack);
    }

    /**
     * @param string $context
     * @return bool
     */
    private function changeContext($context)
    {
        if ($context == self::CONTEXT_ANSWER) {
            $this->buffer = ''; // remove 'answerName='
            return false;
        }

        if ($context == self::CONTEXT_FLUSH) {
            $this->flushBuffer();
            $this->contextPrevious = self::CONTEXT_NONE;
            return false;
        }

        if ($context != self::CONTEXT_NONE) {
            // enter new context
            $this->contextStack[] = $context;
            return true;
        }

        if ($this->getContextCurrent() == self::CONTEXT_ARRAY) {
            if (!$this->arrayInitialised) {
                // array not yet initialised
                $this->arrayInit();
            }

            if ($this->arrayItemCount > 0) {
                $this->arrayItemCount--;
                // not enough items, do not leave context yet
                return false;
            }
        }

        // exit current context
        $this->contextPrevious = array_pop($this->contextStack);
        return true;
    }

    private function flushBuffer()
    {
        switch ($this->contextPrevious) {
            case self::CONTEXT_ARRAY:
                $propertyValue = $this->arrayParser->parse($this->arrayName, $this->arrayLength, $this->buffer);
                $this->arrayClear();
                break;

            case self::CONTEXT_BINARY:
                if ($this->getContextCurrent() != self::CONTEXT_NONE) {
                    break;
                }

                $propertyValue = $this->binaryDataParser->parse($this->buffer);
                break;

            default:
                $propertyValue = trim($this->buffer, "\x02\x03,");
        }

        $this->propertyValues[] = $propertyValue;
        $this->buffer = '';
    }

    private function arrayInit()
    {
        list($name, $length) = explode(',', $this->buffer, 2);

        $this->arrayName = trim($name, "\x02\x03");
        $this->arrayLength = trim($length, ",\r\n");
        $this->arrayItemCount = $this->arrayLength;
        $this->arrayInitialised = true;

        $this->buffer = '';
    }

    private function arrayClear()
    {
        $this->arrayName = null;
        $this->arrayLength = 0;
        $this->arrayItemCount = 0;
        $this->arrayInitialised = null;
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
            new BinaryDataParser()
        );
    }
}
