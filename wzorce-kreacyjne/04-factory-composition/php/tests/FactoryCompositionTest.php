<?php

use App\Factory;
use PHPUnit\Framework\TestCase;

class FactoryCompositionTest extends TestCase
{


    public function testCreateHouse()
    {

        $house = (new Factory())->createBuilding('house');

        $this->assertEquals('Pokój, Okno', $house->displayInfo());
    }

    public function testCreateOffice()
    {

        $office = (new Factory())->createBuilding('office');

        $this->assertEquals("Pokój, Pokój, Drzwi, Okno", $office->displayInfo());
    }

    public function testWrongBuildingType()
    {

        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('Nieprawidłowy typ budynku');
        $shop = (new Factory())->createBuilding('shop');
    }
}
