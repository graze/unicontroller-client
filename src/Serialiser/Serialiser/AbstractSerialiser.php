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
namespace Graze\UnicontrollerClient\Serialiser\Serialiser;

use Graze\UnicontrollerClient\Serialiser\SerialiserResolver;
use Graze\UnicontrollerClient\StringEscaper;
use Graze\UnicontrollerClient\Serialiser\ArraySerialiser;

abstract class AbstractSerialiser
{
    /**
     * @var StringEscaper
     */
    protected $stringEscaper;

    /**
     * @var ArraySerialiser
     */
    protected $arraySerialiser;

    /**
     * @param StringEscaper $stringEscaper
     * @param ArraySerialiser $arraySerialiser
     */
    public function __construct(
        StringEscaper $stringEscaper,
        ArraySerialiser $arraySerialiser
    ) {
        $this->stringEscaper = $stringEscaper;
        $this->arraySerialiser = $arraySerialiser;
    }

    /**
     * @param array $entities
     * @param string $itemName
     * @return string
     */
    protected function serialiseArray(array $entities, $itemName)
    {
        $arrayData = $this->arraySerialiser->serialise($entities);
        return sprintf(
            "%s%s%s,%d,\r\n%s",
            "\x02",
            $itemName,
            "\x03",
            count($entities),
            $arrayData
        );
    }

    /**
     * @return AbstractParser
     */
    public static function factory()
    {
        return new static(
            new StringEscaper(),
            ArraySerialiser::factory()
        );
    }
}
