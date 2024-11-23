<?php

use PHPUnit\Framework\TestCase;
use App\VehicleFactory;


class VehicleFactoryTest extends TestCase
{

    public function testCreateCar(): void
    {

        $car = VehicleFactory::createVehicle('car');

        $this->assertEquals('Samochód', $car->displayInfo());
    }

    public function testCreateTruck(): void
    {

        $truck = VehicleFactory::createVehicle('truck');

        $this->assertEquals('TIR', $truck->displayInfo());
    }
}
