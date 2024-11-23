# Wzorzec projektowy Singleton

## Opis
**Singleton** to wzorzec projektowy, który zapewnia, że dana klasa ma tylko jedną instancję i udostępnia globalny punkt dostępu do tej instancji. W praktyce oznacza to, że obiekt klasy singleton jest tworzony raz, a kolejne próby stworzenia instancji tej klasy zwracają odniesienie do pierwotnej instancji.

## Główne założenia

- Jedna instancja: Klasa zarządza swoją jedyną instancją, zapewniając, że jest tworzona tylko raz.

- Globalny dostęp: Udostępnia globalny punkt dostępu do tej instancji.

## Zalety

- Kontrola dostępu do jedynej instancji: Zapewnia, że klasa ma tylko jedną instancję, co jest użyteczne w przypadku zasobów współdzielonych, takich jak logowanie, połączenia z bazą danych lub konfiguracje aplikacji.

- Zmniejszenie zużycia zasobów: Ponieważ tworzona jest tylko jedna instancja, zmniejsza się zużycie pamięci i innych zasobów systemowych.

- Prosta globalna dostępność: Zapewnia łatwy dostęp do jedynej instancji przez cały program.

## Wady

- Trudności z testowaniem: Singletons mogą utrudniać testowanie jednostkowe, ponieważ trudno jest zastępować ich inne instancje w testach.

- Globalny stan: Mogą wprowadzać globalny stan do aplikacji, co może prowadzić do problemów z zarządzaniem stanem.

- Potencjalne problemy z wielowątkowością: Wymaga starannego zarządzania, aby zapobiec problemom z wielowątkowością.

## Przykład w Pythonie

```python

class Singleton:
    _instance = None

    def __new__(cls, *args, **kwargs):
        if cls._instance is None:
            cls._instance = super(Singleton, cls).__new__(cls, *args, **kwargs)
        return cls._instance

# Użycie
singleton1 = Singleton()
singleton2 = Singleton()

print(singleton1 is singleton2)  # Wyjście: True

```

W powyższym przykładzie klasa ```Singleton``` zapewnia, że instancja jest tworzona tylko raz. Metoda ```__new__``` kontroluje tworzenie instancji, sprawdzając, czy instancja już istnieje, i jeśli nie, tworzy nową.

## Przykłady zastosowań
Wzorzec Singleton znajduje swoje zastosowanie w różnych sytuacjach, gdzie konieczne jest zapewnienie jedynej instancji danej klasy i globalnego dostępu do niej. Oto kilka przykładów praktycznych zastosowań Singletona:

1. **Logowanie (Logging)**: Singleton jest idealny do zarządzania logowaniem, ponieważ zapewnia jedyną instancję klasy loggera, która jest dostępna globalnie w całej aplikacji.

```python
class Logger(Singleton):
    def log(self, message):
        print(f'Log: {message}')
```

2. **Połączenia z bazą danych (Database Connection)**: Singleton może zarządzać połączeniami z bazą danych, zapewniając, że tylko jedna instancja klasy zarządzającej połączeniem jest tworzona.

```python
class DatabaseConnection(Singleton):
    def connect(self):
        print('Connecting to the database...')
```

3. **Menadżer konfiguracji (Configuration Manager)**: Singleton jest używany do zarządzania konfiguracją aplikacji, gdzie konfiguracje są ładowane raz i dostępne globalnie.

```python
class ConfigManager(Singleton):
    def load_config(self):
        print('Loading configuration...')
```

4. **Zarządzanie stanem aplikacji (Application State Management)**: Singleton może być używany do zarządzania stanem aplikacji, gdzie stan jest przechowywany i dostępny globalnie.

```python
class AppState(Singleton):
    def __init__(self):
        self.state = {}
    def set_state(self, key, value):
        self.state[key] = value
    def get_state(self, key):
        return self.state.get(key)
```

5. **Zarządzanie zasobami (Resource Manager)**: Singleton może zarządzać zasobami, takimi jak menedżery połączeń sieciowych, zarządzanie pamięcią, itp.

### Przykład praktyczny

Oto przykład, jak można użyć Singletona w praktyce:
python

```python
class Logger(metaclass=SingletonMeta):
    def log(self, message):
        print(f'Log: {message}')

logger1 = Logger()
logger2 = Logger()

logger1.log('This is a log message.')  # Wyjście: Log: This is a log message.

print(logger1 is logger2)  # Wyjście: True
```

W powyższym przykładzie klasa ```Logger``` używa wzorca Singleton do zarządzania logowaniem. Tworzymy dwie instancje loggera (```logger1``` i ```logger2```), ale w rzeczywistości obie zmienne wskazują na tę samą instancję.