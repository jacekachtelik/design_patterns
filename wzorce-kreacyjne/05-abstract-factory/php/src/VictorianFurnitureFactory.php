<?php

namespace App;

class VictorianFurnitureFactory implements FurnitureFactory
{

    public function createChair(): Chair
    {
        return new VictorianChair();
    }

    public function createSofa(): Sofa
    {
        return new VictorianSofa();
    }
}
