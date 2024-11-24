# Wzorzec projektowy: Prototyp (Prototype)

## Opis
Wzorzec projektowy **Prototyp (ang. Prototype)** polega na tworzeniu nowych obiektów poprzez klonowanie istniejących instancji. Zamiast tworzyć nowe obiekty od podstaw za pomocą konstruktora, wykorzystuje się już istniejące obiekty jako prototypy, które są kopiowane. Wzorzec ten jest przydatny, gdy koszt tworzenia obiektu od podstaw jest wysoki lub gdy tworzenie obiektów wymaga złożonego procesu inicjalizacji.

## Zalety
- **Szybkość tworzenia obiektów**: Klonowanie istniejących obiektów jest często szybsze niż ich tworzenie od podstaw.

- **Zmniejszenie złożoności**: Pozwala na unikanie złożonych inicjalizacji i konfiguracji obiektów poprzez klonowanie istniejących instancji.

- **Elastyczność**: Umożliwia dynamiczne dodawanie i modyfikowanie prototypów w trakcie działania programu.

## Wady
- **Złożoność implementacji**: Może być trudny w implementacji, szczególnie gdy obiekty zawierają zagnieżdżone struktury lub złożone zależności.

- **Problemy z głębokim klonowaniem**: Klonowanie głębokie (deep copy) może być skomplikowane i wymagać dodatkowej logiki, aby uniknąć problemów z referencjami.

## Przykłady

### PHP

```php
// Interfejs prototypu
interface Prototype {
    public function clone();
}

// Konkretna klasa prototypu
class ConcretePrototype implements Prototype {
    private $property;

    public function __construct($property) {
        $this->property = $property;
    }

    public function getProperty() {
        return $this->property;
    }

    public function setProperty($property) {
        $this->property = $property;
    }

    public function clone() {
        return clone $this;
    }
}

// Klasa klienta
$prototype1 = new ConcretePrototype("Value 1");
$clone1 = $prototype1->clone();
$clone1->setProperty("Cloned Value 1");

echo "Original: " . $prototype1->getProperty() . "\n";
echo "Clone: " . $clone1->getProperty() . "\n";
```

```python
import copy

# Klasa prototypu
class Prototype:
    def __init__(self, property):
        self.property = property

    def get_property(self):
        return self.property

    def set_property(self, property):
        self.property = property

    def clone(self):
        return copy.deepcopy(self)

# Klasa klienta
prototype1 = Prototype("Value 1")
clone1 = prototype1.clone()
clone1.set_property("Cloned Value 1")

print(f"Original: {prototype1.get_property()}")
print(f"Clone: {clone1.get_property()}")
```

# Praktyczne zastosowania:
- **Tworzenie obiektów w grach**: Wzorzec Prototyp jest często używany w silnikach gier do tworzenia złożonych obiektów, takich jak postacie, bronie, czy pojazdy, które mają wiele wspólnych cech.

- **Tworzenie GUI**: Może być używany do klonowania komponentów interfejsu użytkownika, takich jak okna dialogowe, panele, czy przyciski, które mają podobny wygląd i zachowanie.

- **Aplikacje CAD (Computer-Aided Design)**: Wzorzec Prototyp jest przydatny w programach CAD do tworzenia kopii złożonych modeli lub elementów, które wymagają niewielkich modyfikacji.

- **Systemy zarządzania dokumentami**: Może być używany do klonowania dokumentów lub szablonów, które mogą być dostosowywane dla różnych użytkowników lub celów.