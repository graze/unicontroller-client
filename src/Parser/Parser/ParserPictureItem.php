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
use Graze\UnicontrollerClient\Entity\Entity\EntityPictureItem;

class ParserPictureItem extends AbstractParser implements ParserInterface
{
    /**
     * @return string
     */
    protected function getPattern()
    {
        return '/^(?<anchorPoint>-?[0-9]+)?,(?<xPos>-?[0-9]+)?,(?<yPos>-?[0-9]+)?,(?<width>-?[0-9]+)?,(?<height>-?[0-9]+)?,(?<orion>-?[0-9]+)?,(?<description>[\s\S]+)?,(?<maintain>-?[0-9]+)?,(?<pictureName>[\s\S]+)?,(?<printerReferenceName>[\s\S]+)?,(?<usePixelSize>-?[0-9]+)?,(?<pictureData>BinaryData,[0-9]+,[\s\S]*BinaryEnd)?,(?<storeInternally>-?[0-9]+)?,(?<phantomField>-?[0-9]+)?/';
    }

    /**
     * @return EntityPictureItem
     */
    protected function getEntity()
    {
        return new EntityPictureItem();
    }
}
