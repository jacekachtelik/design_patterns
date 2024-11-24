<?php

namespace App;

class ClientCode
{

    public static function init()
    {

        self::execute(new VictorianFurnitureFactory());
        self::execute(new ModernFurnitureFactory());
    }

    private static function execute(FurnitureFactory $furnitureFactory)
    {

        $chair = $furnitureFactory->createChair();
        $sofa = $furnitureFactory->createSofa();

        echo ($chair->sitOn());
        echo "\n";
        echo ($sofa->lieOn());
        echo "\n";
    }
}

ClientCode::init();
