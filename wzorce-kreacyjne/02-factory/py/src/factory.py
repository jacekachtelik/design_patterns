from abc import ABC, abstractmethod


# Tworzenie klas
class VehicleFactory(ABC):
    @abstractmethod
    def create_vehicle(self, vehicle_type):
        pass


class CarFactory(VehicleFactory):
    def create_vehicle(self, vehicle_type):
        return Car(vehicle_type)


class TruckFactory(VehicleFactory):
    def create_vehicle(self, vehicle_type):
        return Truck(vehicle_type)


# Implementacja klas
class Vehicle(ABC):
    def __init__(self, vehicle_type) -> None:
        self.vehicle_type = vehicle_type

    @abstractmethod
    def display_info(self):
        pass


class Car(Vehicle):
    def display_info(self):
        return f"Samochód typu: {self.vehicle_type}"


class Truck(Vehicle):
    def display_info(self):
        return f"Ciężarówka typu: {self.vehicle_type}"


# Wywołanie klas
car = CarFactory().create_vehicle("sedan")
print(car.display_info())


truck = TruckFactory().create_vehicle("TIR")
print(truck.display_info())
