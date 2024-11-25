<?php

namespace App;

class ConcretePrototype implements Prototype
{

    private string $property;

    public function __construct(string $property)
    {
        $this->property = $property;
    }

    public function setProperty(string $property)
    {
        $this->property = $property;
    }

    public function getProperty(): string
    {
        return $this->property;
    }

    public function clone(): ConcretePrototype
    {

        return clone $this;
    }
}
