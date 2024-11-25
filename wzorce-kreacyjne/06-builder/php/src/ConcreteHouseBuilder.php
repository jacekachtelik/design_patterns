<?php

namespace App;

class ConcreteHouseBuilder implements HouseBuilder
{


    private House $house;

    public function __construct()
    {
        $this->house = new House;
    }

    public function buildWalls(): void
    {
        $this->house->setWalls('ścianami betonowymi');
    }

    public function buildRoof(): void
    {
        $this->house->setRoof('dachem betonowym');
    }

    public function buildWindows(): void
    {
        $this->house->setWindows('podwójnymi oknami');
    }

    public function getHouse(): House
    {
        return $this->house;
    }
}
