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

abstract class AbstractGenerator
{
    const PATH_TEMPLATE = '%s/Template/%s.php.tpl';

    /**
     * @param string $name
     * @return string
     */
    protected function getTemplate($name)
    {
        $path = sprintf(
            self::PATH_TEMPLATE,
            __DIR__,
            $name
        );

        return file_get_contents($path);
    }
}
