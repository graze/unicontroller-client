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
namespace Graze\UnicontrollerClient\Serialiser;

use Graze\UnicontrollerClient\Entity\Entity\EntityInterface;

class SerialiserResolver
{
    /**
     * @param EntityInterface $entity
     * @return Graze\UnicontrollerClient\Serialiser\Serialiser\SerialiserInterface
     */
    public function resolve(EntityInterface $entity)
    {
        $nameEntity = get_class($entity);
        $nameEntityShort = substr($nameEntity, strrpos($nameEntity, 'Entity') + 6);

        $serialiserName = sprintf('Graze\\UnicontrollerClient\\Serialiser\\Serialiser\\Serialiser%s', $nameEntityShort);
        if (!class_exists($serialiserName)) {
            throw new \OutOfBoundsException(sprintf('no serialiser defined for entity [%s]', $nameEntity));
        }

        return $serialiserName::factory();
    }
}
