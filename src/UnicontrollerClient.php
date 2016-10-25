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
use Graze\UnicontrollerClient\Entity\Entity\EntityInterface;
use Graze\UnicontrollerClient\Serialiser\SerialiserResolver;

class UnicontrollerClient
{
    /**
     * @var SocketFactory
     */
    private $socketFactory;

    /**
     * @var Serialiser
     */
    private $commandSerialiser;

    /**
     * @var ParserResolver
     */
    private $parserResolver;

    /**
     * @var SocketReader
     */
    private $socketReader;

    /**
     * @var SerialiserResolver
     */
    private $serialiserResolver;

    /**
     * @var \Socket\Raw\Socket
     */
    private $socket;

    /**
     * @param SocketFactory $socketFactory
     * @param CommandSerialiser $commandSerialiser
     * @param ParserResolver $parserResolver
     * @param SocketReader $socketReader
     * @param SerialiserResolver $serialiserResolver
     */
    public function __construct(
        SocketFactory $socketFactory,
        CommandSerialiser $commandSerialiser,
        ParserResolver $parserResolver,
        SocketReader $socketReader,
        SerialiserResolver $serialiserResolver
    ) {
        $this->socketFactory = $socketFactory;
        $this->commandSerialiser = $commandSerialiser;
        $this->parserResolver = $parserResolver;
        $this->socketReader = $socketReader;
        $this->serialiserResolver = $serialiserResolver;
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
     * @return EntityInterface
     */
    public function __call($command, array $arguments)
    {
        $argumentsSerialised = $this->commandSerialiser->serialiseArguments($arguments);
        return $this->send($command, $argumentsSerialised);
    }

    /**
     * @param string $command
     * @param string $argumentsSerialised
     * @return EntityInterface
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
     * @param EntityInterface $entity
     * @return string
     */
    public function serialise(EntityInterface $entity)
    {
        $serialiser = $this->serialiserResolver->resolve($entity);
        return $serialiser->serialise($entity);
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
            new SocketReader(),
            new SerialiserResolver()
        );
    }
}
