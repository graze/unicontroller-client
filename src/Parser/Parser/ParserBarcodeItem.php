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
use Graze\UnicontrollerClient\Entity\Entity\EntityBarcodeItem;

class ParserBarcodeItem extends AbstractParser implements ParserInterface
{
    /**
     * @return string
     */
    protected function getPattern()
    {
        return '/^(?<anchorPoint>-?[0-9]+)?,(?<xPos>-?[0-9]+)?,(?<yPos>-?[0-9]+)?,(?<height>-?[0-9]+)?,(?<orion>-?[0-9]+)?,(?<description>[\s\S]+)?,(?<narrow>-?[0-9]+)?,(?<inverted>-?[0-9]+)?,(?<barcodeType>-?[0-9]+)?,(?<data>[\s\S]+)?,(?<humanReadable>-?[0-9]+)?,(?<ratio>-?[0-9]+)?,(?<frame>-?[0-9]+)?,(?<showDropDowns>-?[0-9]+)?,(?<fontName>[\s\S]+)?,(?<pointSize>-?[0-9]+)?,(?<bold>-?[0-9]+)?,(?<italic>-?[0-9]+)?,(?<subType>-?[0-9]+)?,(?<preferredFormat>-?[0-9]+)?,(?<processTilde>-?[0-9]+)?,(?<separatorHeight>-?[0-9]+)?,(?<segmentWidth>-?[0-9]+)?,(?<useHibc>-?[0-9]+)?,(?<phantomField>-?[0-9]+)?/';
    }

    /**
     * @return EntityBarcodeItem
     */
    protected function getEntity()
    {
        return new EntityBarcodeItem();
    }
}
