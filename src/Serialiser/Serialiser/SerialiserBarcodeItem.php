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

class SerialiserBarcodeItem extends AbstractSerialiser implements SerialiserInterface
{
    /**
     * @param EntityInterface $entity
     * @return string
     */
    public function serialise(EntityInterface $entity)
    {
        $properties = [];
        $properties[] = $entity->getAnchorPoint();
        $properties[] = $entity->getXPos();
        $properties[] = $entity->getYPos();
        $properties[] = $entity->getHeight();
        $properties[] = $entity->getOrion();
        $properties[] = $this->stringEscaper->escape($entity->getDescription());
        $properties[] = $entity->getNarrow();
        $properties[] = $entity->getInverted();
        $properties[] = $entity->getBarcodeType();
        $properties[] = $this->stringEscaper->escape($entity->getData());
        $properties[] = $entity->getHumanReadable();
        $properties[] = $entity->getRatio();
        $properties[] = $entity->getFrame();
        $properties[] = $entity->getShowDropDowns();
        $properties[] = $this->stringEscaper->escape($entity->getFontName());
        $properties[] = $entity->getPointSize();
        $properties[] = $entity->getBold();
        $properties[] = $entity->getItalic();
        $properties[] = $entity->getSubType();
        $properties[] = $entity->getPreferredFormat();
        $properties[] = $entity->getProcessTilde();
        $properties[] = $entity->getSeparatorHeight();
        $properties[] = $entity->getSegmentWidth();
        $properties[] = $entity->getUseHibc();
        $properties[] = $entity->getPhantomField();

        return implode(',', $properties);
    }
}
