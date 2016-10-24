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

class ArraySerialiser
{
    /**
     * @var SerialiserResolver
     */
    protected $serialiserResolver;

    /**
     * @param SerialiserResolver $serialiserResolver
     */
    public function __construct(SerialiserResolver $serialiserResolver)
    {
        $this->serialiserResolver = $serialiserResolver;
    }

    /**
     * @param array $entities
     * @return string
     */
    public function serialise(array $entities)
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
