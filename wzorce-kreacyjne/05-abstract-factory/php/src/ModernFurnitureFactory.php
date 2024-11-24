<?php

namespace App;

class ModernFurnitureFactory implements FurnitureFactory
{

    public function createChair(): Chair
    {
        return new ModernChair();
    }

    public function createSofa(): Sofa
    {
        return new ModernSofa();
    }
}
