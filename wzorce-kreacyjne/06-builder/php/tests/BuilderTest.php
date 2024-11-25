<?php

use App\ConcreteHouseBuilder;
use App\HouseDirector;
use App\WoodenHouseBuilder;
use PHPUnit\Framework\TestCase;


class BuilderTest extends TestCase
{


    public function testConcreteHouse(): void
    {

        $director = new HouseDirector();
        $director->setBuilder(new ConcreteHouseBuilder());
        $director->constructHouse();
        $house = $director->getHouse();

        $this->assertEquals('Dom ze ścianami betonowymi, dachem betonowym oraz podwójnymi oknami', trim($house->show()));
    }

    public function testWoodenHouse(): void
    {

        $director = new HouseDirector();
        $director->setBuilder(new WoodenHouseBuilder);
        $director->constructHouse();
        $house = $director->getHouse();

        $this->assertEquals('Dom ze ścianami drewnianymi, dachem drewnianym oraz oknami zwykłymi', trim($house->show()));
    }
}
