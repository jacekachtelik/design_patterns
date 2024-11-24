<?php

namespace App;

class HouseFactory implements BuildingFactory
{

    public function createBuilding(): Building
    {

        $house = new Building();
        $house->addComponent(new Room());
        $house->addComponent(new Window());
        return $house;
    }
}
