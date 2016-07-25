<?php

namespace Graze\UnicontrollerClient\ClassGenerator\Generator;

abstract class AbstractGenerator
{
    const CODE_CLASS_DOCBLOCK = <<<CODE_CLASS_DOCBLOCK
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
CODE_CLASS_DOCBLOCK;

    public function getFilePath($name)
    {
        return sprintf($this->getPath(), $name);
    }

    protected function getClassDocBlock()
    {
        return self::CODE_CLASS_DOCBLOCK;
    }

    abstract protected function getPath();
}
