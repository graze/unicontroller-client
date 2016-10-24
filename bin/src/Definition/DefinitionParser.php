<?php

namespace Graze\UnicontrollerClient\ClassGenerator\Definition;

use League\CLImate\CLImate;
use Graze\UnicontrollerClient\ClassGenerator\Definition\Definition;
use Graze\UnicontrollerClient\ClassGenerator\Definition\DefinitionProperty;

class DefinitionParser
{
    const PATTERN_STRING = '/\[(STX|ETX)\]/';

    private $cli;

    public function __construct(CLImate $cli)
    {
        $this->cli = $cli;
    }

    public function parse($definitionString)
    {
        $definitionString = $this->removeControlCharacters($definitionString);
        $name = $this->getName($definitionString);
        $definitionString = $this->removeName($definitionString, $name);

        $properties = [];
        foreach (explode(',', $definitionString) as $propertyName) {
            $propertyType = $this->getPropertyType($propertyName);

            if ($propertyType == DefinitionProperty::PROPERTY_TYPE_STRING) {
                $propertyName = $this->cleanString($propertyName);
            }

            $arrayElementName = null;
            if ($propertyType == DefinitionProperty::PROPERTY_TYPE_ARRAY) {
                $arrayElementName = $this->getArrayElementName($propertyName);
            }

            $properties[] = new DefinitionProperty(
                $propertyName,
                $propertyType,
                $arrayElementName
            );
        }

        return new Definition($name, $properties);
    }

    private function removeControlCharacters($definitionString)
    {
        $pattern = [
            '/\[(SOH|ETB|)\]| /',
            '/Heigth/' // common typo in documentation
        ];
        $replacements = [
            '',
            'Height'
        ];

        return preg_replace($pattern, $replacements, $definitionString);
    }

    private function getName($definitionString)
    {
        $pattern = '/^(?<name>[a-z]+)=/i';
        $matches = [];
        preg_match($pattern, $definitionString, $matches);

        // return name
        return $matches['name'];
    }

    private function removeName($definitionString, $name)
    {
        return substr($definitionString, strlen($name)+1);
    }

    private function getPropertyType($propertyName)
    {
        if (strpos($propertyName, 'Data') !== false) {
            $isBinaryData = $this->cli->confirm(sprintf(
                'is [%s] of type BinaryData?',
                $propertyName
            ));

            if ($isBinaryData->confirmed()) {
                return DefinitionProperty::PROPERTY_TYPE_BINARY_DATA;
            }
        }

        if (stripos($propertyName, 'array') !== false) {
            return DefinitionProperty::PROPERTY_TYPE_ARRAY;
        };

        if (preg_match(self::PATTERN_STRING, $propertyName)) {
            return DefinitionProperty::PROPERTY_TYPE_STRING;
        }

        return DefinitionProperty::PROPERTY_TYPE_INT;
    }

    /**
     * @param string $propertyName
     * @return string
     */
    private function cleanString($propertyName)
    {
        return preg_replace(self::PATTERN_STRING, '', $propertyName);
    }

    private function getArrayElementName($propertyName)
    {
        $elementName = str_ireplace('array', '', $propertyName);

        $elementNameItem = sprintf('%sItem', $elementName);
        $elementNameVar = sprintf('Var%s', $elementName);

        $input = $this->cli->input(sprintf(
            'enter array element name for [%s] array (1 for %s, 2 for %s, or custom)',
            $elementName,
            $elementNameItem,
            $elementNameVar
        ));

        $arrayElementName = $input->prompt() ?: 1;
        switch ($arrayElementName) {
            case 1:
                $arrayElementName = $elementNameItem;
                break;

            case 2:
                $arrayElementName = $elementNameVar;
                break;
        }

        $this->cli->out(sprintf('using [%s]', $arrayElementName));

        return $arrayElementName;
    }
}
