<?php

namespace Graze\UnicontrollerClient\ClassGenerator;

use Graze\UnicontrollerClient\ClassGenerator\Generator\GeneratorParser;
use Graze\UnicontrollerClient\ClassGenerator\Generator\GeneratorEntity;
use Graze\UnicontrollerClient\ClassGenerator\Generator\GeneratorSerialiser;
use Graze\UnicontrollerClient\ClassGenerator\Definition\Definition;

class ClassGenerator
{
    /**
     * @var GeneratorParser
     */
    private $generatorParser;

    /**
     * @var GeneratorEntity
     */
    private $generatorEntity;

    /**
     * @var GeneratorSerialiser
     */
    private $generatorSerialiser;

    /**
     * @var string
     */
    private $name;

    /**
     * @param GeneratorParser $generatorParser
     * @param GeneratorEntity $generatorEntity
     * @param GeneratorSerialiser $generatorSerialiser
     */
    public function __construct(
        GeneratorParser $generatorParser,
        GeneratorEntity $generatorEntity,
        GeneratorSerialiser $generatorSerialiser
    ) {
        $this->generatorParser = $generatorParser;
        $this->generatorEntity = $generatorEntity;
        $this->generatorSerialiser = $generatorSerialiser;
    }

    /**
     * @param Definition $definition
     */
    public function generateClasses(Definition $definition)
    {
        $this->name = $definition->getName();

        foreach ($definition->getProperties() as $property) {
            $this->generatorParser->addProperty($property);
            $this->generatorEntity->addProperty($property);
            $this->generatorEntity->addMethod($property);
            $this->generatorSerialiser->addCallSerialise($property);
        }
    }

    /**
     * @return []
     */
    public function getParser()
    {
        return [
            $this->generatorParser->getOutputPath($this->name),
            $this->generatorParser->generateClass($this->name)
        ];
    }

    /**
     * @return []
     */
    public function getEntity()
    {
        return [
            $this->generatorEntity->getOutputPath($this->name),
            $this->generatorEntity->generateClass($this->name)
        ];
    }

    /**
     * @return []
     */
    public function getSerialiser()
    {
        return [
            $this->generatorSerialiser->getOutputPath($this->name),
            $this->generatorSerialiser->generateClass($this->name)
        ];
    }

    /**
     * @return ClassGenerator
     */
    public static function factory()
    {
        return new static(
            new GeneratorParser(),
            new GeneratorEntity(),
            new GeneratorSerialiser()
        );
    }
}
