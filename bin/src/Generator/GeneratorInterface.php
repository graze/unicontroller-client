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
namespace Graze\UnicontrollerClient\ClassGenerator\Generator;

interface GeneratorInterface
{
    /**
     * @param string $name
     * @return string
     */
    public function generateClass($name);

    /**
     * @param string $name
     * @return string
     */
    public function getOutputPath($name);
}
