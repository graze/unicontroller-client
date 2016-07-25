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
namespace Graze\UnicontrollerClient;

use Socket\Raw\Factory as SocketFactory;
use Graze\UnicontrollerClient\CommandSerialiser;
use Graze\UnicontrollerClient\Parser\ParserResolver;
use Graze\UnicontrollerClient\SocketReader;

class UnicontrollerClient
{
    /**
     * @var SocketFactory
     */
    protected $socketFactory;

    /**
     * @var Serialiser
     */
    protected $commandSerialiser;

    /**
     * @var ParserResolver
     */
    protected $parserResolver;

    /**
     * @var SocketReader
     */
    protected $socketReader;

    /**
     * @var \Socket\Raw\Socket
     */
    protected $socket;

    /**
     * @param SocketFactory $socketFactory
     * @param CommandSerialiser $commandSerialiser
     * @param ParserResolver $parserResolver
     * @param SocketReader $socketReader
     */
    public function __construct(
        SocketFactory $socketFactory,
        CommandSerialiser $commandSerialiser,
        ParserResolver $parserResolver,
        SocketReader $socketReader
    ) {
        $this->socketFactory = $socketFactory;
        $this->commandSerialiser = $commandSerialiser;
        $this->parserResolver = $parserResolver;
        $this->socketReader = $socketReader;
    }

    /**
     * @param string $dsn
     */
    public function connect($dsn)
    {
        $this->socket = $this->socketFactory->createClient($dsn);
    }

    /**
     * @param string $command
     * @param array $arguments
     * @return Graze\UnicontrollerClient\Entity\Entity\EntityInterface
     */
    public function __call($command, array $arguments)
    {
        $argumentsSerialised = $this->commandSerialiser->serialiseArguments($arguments);
        return $this->send($command, $argumentsSerialised);
    }

    /**
     * @param string $command
     * @param string $argumentsSerialised
     * @return string
     */
    public function send($command, $argumentsSerialised)
    {
        $commandSerialised = $this->commandSerialiser->serialiseCommand($command, $argumentsSerialised);
        $this->socket->write($commandSerialised);
        $response = $this->socketReader->read($this->socket);

        $parser = $this->parserResolver->resolve($command);
        return $parser->parse($response);
    }

    /**
     * @return UnicontrollerClient
     */
    public static function factory()
    {
        return new static(
            new SocketFactory(),
            new CommandSerialiser(),
            new ParserResolver(),
            SocketReader::factory()
        );
    }
}
