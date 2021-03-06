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

use Graze\UnicontrollerClient\Serialiser\SerialiserResolver;

class ArraySerialiser
{
    /**
     * @var SerialiserResolver
     */
    private $serialiserResolver;

    /**
     * @param SerialiserResolver $serialiserResolver
     */
    public function __construct(SerialiserResolver $serialiserResolver)
    {
        $this->serialiserResolver = $serialiserResolver;
    }

    /**
     * @param array $entities
     * @param string $itemName
     * @return string
     */
    public function serialise(array $entities, $itemName)
    {
        $entitiesSerialised = $this->serialiseEntities($entities);
        return sprintf(
            "\x02%s\x03,%d,\r\n%s",
            $itemName,
            count($entities),
            $entitiesSerialised
        );
    }

    /**
     * @param array $entities
     * @return string
     */
    private function serialiseEntities(array $entities)
    {
        if (count($entities) == 0) {
            return '';
        }

        $serialiser = $this->serialiserResolver->resolve(reset($entities));

        $serialised = [];
        foreach ($entities as $entity) {
            $serialised[] = sprintf("\t%s", $serialiser->serialise($entity));
        }

        return sprintf("%s\r\n", implode("\r\n", $serialised));
    }

    /**
     * @return ArraySerialiser
     */
    public static function factory()
    {
        return new static(
            new SerialiserResolver()
        );
    }
}
