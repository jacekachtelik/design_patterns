import unittest
from src.factory_with_composition import create_building


class TestFactoryWithComposition(unittest.TestCase):

    def testCreateHouse(self):
        house = create_building("house")

        self.assertEqual("Pokój, Okno", house.display_info())

    def testCreateOffice(self):
        office = create_building("office")

        self.assertEqual("Pokój, Pokój, Okno, Drzwi", office.display_info())

    def testException(self):

        with self.assertRaises(ValueError):
            shop = create_building("shop")
