# Klasa Singleton imitująca połączenie do bazy danych


class DatabaseConnection:

    _instance = None  # Zmienna klasowa przechowująca instancję Singletona
    _guid = None  # Zmienna klasowa przechowująca

    def __new__(cls, guid):

        if cls._instance is None:  # Jeżeli instancja nie istnieje
            # Tworzy nową instancję
            cls._instance = super().__new__(cls)
            # Przypisuje instancję
            cls._guid = guid

        # Zwraca instancję
        return cls._instance

    def get_guid(cls):
        return cls._guid

    def set_guid(cls, guid):
        cls._guid = guid
