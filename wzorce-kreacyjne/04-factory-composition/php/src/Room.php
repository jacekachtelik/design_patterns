<?php

namespace App;


class Room implements BuildingComponent
{

    public function displayInfo(): string
    {
        return 'Pokój';
    }
}
