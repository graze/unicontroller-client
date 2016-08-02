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

abstract class AbstractParser implements ParserInterface
{
    /**
     * @var EntityHydrator
     */
    private $entityHydrator;

    /**
     * @var ArrayParser
     */
    private $arrayParser;

    /**
     * @var []
     */
    private $tokenToMethod = [
        "\x02" => 'stringStart',
        "\x03" => 'stringEnd',
        "BinaryData" => 'stringStart',
        "BinaryEnd" => 'stringEnd',
        "\r\n" => 'handleCarriageReturn',
        "\x02LineItem\x03" => 'arrayStart',
        "\x02BoxItem\x03" => 'arrayStart',
        "\x02TtfItem\x03" => 'arrayStart',
        "\x02BarcodeItem\x03" => 'arrayStart',
        "\x02PictureItem\x03" => 'arrayStart',
        "\x02VarPrompt\x03" => 'arrayStart',
        "\x02VarSeq\x03" => 'arrayStart',
        "\x02VarRtc\x03" => 'arrayStart',
        "\x02VarDatabase\x03" => 'arrayStart',
        "\x02VarUserId\x03" => 'arrayStart',
        "\x02VarShiftCode\x03" => 'arrayStart',
        "\x02VarMachineId\x03" => 'arrayStart',
        "\x02VarDatabaseField\x03" => 'arrayStart',
        "\x02VarMacro\x03" => 'arrayStart',
        "\x02VarMacroOutput\x03" => 'arrayStart',
        "\x02VarSerial\x03" => 'arrayStart',
        "\x02SettingsById\x03" => 'arrayStart'
    ];

    /**
     * @var bool
     */
    private $isString = false;

    /**
     * @var bool
     */
    private $isArray = false;

    /**
     * @var int
     */
    private $arrayLength;

    /**
     * @var string
     */
    private $arrayItemCurrent;

    /**
     * @var int
     */
    private $arrayItemsRemaining;

    /**
     * @var int
     */
    private $pointer;

    /**
     * @var string
     */
    private $buffer = '';

    /**
     * @var int
     */
    private $propertyIndex = 0;

    /**
     * @var []
     */
    private $propertyValues = [];

    /**
     * @param EntityHydrator $entityHydrator
     * @param ArrayParser $arrayParser
     */
    public function __construct(EntityHydrator $entityHydrator, ArrayParser $arrayParser)
    {
        $this->entityHydrator = $entityHydrator;
        $this->arrayParser = $arrayParser;
    }

    private function stringStart()
    {
        $this->isString = true;
    }

    private function stringEnd()
    {
        $this->isString = false;
    }

    private function arrayStart()
    {
        $this->isArray = true;
        $this->arrayItemCurrent = $this->buffer;
        $this->buffer = '';
        $this->pointer++; // skip  next comma to the array length
    }

    /**
     * @return bool
     */
    private function handleComma()
    {
        if ($this->isString) {
            return false;
        }

        if ($this->isArray && is_null($this->arrayItemsRemaining)) {
            // just entered an array
            $this->arrayLength = $this->buffer;
            $this->arrayItemsRemaining = $this->arrayLength;
            $this->pointer += 2; // skip initial carriage return
            $this->buffer = '';
            return true;
        }

        if (!$this->isArray || $this->arrayItemsRemaining == 0) {
            $this->flushBuffer();
            return true;
        }

        return false;
    }

    private function handleCarriageReturn()
    {
        if (!$this->isArray || $this->isString) {
            return;
        }

        if ($this->arrayItemsRemaining == 0) {
            // end of array
            return;
        }

        $this->arrayItemsRemaining--;
    }

    private function flushBuffer()
    {
        if ($this->isArray) {
            $arrayItemCurrentTrimmed = trim($this->arrayItemCurrent, "\x02\x03");
            $bufferTrimmed = trim($this->buffer, "\r\n\t");
            $propertyValue = $this->arrayParser->parse($arrayItemCurrentTrimmed, $bufferTrimmed);

            $this->isArray = false;
            $this->arrayLength = 0;
            $this->arrayItemCurrent = null;
            $this->arrayItemsRemaining = null;
        } else {
            $propertyValue = trim($this->buffer, "\x02\x03");
        }

        $this->propertyValues[$this->propertyIndex] = $propertyValue;
        $this->buffer = '';
        $this->propertyIndex++;
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
     * @param string $string
     * @return []
     */
    public function parse($string)
    {
        $string = trim($string, "\x01\x17");

        $strlen = strlen($string);
        for ($this->pointer = 0; $this->pointer < $strlen; $this->pointer++) {
            $character = $string[$this->pointer];

            if ($character == ',') {
                $isHandled = $this->handleComma();
                if ($isHandled) {
                    continue;
                }
            }

            $this->buffer .= $character;

            foreach ($this->tokenToMethod as $token => $method) {
                $tokenLength = strlen($token);
                $subject = substr($this->buffer, $tokenLength * -1);
                if ($subject == $token) {
                    $this->$method();
                }
            }
        }

        $this->flushBuffer();
        $data = array_combine($this->getProperties(), $this->propertyValues);
        $entity = $this->entityHydrator->hydrate($this->getEntity(), $data);
        $this->propertyValues = [];

        return $entity;
    }

    /**
     * @return ParserInterface
     */
    public static function factory()
    {
        return new static(
            new EntityHydrator(),
            ArrayParser::factory()
        );
    }
}
