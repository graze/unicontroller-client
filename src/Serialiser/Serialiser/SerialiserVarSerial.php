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

class SerialiserVarSerial extends AbstractSerialiser implements SerialiserInterface
{
    /**
     * @param EntityInterface $entity
     * @return string
     */
    public function serialise(EntityInterface $entity)
    {
        $properties = [];
        $properties[] = $this->stringEscaper->escape($entity->getName());
        $properties[] = $entity->getUpdate();
        $properties[] = $entity->getUseDefault();
        $properties[] = $this->stringEscaper->escape($entity->getDefaultText());
        $properties[] = $entity->getBufferSize();
        $properties[] = $this->stringEscaper->escape($entity->getInputDefinition());
        $properties[] = $entity->getcPadding();
        $properties[] = $entity->getLength();

        return implode(',', $properties);
    }
}
