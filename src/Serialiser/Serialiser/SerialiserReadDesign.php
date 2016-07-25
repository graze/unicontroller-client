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

class SerialiserReadDesign extends AbstractSerialiser implements SerialiserInterface
{
    /**
     * @param EntityInterface $entity
     * @return string
     */
    public function serialise(EntityInterface $entity)
    {
        $properties = [];
        $properties[] = $this->stringEscaper->escape($entity->getName());
        $properties[] = $entity->getHeight();
        $properties[] = $entity->getWidth();
        $properties[] = $entity->getStorageMode();
        $properties[] = $entity->getSaveDesign();
        $properties[] = $entity->getPrintDesign();
        $properties[] = $entity->getDriverId();
        $properties[] = $entity->getPrintCount();
        $properties[] = $entity->getCycleSize();
        $properties[] = $entity->getReadOk();
        $properties[] = $this->serialiseArray($entity->getLineArray(), 'LineItem');
        $properties[] = $this->serialiseArray($entity->getBoxArray(), 'BoxItem');
        $properties[] = $this->serialiseArray($entity->getTtfArray(), 'TtfItem');
        $properties[] = $this->serialiseArray($entity->getBarcodeArray(), 'BarcodeItem');
        $properties[] = $this->serialiseArray($entity->getPictureArray(), 'PictureItem');
        $properties[] = $this->serialiseArray($entity->getPromptArray(), 'VarPrompt');
        $properties[] = $this->serialiseArray($entity->getSeqArray(), 'VarSeq');
        $properties[] = $this->serialiseArray($entity->getRtcArray(), 'VarRtc');
        $properties[] = $this->serialiseArray($entity->getDatabaseArray(), 'VarDatabase');
        $properties[] = $this->serialiseArray($entity->getUserIdArray(), 'VarUserId');
        $properties[] = $this->serialiseArray($entity->getShiftCodeArray(), 'VarShiftCode');
        $properties[] = $this->serialiseArray($entity->getMachineIdArray(), 'VarMachineId');
        $properties[] = $this->serialiseArray($entity->getDatabaseFieldArray(), 'VarDatabaseField');
        $properties[] = $this->serialiseArray($entity->getMacroArray(), 'VarMacro');
        $properties[] = $this->serialiseArray($entity->getMacroOutputArray(), 'VarMacroOutput');
        $properties[] = $this->serialiseArray($entity->getSerialVarArray(), 'VarSerial');
        $properties[] = $this->serialiseArray($entity->getSettingsArray(), 'SettingsById');

        return implode(',', $properties);
    }
}
