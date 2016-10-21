<?php

namespace Graze\UnicontrollerClient\ClassGenerator;

use Graze\UnicontrollerClient\ClassGenerator\Generator\GeneratorParser;
use Graze\UnicontrollerClient\ClassGenerator\Generator\GeneratorEntity;
use Graze\UnicontrollerClient\ClassGenerator\Generator\GeneratorSerialiser;

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
     * @param string $definition
     * @param array $arrayNameToItemName
     */
    public function generateClasses($definition, array $arrayNameToItemName)
    {
        // get the definition name
        $pattern = '/^(?<name>[a-z]+)=/i';
        $matches = [];
        preg_match($pattern, $definition, $matches);

        $this->name = $matches['name'];

        // remove definition name
        $definition = substr($definition, strlen($this->name)+1);

        $properties = explode(',', $definition);
        foreach ($properties as $property) {
            // remove escape characters
            $pattern = '/\[(STX|ETX)\]/';
            $count = 0;
            $property = preg_replace($pattern, '', $property, -1, $count);

            $arrayItem = null;
            $type = $count > 0 ? 'string' : 'int';
            if (stripos($property, 'array') !== false) {
                $arrayItem = $arrayNameToItemName[$property];
                $type = 'array';
            };

            $this->generatorParser->addProperty($property);
            $this->generatorEntity->addProperty($property, $type, $arrayItem);
            $this->generatorEntity->addMethod($property, $type, $arrayItem);
            $this->generatorSerialiser->addCallSerialise($property, $type, $arrayItem);
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
