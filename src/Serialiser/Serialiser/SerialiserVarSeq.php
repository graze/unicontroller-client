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

class SerialiserVarSeq extends AbstractSerialiser implements SerialiserInterface
{
    /**
     * @param EntityInterface $entity
     * @return string
     */
    public function serialise(EntityInterface $entity)
    {
        $properties = [];
        $properties[] = $this->stringEscaper->escape($entity->getName());
        $properties[] = $this->stringEscaper->escape($entity->getPrompt());
        $properties[] = $entity->getLength();
        $properties[] = $entity->getInterval();
        $properties[] = $entity->getInputType();
        $properties[] = $entity->getOutputType();
        $properties[] = $entity->getMinValue();
        $properties[] = $entity->getMaxValue();
        $properties[] = $entity->getRollOver();
        $properties[] = $entity->getFixedStart();
        $properties[] = $entity->getStartValue();
        $properties[] = $entity->getPaddingType();
        $properties[] = $entity->getRepeatCount();
        $properties[] = $entity->getResumeCount();

        return implode(',', $properties);
    }
}
