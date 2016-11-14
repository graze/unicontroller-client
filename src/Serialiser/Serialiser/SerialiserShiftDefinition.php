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

use Graze\UnicontrollerClient\Serialiser\Serialiser\AbstractSerialiser;
use Graze\UnicontrollerClient\Serialiser\Serialiser\SerialiserInterface;
use Graze\UnicontrollerClient\Entity\Entity\EntityInterface;

class SerialiserShiftDefinition extends AbstractSerialiser implements SerialiserInterface
{
    /**
     * @param EntityInterface $entity
     * @return string
     */
    public function serialise(EntityInterface $entity)
    {
        $properties = [];
        $properties[] = $this->stringEscaper->escape($entity->getFromDay());
        $properties[] = $entity->getFromHour();
        $properties[] = $entity->getFromMinutte();
        $properties[] = $this->stringEscaper->escape($entity->getToDay());
        $properties[] = $entity->getToHour();
        $properties[] = $entity->getToMinutte();
        $properties[] = $this->stringEscaper->escape($entity->getShiftText());
        $properties[] = $entity->getFromDay2();
        $properties[] = $entity->getToDay2();
        $properties[] = $this->stringEscaper->escape($entity->getFrom());
        $properties[] = $this->stringEscaper->escape($entity->getTo());

        return implode(',', $properties);
    }
}
