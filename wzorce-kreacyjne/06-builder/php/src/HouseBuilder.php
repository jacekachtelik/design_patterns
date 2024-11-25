<?php

namespace App;

use App\House;

interface HouseBuilder
{

    public function buildWalls(): void;
    public function buildRoof(): void;
    public function buildWindows(): void;
    public function getHouse(): House;
}
