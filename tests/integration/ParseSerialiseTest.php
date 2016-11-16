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

namespace Graze\UniControllerClient\Test\Integration;

use Graze\UnicontrollerClient\UnicontrollerClient;
use Graze\UnicontrollerClient\Entity\Entity\EntityInterface;
use Graze\UnicontrollerClient\Parser\ParserResolver;

class ParseSerialiseTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var UnicontrollerClient
     */
    private $unicontrollerClient;

    /**
     * @var ParserResolver
     */
    private $parserResolver;

    /**
     * @return UnicontrollerClient
     */
    private function getUnicontrollerClient()
    {
        if (!$this->unicontrollerClient) {
            $this->unicontrollerClient = UnicontrollerClient::factory();
        }

        return $this->unicontrollerClient;
    }

    /**
     * @return ParserResolver
     */
    private function getParserResolver()
    {
        if (!$this->parserResolver) {
            $this->parserResolver = new ParserResolver();
        }

        return $this->parserResolver;
    }

    /**
     * @dataProvider dataProviderTestParseSerialise
     * @param string $name
     */
    public function testParseSerialise($name)
    {
        $filePath = sprintf('%s/../integration/Fixture/Fixture%s', __DIR__, $name);
        $fixture = file_get_contents($filePath);

        $parserResolver = $this->getParserResolver();
        $parser = $parserResolver->resolve($name);

        $entity = $parser->parse($fixture);
        $this->assertInstanceOf(EntityInterface::class, $entity);

        $unicontrollerClient = $this->getUnicontrollerClient();
        $serialised = $unicontrollerClient->serialise($entity);

        $this->assertEquals($fixture, $serialised);
    }

    /**
     * @return array
     */
    public function dataProviderTestParseSerialise()
    {
        return [
            ['BarcodeItem'],
            ['BoxItem'],
            ['LineItem'],
            ['PictureItem'],
            ['ReadDesign'],
            ['SettingsById'],
            ['ShiftDefinition'],
            ['TtfItem'],
            ['VarDatabase'],
            ['VarDatabaseField'],
            ['VarMachineId'],
            ['VarMacro'],
            ['VarMacroOutput'],
            ['VarPrompt'],
            ['VarRtc'],
            ['VarSeq'],
            ['VarSerial'],
            ['VarShiftCode'],
            ['VarUserId'],
        ];
    }
}
