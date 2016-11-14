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
     * @return []
     */
    protected function getProperties()
    {
        return [
            'anchorPoint',
            'xPos',
            'yPos',
            'height',
            'orion',
            'description',
            'narrow',
            'inverted',
            'barcodeType',
            'data',
            'humanReadable',
            'ratio',
            'frame',
            'showDropDowns',
            'fontName',
            'pointSize',
            'bold',
            'italic',
            'subType',
            'preferredFormat',
            'processTilde',
            'separatorHeight',
            'segmentWidth',
            'useHibc',
            'phantomField'
        ];
    }

    /**
     * @return EntityBarcodeItem
     */
    protected function getEntity()
    {
        return new EntityBarcodeItem();
    }
}
