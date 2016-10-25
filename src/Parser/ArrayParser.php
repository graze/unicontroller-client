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
namespace Graze\UnicontrollerClient\Parser;

use Graze\UnicontrollerClient\Parser\Parser\ParserInterface;

class ArrayParser
{
    /**
     * @var ParserResolver
     */
    private $parserResolver;

    /**
     * @param ParserResolver $parserResolver
     */
    public function __construct(ParserResolver $parserResolver)
    {
        $this->parserResolver = $parserResolver;
    }

    /**
     * @param string $string
     * @return Graze\UnicontrollerClient\Entity\Entity\EntityInterface[]
     */
    public function parse($string)
    {
        list($name, $length, $items) = explode(',', $string, 3);

        if ($length == 0) {
            return [];
        }

        // all the trimmings
        $name = trim($name, "\x02\x03");
        $items = trim($items, "\r\n\t,");

        $parser = $this->parserResolver->resolve($name);
        $array = explode("\r\n\t", $items);

        $entities = [];
        foreach ($array as $item) {
            $entities[] = $parser->parse($item);
        }

        return $entities;
    }

    /**
     * @return ArrayParser
     */
    public static function factory()
    {
        return new static(
            new ParserResolver()
        );
    }
}
