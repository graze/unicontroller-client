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
        $properties[] = $this->arraySerialiser->serialise($entity->getLineArray(), 'LineItem');
        $properties[] = $this->arraySerialiser->serialise($entity->getBoxArray(), 'BoxItem');
        $properties[] = $this->arraySerialiser->serialise($entity->getTtfArray(), 'TtfItem');
        $properties[] = $this->arraySerialiser->serialise($entity->getBarcodeArray(), 'BarcodeItem');
        $properties[] = $this->arraySerialiser->serialise($entity->getPictureArray(), 'PictureItem');
        $properties[] = $this->arraySerialiser->serialise($entity->getPromptArray(), 'VarPrompt');
        $properties[] = $this->arraySerialiser->serialise($entity->getSeqArray(), 'VarSeq');
        $properties[] = $this->arraySerialiser->serialise($entity->getRtcArray(), 'VarRtc');
        $properties[] = $this->arraySerialiser->serialise($entity->getDatabaseArray(), 'VarDatabase');
        $properties[] = $this->arraySerialiser->serialise($entity->getUserIdArray(), 'VarUserId');
        $properties[] = $this->arraySerialiser->serialise($entity->getShiftCodeArray(), 'VarShiftCode');
        $properties[] = $this->arraySerialiser->serialise($entity->getMachineIdArray(), 'VarMachineId');
        $properties[] = $this->arraySerialiser->serialise($entity->getDatabaseFieldArray(), 'VarDatabaseField');
        $properties[] = $this->arraySerialiser->serialise($entity->getMacroArray(), 'VarMacro');
        $properties[] = $this->arraySerialiser->serialise($entity->getMacroOutputArray(), 'VarMacroOutput');
        $properties[] = $this->arraySerialiser->serialise($entity->getSerialVarArray(), 'VarSerial');
        $properties[] = $this->arraySerialiser->serialise($entity->getSettingsArray(), 'SettingsById');

        return implode(',', $properties);
    }
}
