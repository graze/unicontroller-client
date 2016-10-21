<?php

namespace Graze\UnicontrollerClient\ClassGenerator\Generator;

abstract class AbstractGenerator
{
    const PATH_TEMPLATE = '%s/Template/%s.php.tpl';

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
