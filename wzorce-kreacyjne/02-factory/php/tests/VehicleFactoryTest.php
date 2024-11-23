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

    public function testWrongVehicleType(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('Nieznany typ samochodu');
        $unknown = VehicleFactory::createVehicle('unknown');
    }
}
