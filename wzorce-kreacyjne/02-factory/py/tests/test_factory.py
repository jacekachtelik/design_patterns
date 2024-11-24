import unittest
from src.factory import VehicleCreator


class TestFactory(unittest.TestCase):

    def testCarFactory(self):

        car = VehicleCreator().create_vehicle("car", "sedan")

        self.assertEqual("Samochód model: sedan", car.display_info())

    def testBikeFactory(self):

        bike = VehicleCreator().create_vehicle("bike", "mountain")

        self.assertEqual("Rower model: mountain", bike.display_info())

    def testException(self):

        with self.assertRaises(ValueError):
            VehicleCreator().create_vehicle("truck", "TIR")
