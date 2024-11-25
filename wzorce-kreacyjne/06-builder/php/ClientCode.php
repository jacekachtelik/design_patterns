<?php

require_once __DIR__ . '/vendor/autoload.php';

use App\HouseDirector;
use App\ConcreteHouseBuilder;
use App\WoodenHouseBuilder;
use App\HouseBuilder;

class ClientCode
{

    private HouseDirector $director;

    public function __construct()
    {
        $this->director = new HouseDirector();
    }

    public function execute()
    {

        $this->createHouse(new ConcreteHouseBuilder());
        echo "\n";
        $this->createHouse(new WoodenHouseBuilder());
        echo "\n";
    }

    private function createHouse(HouseBuilder $houseBuilder)
    {

        $this->director->setBuilder($houseBuilder);
        $this->director->constructHouse();
        $house = $this->director->getHouse();
        echo $house->show();
    }
}

(new ClientCode())->execute();
