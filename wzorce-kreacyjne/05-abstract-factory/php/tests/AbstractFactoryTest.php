<?php

use App\ModernFurnitureFactory;
use App\VictorianFurnitureFactory;
use PHPUnit\Framework\TestCase;

class AbstractFactoryTest extends TestCase
{

    public function testVictorianFurnitureFactory()
    {

        $furnitureFactory = new VictorianFurnitureFactory();

        $chair = $furnitureFactory->createChair();
        $sofa = $furnitureFactory->createSofa();

        $this->assertEquals('Siedzenie na krześle w stylu wiktoriańskim', $chair->sitOn());
        $this->assertEquals('leżenie na sofie w stylu wiktoriańskim', $sofa->lieOn());
    }

    public function testModernFurnitureFactory()
    {

        $furnitureFactory = new ModernFurnitureFactory();

        $chair = $furnitureFactory->createChair();
        $sofa = $furnitureFactory->createSofa();

        $this->assertEquals('Siedzenie na krześle w stylu nowoczesnym', $chair->sitOn());
        $this->assertEquals('leżenie na sofie w stylu nowoczesnym', $sofa->lieOn());
    }
}
