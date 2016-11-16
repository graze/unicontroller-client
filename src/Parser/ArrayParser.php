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

use Graze\UnicontrollerClient\Parser\ParserResolver;
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
     * @param string $name
     * @param int $length
     * @param string $string
     * @return Graze\UnicontrollerClient\Entity\Entity\EntityInterface[]
     */
    public function parse($name, $length, $string)
    {
        if ($length == 0) {
            return [];
        }

        $string = trim($string, "\r\n\t,");
        $array = explode("\r\n\t", $string);

        $parser = $this->parserResolver->resolve($name);

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
