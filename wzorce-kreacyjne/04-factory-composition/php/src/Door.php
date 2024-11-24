<?php

namespace App;

class Door implements BuildingComponent
{

    public function displayInfo(): string
    {
        return "Drzwi";
    }
}
