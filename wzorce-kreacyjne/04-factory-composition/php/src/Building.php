<?php

namespace App;

class Building
{

    private array $components = [];

    public function addComponent(BuildingComponent $component): void
    {

        $this->components[] = $component;
    }

    public function displayInfo()
    {
        return implode(', ', $this->components);
    }
}
