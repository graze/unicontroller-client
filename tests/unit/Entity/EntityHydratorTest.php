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
use Graze\UnicontrollerClient\Entity\EntityHydrator;
use Graze\UnicontrollerClient\Entity\Entity\EntityInterface;

class EntityHydratorTest extends \PHPUnit_Framework_TestCase
{
    public function testHydrate()
    {
        $entity = m::mock(EntityInterface::class);
        $entity->property1 = 'not hydrated';

        $hydrator = new EntityHydrator();
        $entity = $hydrator->hydrate($entity, ['property1' => 'hydrated']);

        $this->assertInstanceOf(EntityInterface::class, $entity);
        $this->assertEquals('hydrated', $entity->property1);
    }
}
