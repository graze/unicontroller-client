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

use Graze\UnicontrollerClient\Parser\Parser\AbstractParser;
use Graze\UnicontrollerClient\Parser\Parser\ParserInterface;
use Graze\UnicontrollerClient\Entity\Entity\EntitySettingsById;

class ParserSettingsById extends AbstractParser implements ParserInterface
{
    /**
     * @return string
     */
    protected function getPattern()
    {
        return '/^(?<id>-?[0-9]+)?,(?<value>-?[0-9]+)?,(?<saveToFile>-?[0-9]+)?/';
    }

    /**
     * @return EntitySettingsById
     */
    protected function getEntity()
    {
        return new EntitySettingsById();
    }
}
