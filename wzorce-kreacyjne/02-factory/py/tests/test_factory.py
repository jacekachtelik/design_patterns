import unittest
from src.factory import CarFactory, TruckFactory


class TestFactory(unittest.TestCase):

    def testCarFactory(self):

        car = CarFactory().create_vehicle("Sedan")

        self.assertEqual("Samochód typu: Sedan", car.display_info())

    def testTruckFactory(self):

        truck = TruckFactory().create_vehicle("TIR")

        self.assertEqual("Ciężarówka typu: TIR", truck.display_info())
