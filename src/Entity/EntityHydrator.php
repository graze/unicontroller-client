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
namespace Graze\UnicontrollerClient\Entity;

use Graze\UnicontrollerClient\Entity\Entity\EntityInterface;

class EntityHydrator
{
    /**
     * @param EntityInterface $entity
     * @param array $data
     * @return EntityInterface
     */
    public function hydrate(EntityInterface $entity, array $data)
    {
        $hydrator = function ($data) {
            foreach ($data as $property => $value) {
                if (!property_exists($this, $property)) {
                    continue;
                }
                $this->$property = $value;
            }
        };

        $hydrator = $hydrator->bindTo($entity, $entity);
        $hydrator($data);

        return $entity;
    }
}
