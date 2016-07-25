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
use Graze\UnicontrollerClient\Parser\ArrayParser;

abstract class AbstractParser implements ParserInterface
{
    /**
     * @var EntityHydrator
     */
    protected $entityHydrator;

    /**
     * @var ArrayParser
     */
    protected $arrayParser;

    /**
     * @param EntityHydrator $entityHydrator
     * @param ArrayParser $arrayParser
     */
    public function __construct(EntityHydrator $entityHydrator, ArrayParser $arrayParser)
    {
        $this->entityHydrator = $entityHydrator;
        $this->arrayParser = $arrayParser;
    }

    /**
     * @return string
     */
    abstract protected function getPattern();

    /**
     * @return Graze\UnicontrollerClient\Entity\Entity\EntityInterface
     */
    abstract protected function getEntity();

    /**
     * @param string $response
     * @return Graze\UnicontrollerClient\Entity\Entity\EntityInterface
     */
    public function parse($response)
    {
        $pattern = $this->getPattern();
        $matches = [];
        preg_match($pattern, $response, $matches);

        // parse arrays
        foreach ($matches as $name => $match) {
            if (is_numeric($name)) {
                continue;
            }

            if (stripos($name, 'Array') === false) {
                continue;
            }

            $matches[$name] = $this->arrayParser->parse($match);
        }

        $entity = $this->getEntity();
        $this->entityHydrator->hydrate($entity, $matches);

        return $entity;
    }

    /**
     * @return ParserInterface
     */
    public static function factory()
    {
        return new static(
            new EntityHydrator(),
            ArrayParser::factory()
        );
    }
}
