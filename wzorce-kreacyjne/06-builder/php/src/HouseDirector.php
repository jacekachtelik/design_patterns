<?php

namespace App;

class HouseDirector
{

    private HouseBuilder $builder;

    public function setBuilder(HouseBuilder $houseBuilder)
    {
        $this->builder = $houseBuilder;
    }

    public function constructHouse()
    {

        $this->builder->buildWalls();
        $this->builder->buildRoof();
        $this->builder->buildWindows();
    }

    public function getHouse(): House
    {
        return $this->builder->getHouse();
    }
}
