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

use Graze\UnicontrollerClient\ClassGenerator\Generator\AbstractGenerator;
use Graze\UnicontrollerClient\ClassGenerator\Generator\GeneratorInterface;

class GeneratorParser extends AbstractGenerator implements GeneratorInterface
{
    const PATH = 'src/Parser/Parser/Parser%s.php';

    const CODE_CLASS = <<<CODE_CLASS
%s
namespace Graze\UnicontrollerClient\Parser\Parser;

use Graze\UnicontrollerClient\Parser\Parser\AbstractParser;
use Graze\UnicontrollerClient\Parser\Parser\ParserInterface;
use Graze\UnicontrollerClient\Entity\Entity\Entity%s;

class Parser%s extends AbstractParser implements ParserInterface
{
    /**
     * @return string
     */
    protected function getPattern()
    {
        return '/^%s/';
    }

    /**
     * @return Entity%s
     */
    protected function getEntity()
    {
        return new Entity%s();
    }
}

CODE_CLASS;

    private $captureGroups = [];

    public function generateClass($name)
    {
        return sprintf(
            self::CODE_CLASS,
            $this->getClassDocBlock(),
            $name,
            $name,
            implode(',', $this->captureGroups),
            $name,
            $name
        );
    }

    public function addCaptureGroup($property, $type, $arrayItem = null)
    {
        switch ($type) {
            case 'array':
                $token = sprintf('%s,[0-9]+,[\s\S]*', $arrayItem);
                break;

            case 'string':
                $token = '[\s\S]+';
                break;

            case 'int':
                $token = '-?[0-9]+';
                break;
        }

        $this->captureGroups[] = sprintf('(?<%s>%s)?', lcfirst($property), $token);
    }

    protected function getPath()
    {
        return self::PATH;
    }
}
