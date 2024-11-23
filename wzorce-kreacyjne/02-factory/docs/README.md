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