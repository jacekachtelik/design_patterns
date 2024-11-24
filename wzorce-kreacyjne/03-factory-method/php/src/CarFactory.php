<?php

namespace App;

class CarFactory extends VehicleFactory
{

    public function createVehicle()
    {
        return new Car();
    }
}
