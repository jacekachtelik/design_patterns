import unittest
import uuid
from src.singleton import DatabaseConnection


class TestSingleton(unittest.TestCase):

    def test_creation_first_instance(self):

        guid = uuid.uuid4()
        guid2 = uuid.uuid4()

        db1 = DatabaseConnection(guid)
        db2 = DatabaseConnection(guid2)

        self.assertEqual(guid, db1.get_guid())
        self.assertEqual(guid, db2.get_guid())
        self.assertNotEqual(guid2, db1.get_guid())
        self.assertNotEqual(guid2, db2.get_guid())
        self.assertEqual(db1, db2)
        self.assertNotEqual(guid, guid2)
