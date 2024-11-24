from abc import ABC, abstractmethod


class BuildingComponent(ABC):
    @abstractmethod
    def display_info(self):
        pass


class Room(BuildingComponent):
    def display_info(self):
        return "Pokój"


class Window(BuildingComponent):
    def display_info(self):
        return "Okno"


class Door(BuildingComponent):
    def display_info(self):
        return "Drzwi"


class Building(ABC):
    def __init__(self) -> None:
        self.components = []

    def add_component(self, component):
        self.components.append(component)

    def display_info(self):
        return ", ".join([component.display_info() for component in self.components])


class HouseFactory:
    def create_building(self):
        house = Building()
        house.add_component(Room())
        house.add_component(Window())
        return house


class OfficeFactory:
    def create_building(self):
        office = Building()
        office.add_component(Room())
        office.add_component(Room())
        office.add_component(Window())
        office.add_component(Door())
        return office


def create_building(building_type):
    if building_type == "house":
        factory = HouseFactory()
    elif building_type == "office":
        factory = OfficeFactory()
    else:
        raise ValueError("Nieprawidłowy plik")
    return factory.create_building()


house = create_building("house")
print("Dom z: ", house.display_info())

office = create_building("office")
print("Biuro z: ", office.display_info())
