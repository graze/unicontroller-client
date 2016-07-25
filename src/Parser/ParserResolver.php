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
namespace Graze\UnicontrollerClient\Parser;

class ParserResolver
{
    /**
     * @param string $name
     * @return Graze\UnicontrollerClient\Parser\Parser\ParserInterface
     */
    public function resolve($name)
    {
        $parserNamespace = 'Graze\\UnicontrollerClient\\Parser\\Parser\\Parser%s';
        $className = sprintf($parserNamespace, $name);
        if (!class_exists($className)) {
            $className = sprintf($parserNamespace, 'Generic');
        }

        return $className::factory();
    }
}
