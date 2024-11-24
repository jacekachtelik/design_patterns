<?php

use App\CarFactory;
use App\TruckFactory;
use PHPUnit\Framework\TestCase;


class VehicleFactoryTest extends TestCase
{

    public function testCreateCar(): void
    {

        $car = (new CarFactory())->createVehicle();

        $this->assertEquals('Samochód', $car->displayInfo());
    }

    public function testCreateTruck(): void
    {

        $truck = (new TruckFactory())->createVehicle();

        $this->assertEquals('TIR', $truck->displayInfo());
    }
}
