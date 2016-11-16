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

namespace Graze\UniControllerClient\Test\Unit;

use Mockery as m;
use Graze\UnicontrollerClient\Entity\Entity\EntityInterface;
use Graze\UnicontrollerClient\Parser\Parser\ParserInterface;
use Graze\UnicontrollerClient\Parser\ParserResolver;
use Graze\UnicontrollerClient\Parser\ArrayParser;

class ArrayParserTest extends \PHPUnit_Framework_TestCase
{
    public function testParse()
    {
        $entity = m::mock(EntityInterface::class);
        $entityParser = m::mock(ParserInterface::class)
            ->shouldReceive('parse')
            ->with('serialised')
            ->andReturn($entity)
            ->times(3)
            ->getMock();
        $parserResolver = m::mock(ParserResolver::class)
            ->shouldReceive('resolve')
            ->with('ArrayName')
            ->andReturn($entityParser)
            ->once()
            ->getMock();
        $parser = new ArrayParser($parserResolver);

        $parsed = $parser->parse("\x02ArrayName\x03,3,\r\n\tserialised\r\n\tserialised\r\n\tserialised\r\n");
        $this->assertEquals([$entity, $entity, $entity], $parsed);
    }
}
