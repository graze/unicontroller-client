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
    protected $parserResolver;

    /**
     * @param ParserResolver $parserResolver
     */
    public function __construct(ParserResolver $parserResolver)
    {
        $this->parserResolver = $parserResolver;
    }

    /**
     * @param string $response
     * @return Graze\UnicontrollerClient\Entity\Entity\EntityInterface[]
     */
    public function parse($response)
    {
        // get item name and count
        $pattern = '/^(?<name>[a-z]+),(?<count>[0-9]+),/i';
        $matches = [];
        preg_match($pattern, $response, $matches);

        if ($matches['count'] == 0) {
            return [];
        }

        // remove item name and count
        $response = preg_replace($pattern, '', $response);

        $parser = $this->parserResolver->resolve($matches['name']);

        $array = explode("\t", $response);
        array_shift($array);

        $entities = [];
        foreach ($array as $element) {
            $entities[] = $parser->parse($element);
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
