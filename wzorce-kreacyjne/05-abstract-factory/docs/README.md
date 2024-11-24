# Wzorzec projektowy: Fabryka Abstrakcyjna

## Opis

Wzorzec projektowy **Fabryka Abstrakcyjna (ang. Abstract Factory)** to wzorzec tworzenia obiektów, który zapewnia interfejs do tworzenia rodzin powiązanych lub zależnych obiektów bez określania ich konkretnych klas. Jest to rozszerzenie wzorca Fabryka, które umożliwia tworzenie zestawów obiektów o spójnych interfejsach.

## Zalety
- Spójność: Zapewnia tworzenie spójnych zestawów obiektów, co ułatwia zarządzanie i utrzymanie kodu.

- Elastyczność: Umożliwia łatwe dodawanie nowych rodzin produktów bez modyfikacji istniejącego kodu klienta.

- Enkapsulacja: Oddziela kod tworzenia obiektów od kodu używania tych obiektów, co zwiększa modularność i czytelność kodu.

## Wady
- Złożoność: Może zwiększyć złożoność kodu, szczególnie gdy liczba rodzin produktów rośnie.

- Rozbudowany kod: Wymaga stworzenia wielu dodatkowych klas i interfejsów, co może prowadzić do rozbudowania kodu.

## Przykłady

### PHP

```php
// Abstrakcyjne interfejsy produktów
interface Chair {
    public function hasLegs();
    public function sitOn();
}

interface Sofa {
    public function lieOn();
}

// Konkretne produkty
class VictorianChair implements Chair {
    public function hasLegs() {
        return true;
    }
    public function sitOn() {
        echo "Sitting on a Victorian chair.\n";
    }
}

class ModernChair implements Chair {
    public function hasLegs() {
        return true;
    }
    public function sitOn() {
        echo "Sitting on a Modern chair.\n";
    }
}

class VictorianSofa implements Sofa {
    public function lieOn() {
        echo "Lying on a Victorian sofa.\n";
    }
}

class ModernSofa implements Sofa {
    public function lieOn() {
        echo "Lying on a Modern sofa.\n";
    }
}

// Abstrakcyjna fabryka
interface FurnitureFactory {
    public function createChair();
    public function createSofa();
}

// Konkretne fabryki
class VictorianFurnitureFactory implements FurnitureFactory {
    public function createChair() {
        return new VictorianChair();
    }
    public function createSofa() {
        return new VictorianSofa();
    }
}

class ModernFurnitureFactory implements FurnitureFactory {
    public function createChair() {
        return new ModernChair();
    }
    public function createSofa() {
        return new ModernSofa();
    }
}

// Klasa klienta
function clientCode(FurnitureFactory $factory) {
    $chair = $factory->createChair();
    $sofa = $factory->createSofa();

    $chair->sitOn();
    $sofa->lieOn();
}

clientCode(new VictorianFurnitureFactory());
clientCode(new ModernFurnitureFactory());
```


### Python

```python
from abc import ABC, abstractmethod

# Abstrakcyjne interfejsy produktów
class Chair(ABC):
    @abstractmethod
    def has_legs(self):
        pass

    @abstractmethod
    def sit_on(self):
        pass

class Sofa(ABC):
    @abstractmethod
    def lie_on(self):
        pass

# Konkretne produkty
class VictorianChair(Chair):
    def has_legs(self):
        return True

    def sit_on(self):
        print("Sitting on a Victorian chair.")

class ModernChair(Chair):
    def has_legs(self):
        return True

    def sit_on(self):
        print("Sitting on a Modern chair.")

class VictorianSofa(Sofa):
    def lie_on(self):
        print("Lying on a Victorian sofa.")

class ModernSofa(Sofa):
    def lie_on(self):
        print("Lying on a Modern sofa.")

# Abstrakcyjna fabryka
class FurnitureFactory(ABC):
    @abstractmethod
    def create_chair(self):
        pass

    @abstractmethod
    def create_sofa(self):
        pass

# Konkretne fabryki
class VictorianFurnitureFactory(FurnitureFactory):
    def create_chair(self):
        return VictorianChair()

    def create_sofa(self):
        return VictorianSofa()

class ModernFurnitureFactory(FurnitureFactory):
    def create_chair(self):
        return ModernChair()

    def create_sofa(self):
        return ModernSofa()

# Klasa klienta
def client_code(factory):
    chair = factory.create_chair()
    sofa = factory.create_sofa()

    chair.sit_on()
    sofa.lie_on()

client_code(VictorianFurnitureFactory())
client_code(ModernFurnitureFactory())

```

## Praktyczne zastosowania:

- **Systemy GUI**: Fabryka abstrakcyjna może być używana do tworzenia spójnych zestawów elementów GUI, takich jak przyciski, okna dialogowe i panele, które mają spójny wygląd i zachowanie.

- **Systemy zarządzania treścią (CMS)**: Może być używana do dynamicznego tworzenia różnych zestawów komponentów stron internetowych, takich jak nagłówki, akapity, obrazy, w zależności od wybranego motywu.

- **Silniki gier**: Może być używana do tworzenia spójnych zestawów obiektów gry, takich jak postacie, poziomy, i przedmioty, które mają spójny styl i mechanikę.

- **Aplikacje wieloplatformowe**: Fabryka abstrakcyjna może być używana do tworzenia interfejsów użytkownika lub innych komponentów specyficznych dla różnych platform (np. Windows, MacOS, Linux) z zachowaniem spójnego API.