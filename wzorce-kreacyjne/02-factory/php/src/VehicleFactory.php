<?php

namespace App;

use InvalidArgumentException;

class VehicleFactory
{

    public static function createVehicle(string $type)
    {
        if ($type === 'car') {
            return new Car();
        } elseif ($type === 'truck') {
            return new Truck();
        } else {
            throw new InvalidArgumentException('Nieznany typ samochodu');
        }
    }
}
