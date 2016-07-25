<?php

namespace Graze\UnicontrollerClient\ClassGenerator;

use Graze\UnicontrollerClient\ClassGenerator\Generator\GeneratorParser;
use Graze\UnicontrollerClient\ClassGenerator\Generator\GeneratorEntity;
use Graze\UnicontrollerClient\ClassGenerator\Generator\GeneratorSerialiser;

class ClassGenerator
{
    private $generatorParser;

    private $generatorEntity;

    private $generatorSerialiser;

    private $name;

    public function __construct(
        GeneratorParser $generatorParser,
        GeneratorEntity $generatorEntity,
        GeneratorSerialiser $generatorSerialiser
    ) {
        $this->generatorParser = $generatorParser;
        $this->generatorEntity = $generatorEntity;
        $this->generatorSerialiser = $generatorSerialiser;
    }

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

            $this->generatorParser->addCaptureGroup($property, $type, $arrayItem);
            $this->generatorEntity->addProperty($property, $type, $arrayItem);
            $this->generatorEntity->addMethod($property, $type, $arrayItem);
            $this->generatorSerialiser->addCallSerialise($property, $type, $arrayItem);
        }
    }

    public function getParser()
    {
        return [
            $this->generatorParser->getFilePath($this->name),
            $this->generatorParser->generateClass($this->name)
        ];
    }

    public function getEntity()
    {
        return [
            $this->generatorEntity->getFilePath($this->name),
            $this->generatorEntity->generateClass($this->name)
        ];
    }

    public function getSerialiser()
    {
        return [
            $this->generatorSerialiser->getFilePath($this->name),
            $this->generatorSerialiser->generateClass($this->name)
        ];
    }

    public static function factory()
    {
        return new static(
            new GeneratorParser(),
            new GeneratorEntity(),
            new GeneratorSerialiser()
        );
    }
}
