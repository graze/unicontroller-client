<?php

namespace Graze\UnicontrollerClient\ClassGenerator\Generator;

interface GeneratorInterface
{
    public function generateClass($definition);

    public function getOutputPath($name);
}
