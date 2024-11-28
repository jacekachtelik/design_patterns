# Wzorzec projektowy Fabryka

## Opis

**Wzorzec Fabryka (ang. Factory)** to wzorzec kreacyjny, który definiuje interfejs do tworzenia obiektów, ale pozwala podklasom na decydowanie, która klasa konkretna będzie instancjonowana. Innymi słowy, wzorzec ten pozwala na tworzenie obiektów bez określania ich dokładnych klas.

## Główne założenia
1. **Abstrakcja tworzenia obiektów**: Oddzielenie procesu tworzenia obiektów od ich implementacji.
2. **Elastyczność**: Łatwe dodawanie nowych klas produktów bez zmiany kodu klienta.

## Zalety
- **Elastyczność**: Możliwość dodawania nowych typów obiektów bez zmiany istniejącego kodu.
- **Enkapsulacja**: Oddzielenie procesu tworzenia obiektów od ich implementacji.
- **Łatwość utrzymania**: Ułatwia zarządzanie kodem i jego przyszłe rozszerzanie.

## Wady
- **Złożoność**: Może wprowadzić dodatkową złożoność w porównaniu do prostego tworzenia obiektów za pomocą operatora new.
- **Przeciążenie konstruktorów**: Wprowadzenie dodatkowych metod fabryki może skomplikować kod, szczególnie w przypadku dużych projektów.

## Przykłady

### Python

```python
class Dog:
    def speak(self):
        return "Woof!"

class Cat:
    def speak(self):
        return "Meow!"

class AnimalFactory:
    @staticmethod
    def create_animal(animal_type):
        if animal_type == "dog":
            return Dog()
        elif animal_type == "cat":
            return Cat()
        else:
            raise ValueError("Unknown animal type")

# Użycie
animal = AnimalFactory.create_animal("dog")
print(animal.speak())  # Wyjście: Woof!
```

### PHP

```php
<?php

class Dog {
    public function speak() {
        return "Woof!";
    }
}

class Cat {
    public function speak() {
        return "Meow!";
    }
}

class AnimalFactory {
    public static function createAnimal($animalType) {
        if ($animalType == "dog") {
            return new Dog();
        } elseif ($animalType == "cat") {
            return new Cat();
        } else {
            throw new InvalidArgumentException("Unknown animal type");
        }
    }
}

// Użycie
$animal = AnimalFactory::createAnimal("dog");
echo $animal->speak();  // Wyjście: Woof!
```

## Praktyczne przykłady

**Wzorzec projektowy Fabryka (ang. Factory Pattern)** jest często używany, gdy program wymaga tworzenia wielu obiektów, ale dokładne klasy tych obiektów są nieznane w czasie kompilacji. Fabryka zapewnia sposób na utworzenie instancji obiektów bez bezpośredniego określenia ich konkretnych klas. Oto kilka praktycznych zastosowań tego wzorca:

- Systemy GUI (Graphical User Interface): W aplikacjach GUI można używać fabryk do tworzenia różnych elementów interfejsu użytkownika, takich jak przyciski, okna dialogowe czy panele, w zależności od platformy (Windows, MacOS, Linux).

- Systemy zarządzania dokumentami: Fabryki mogą być używane do tworzenia różnych typów dokumentów (np. PDF, Word, Excel) w zależności od żądania użytkownika. Przykładowo, aplikacja może mieć fabrykę dokumentów, która generuje odpowiedni dokument na podstawie wybranego formatu.

- Silniki gier: W grach fabryki mogą być używane do generowania różnych typów postaci, przedmiotów czy poziomów. Na przykład, gra może używać fabryk do tworzenia przeciwników, którzy różnią się wyglądem i zachowaniem w zależności od poziomu gry.

- Aplikacje e-commerce: W sklepach internetowych fabryki mogą być używane do generowania różnych typów produktów (np. książki, elektronika, odzież) w zależności od kategorii wybranej przez użytkownika.

### PHP
```PHP
// Definicja interfejsu Produktu
interface Product {
    public function description();
}

// Konkretne klasy Produktu
class Book implements Product {
    public function description() {
        echo "This is a book.\n";
    }
}

class Electronics implements Product {
    public function description() {
        echo "This is an electronic device.\n";
    }
}

// Klasa Fabryki
class ProductFactory {
    public function createProduct($type) {
        if (strcasecmp($type, "Book") == 0) {
            return new Book();
        } elseif (strcasecmp($type, "Electronics") == 0) {
            return new Electronics();
        }
        return null;
    }
}

// Klasa klienta
$factory = new ProductFactory();

$book = $factory->createProduct("Book");
$book->description();

$electronics = $factory->createProduct("Electronics");
$electronics->description();
```

### Python

```python
from abc import ABC, abstractmethod

# Definicja interfejsu Produktu
class Product(ABC):
    @abstractmethod
    def description(self):
        pass

# Konkretne klasy Produktu
class Book(Product):
    def description(self):
        print("This is a book.")

class Electronics(Product):
    def description(self):
        print("This is an electronic device.")

# Klasa Fabryki
class ProductFactory:
    def create_product(self, type):
        if type.lower() == "book":
            return Book()
        elif type.lower() == "electronics":
            return Electronics()
        return None

# Klasa klienta
factory = ProductFactory()

book = factory.create_product("book")
book.description()

electronics = factory.create_product("electronics")
electronics.description()
```

W obu przykładach, klasa ```ProductFactory``` tworzy różne produkty (książki i elektronika) na podstawie podanego typu. Dzięki temu kod jest bardziej elastyczny i łatwiejszy do rozszerzenia.