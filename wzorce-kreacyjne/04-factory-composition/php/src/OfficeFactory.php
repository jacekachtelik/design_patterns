<?php

namespace App;

class OfficeFactory implements BuildingFactory
{

    public function createBuilding(): Building
    {
        $office = new Building();
        $office->addComponent(new Room());
        $office->addComponent(new Room());
        $office->addComponent(new Door());
        $office->addComponent(new Window());

        return $office;
    }
}
