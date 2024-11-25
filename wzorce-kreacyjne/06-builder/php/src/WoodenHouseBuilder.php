<?php

namespace App;

class WoodenHouseBuilder implements HouseBuilder
{

    private House $house;

    public function __construct()
    {
        $this->house = new House();
    }

    public function buildWalls(): void
    {
        $this->house->setWalls('ścianami drewnianymi');
    }

    public function buildRoof(): void
    {
        $this->house->setRoof('dachem drewnianym');
    }

    public function buildWindows(): void
    {
        $this->house->setWindows('oknami zwykłymi');
    }

    public function getHouse(): House
    {
        return $this->house;
    }
}
