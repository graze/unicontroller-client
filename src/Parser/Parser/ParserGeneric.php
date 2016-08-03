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
namespace Graze\UnicontrollerClient\Parser\Parser;

use Graze\UnicontrollerClient\Parser\Parser\ParserInterface;
use Graze\UnicontrollerClient\Entity\EntityHydrator;
use Graze\UnicontrollerClient\Entity\Entity\EntityGeneric;

class ParserGeneric implements ParserInterface
{
    /**
     * @var EntityHydrator
     */
    private $entityHydrator;

    /**
     * @param EntityHydrator $entityHydrator
     */
    public function __construct(EntityHydrator $entityHydrator)
    {
        $this->entityHydrator = $entityHydrator;
    }

    /**
     * @param string $string
     * @return Graze\UnicontrollerClient\Entity\Entity\EntityInterface
     */
    public function parse($string)
    {
        return $this->entityHydrator->hydrate(
            new EntityGeneric(),
            ['success' => $string == "\r\n"]
        );
    }

    /**
     * @return ParserGeneric
     */
    public static function factory()
    {
        return new static(
            new EntityHydrator()
        );
    }
}
