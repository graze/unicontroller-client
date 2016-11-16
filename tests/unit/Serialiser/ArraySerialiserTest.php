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
use Graze\UnicontrollerClient\Serialiser\Serialiser\SerialiserInterface;
use Graze\UnicontrollerClient\Serialiser\SerialiserResolver;
use Graze\UnicontrollerClient\Serialiser\ArraySerialiser;

class ArraySerialiserTest extends \PHPUnit_Framework_TestCase
{
    public function testSerialise()
    {
        $entity = m::mock(EntityInterface::class);
        $entitySerialiser = m::mock(SerialiserInterface::class)
            ->shouldReceive('serialise')
            ->with($entity)
            ->andReturn('serialised')
            ->times(3)
            ->getMock();
        $serialiserResolver = m::mock(SerialiserResolver::class)
            ->shouldReceive('resolve')
            ->with($entity)
            ->andReturn($entitySerialiser)
            ->once()
            ->getMock();
        $arraySerialiser = new ArraySerialiser($serialiserResolver);

        $arraySerialised = $arraySerialiser->serialise([$entity, $entity, $entity], 'ItemName');
        $this->assertEquals(
            "\x02ItemName\x03,3,\r\n\tserialised\r\n\tserialised\r\n\tserialised\r\n",
            $arraySerialised
        );
    }
}
