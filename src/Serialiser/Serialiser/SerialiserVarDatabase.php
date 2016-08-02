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

class SerialiserVarDatabase extends AbstractSerialiser implements SerialiserInterface
{
    /**
     * @param EntityInterface $entity
     * @return string
     */
    public function serialise(EntityInterface $entity)
    {
        $properties = [];
        $properties[] = $this->stringEscaper->escape($entity->getName());
        $properties[] = $this->stringEscaper->escape($entity->getDataSource());
        $properties[] = $this->stringEscaper->escape($entity->getRefFileName());
        $properties[] = $this->stringEscaper->escape($entity->getTable());
        $properties[] = $this->stringEscaper->escape($entity->getKeyField());
        $properties[] = $this->stringEscaper->escape($entity->getDataField());
        $properties[] = $this->stringEscaper->escape($entity->getPrompt());
        $properties[] = $entity->getDisplayLength();
        $properties[] = $entity->getTrimTrailingSpaces();
        $properties[] = $entity->getPrintAll();
        $properties[] = $entity->getFixedKey();
        $properties[] = $entity->getSingleData();
        $properties[] = $entity->getUsePrompt();
        $properties[] = $this->stringEscaper->escape($entity->getKeyData());
        $properties[] = $this->stringEscaper->escape($entity->getFixedKeyData());
        $properties[] = $this->stringEscaper->escape($entity->getCodePage());
        $properties[] = $entity->getNumberOfDecimals();
        $properties[] = $entity->getRunSequence();
        $properties[] = $entity->getActionWhenDone();
        $properties[] = $entity->getrawBaseData();
        $properties[] = $entity->getDatabaseType();
        $properties[] = $entity->getcPadding();

        return implode(',', $properties);
    }
}
