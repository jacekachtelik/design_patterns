from abc import ABC, abstractmethod


class Vehicle(ABC):

    def __init__(self, model) -> None:
        self.model = model

    @abstractmethod
    def display_info(self):
        pass

    def get_model(self):
        return self.model


class Car(Vehicle):
    def display_info(self):
        return f"Samochód model {self.model}"


class Bike(Vehicle):
    def display_info(self):
        return f"Rower model {self.model}"


class VehicleFactory(ABC):
    @abstractmethod
    def create_vehicle(self, model):
        pass


class CarFactory(VehicleFactory):
    def create_vehicle(self, model):
        return Car(model)


class BikeFactory(VehicleFactory):
    def create_vehicle(self, model):
        return Bike(model)


class VehicleCreator:

    def create_vehicle(self, vehicle_type, model):
        if vehicle_type == "car":
            factory = CarFactory()
        elif vehicle_type == "bike":
            factory = BikeFactory()
        else:
            raise ValueError("Nieznany typ pojazdu")
        return factory.create_vehicle(model)


car = VehicleCreator.create_vehicle("car", "sedan")
bike = VehicleCreator.create_vehicle("bike", "mountain")

print(car.display_info())
print(bike.display_info())
