<?php

namespace App;

class TruckFactory extends VehicleFactory
{

    public function createVehicle()
    {
        return new Truck();
    }
}
