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

class SerialiserVarRtc extends AbstractSerialiser implements SerialiserInterface
{
    /**
     * @param EntityInterface $entity
     * @return string
     */
    public function serialise(EntityInterface $entity)
    {
        $properties = [];
        $properties[] = $this->stringEscaper->escape($entity->getName());
        $properties[] = $this->stringEscaper->escape($entity->getFormat());
        $properties[] = $entity->getOffsetType();
        $properties[] = $entity->getOffsetValue();
        $properties[] = $entity->getOffset2Type();
        $properties[] = $entity->getOffset2Value();
        $properties[] = $entity->getTruncateDay();
        $properties[] = $entity->getUpdatePolicy();
        $properties[] = $this->stringEscaper->escape($entity->getUpdateDay());
        $properties[] = $entity->getUpdateHour();
        $properties[] = $entity->getUpdateMinutte();
        $properties[] = $entity->getLanguage();
        $properties[] = $entity->getVariableOffset();
        $properties[] = $this->stringEscaper->escape($entity->getDataSource());
        $properties[] = $entity->getcPadding();
        $properties[] = $entity->getLength();

        return implode(',', $properties);
    }
}
