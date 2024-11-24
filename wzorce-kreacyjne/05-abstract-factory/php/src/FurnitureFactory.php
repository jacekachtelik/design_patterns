<?php

namespace App;

interface FurnitureFactory
{
    public function createChair(): Chair;
    public function createSofa(): Sofa;
}
