# Wzorzec projektowy: Budowniczy (Builder)
## Opis
Wzorzec projektowy Budowniczy (ang. Builder) jest używany do tworzenia złożonych obiektów krok po kroku. Pozwala na konstrukcję różnych reprezentacji tego samego obiektu za pomocą tego samego procesu budowy. Główną ideą jest oddzielenie konstrukcji obiektu od jego reprezentacji, co pozwala na tworzenie różnych reprezentacji obiektów przy użyciu tego samego kodu budującego.

## Zalety
- **Oddzielenie konstrukcji od reprezentacji**: Umożliwia tworzenie różnych reprezentacji tego samego obiektu.

- **Kontrola nad procesem budowy**: Ułatwia kontrolę nad procesem tworzenia złożonych obiektów.

- **Łatwe dodawanie nowych typów produktów**: Można łatwo dodać nowe typy produktów, nie modyfikując istniejącego kodu budującego.

- **Zwiększenie czytelności kodu**: Przejrzysty i czytelny kod budujący, który jest łatwiejszy do zrozumienia i utrzymania.

## Wady
- **Złożoność**: Może zwiększyć złożoność kodu, szczególnie gdy liczba kroków budowy rośnie.

- **Wymaga wiele klas**: Wymaga stworzenia wielu dodatkowych klas, co może prowadzić do rozbudowania kodu.

## Przykłady

### PHP

```php
// Klasa Produktu
class House {
    private $walls;
    private $roof;
    private $windows;

    public function setWalls($walls) {
        $this->walls = $walls;
    }

    public function setRoof($roof) {
        $this->roof = $roof;
    }

    public function setWindows($windows) {
        $this->windows = $windows;
    }

    public function show() {
        echo "House with {$this->walls}, {$this->roof} roof and {$this->windows} windows.\n";
    }
}

// Interfejs Budowniczego
interface HouseBuilder {
    public function buildWalls();
    public function buildRoof();
    public function buildWindows();
    public function getHouse();
}

// Konkretni Budowniczowie
class ConcreteHouseBuilder implements HouseBuilder {
    private $house;

    public function __construct() {
        $this->house = new House();
    }

    public function buildWalls() {
        $this->house->setWalls("concrete walls");
    }

    public function buildRoof() {
        $this->house->setRoof("concrete roof");
    }

    public function buildWindows() {
        $this->house->setWindows("double-glazed windows");
    }

    public function getHouse() {
        return $this->house;
    }
}

class WoodenHouseBuilder implements HouseBuilder {
    private $house;

    public function __construct() {
        $this->house = new House();
    }

    public function buildWalls() {
        $this->house->setWalls("wooden walls");
    }

    public function buildRoof() {
        $this->house->setRoof("wooden roof");
    }

    public function buildWindows() {
        $this->house->setWindows("single-glazed windows");
    }

    public function getHouse() {
        return $this->house;
    }
}

// Dyrektor
class HouseDirector {
    private $builder;

    public function setBuilder(HouseBuilder $builder) {
        $this->builder = $builder;
    }

    public function constructHouse() {
        $this->builder->buildWalls();
        $this->builder->buildRoof();
        $this->builder->buildWindows();
    }

    public function getHouse() {
        return $this->builder->getHouse();
    }
}

// Klasa klienta
$director = new HouseDirector();

$director->setBuilder(new ConcreteHouseBuilder());
$director->constructHouse();
$house1 = $director->getHouse();
$house1->show();

$director->setBuilder(new WoodenHouseBuilder());
$director->constructHouse();
$house2 = $director->getHouse();
$house2->show();
```

### Python

```python
from abc import ABC, abstractmethod

# Klasa Produktu
class House:
    def __init__(self):
        self.walls = None
        self.roof = None
        self.windows = None

    def set_walls(self, walls):
        self.walls = walls

    def set_roof(self, roof):
        self.roof = roof

    def set_windows(self, windows):
        self.windows = windows

    def show(self):
        print(f"House with {self.walls}, {self.roof} roof and {self.windows} windows.")

# Interfejs Budowniczego
class HouseBuilder(ABC):
    @abstractmethod
    def build_walls(self):
        pass

    @abstractmethod
    def build_roof(self):
        pass

    @abstractmethod
    def build_windows(self):
        pass

    @abstractmethod
    def get_house(self):
        pass

# Konkretni Budowniczowie
class ConcreteHouseBuilder(HouseBuilder):
    def __init__(self):
        self.house = House()

    def build_walls(self):
        self.house.set_walls("concrete walls")

    def build_roof(self):
        self.house.set_roof("concrete roof")

    def build_windows(self):
        self.house.set_windows("double-glazed windows")

    def get_house(self):
        return self.house

class WoodenHouseBuilder(HouseBuilder):
    def __init__(self):
        self.house = House()

    def build_walls(self):
        self.house.set_walls("wooden walls")

    def build_roof(self):
        self.house.set_roof("wooden roof")

    def build_windows(self):
        self.house.set_windows("single-glazed windows")

    def get_house(self):
        return self.house

# Dyrektor
class HouseDirector:
    def __init__(self):
        self.builder = None

    def set_builder(self, builder):
        self.builder = builder

    def construct_house(self):
        self.builder.build_walls()
        self.builder.build_roof()
        self.builder.build_windows()

    def get_house(self):
        return self.builder.get_house()

# Klasa klienta
director = HouseDirector()

director.set_builder(ConcreteHouseBuilder())
director.construct_house()
house1 = director.get_house()
house1.show()

director.set_builder(WoodenHouseBuilder())
director.construct_house()
house2 = director.get_house()
house2.show()
```

## Praktyczne zastosowania:
- **Tworzenie interfejsów użytkownika**: Wzorzec Budowniczy może być używany do tworzenia skomplikowanych elementów GUI, takich jak formularze, okna dialogowe czy panele.

- **Konfigurowalne raporty**: Może być używany do dynamicznego budowania raportów, które składają się z różnych sekcji, tabel, wykresów itp.

- **Budowanie dokumentów**: Może być używany do tworzenia złożonych dokumentów, takich jak strony internetowe, raporty czy e-maile, składających się z różnych elementów (nagłówki, paragrafy, obrazy).

- **Konfiguracja obiektów**: W systemach zarządzania konfiguracją wzorzec Budowniczy może być używany do tworzenia i konfigurowania złożonych obiektów z różnych modułów lub komponentów.