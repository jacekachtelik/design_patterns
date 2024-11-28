# Wzorzec projektowy Metoda Wytwórcza (Factory Method)

## Opis

**Wzorzec Metoda Wytwórcza (ang. Factory Method)** to wzorzec kreacyjny, który definiuje interfejs do tworzenia obiektów w klasie bazowej, ale pozwala podklasom na decydowanie, jakiej klasy obiekty będą tworzone. Innymi słowy, pozwala podklasom na przesłanianie metody wytwórczej w celu tworzenia obiektów.

## Główne założenia
1. Abstrakcja tworzenia obiektów: Oddzielenie procesu tworzenia obiektów od ich implementacji.
2. Elastyczność i rozszerzalność: Podklasy mogą przesłaniać metodę wytwórczą, aby tworzyć specyficzne dla siebie instancje obiektów.

## Zalety
- **Elastyczność**: Pozwala podklasom na decydowanie o typie tworzonych obiektów.
- **Odpowiedzialność**: Delegowanie tworzenia obiektów do podklas pozwala na lepsze zarządzanie odpowiedzialnością klas.
- **Łatwość rozszerzania**: Dodawanie nowych typów obiektów staje się prostsze bez konieczności modyfikowania kodu bazowego.

## Wady
- **Złożoność**: Wprowadza dodatkową złożoność poprzez dodanie nowych klas i metod.
- **Trudność w utrzymaniu**: Może prowadzić do trudności w utrzymaniu kodu, szczególnie w dużych systemach z wieloma różnymi typami obiektów.

## Przykłady

### Python

```python
from abc import ABC, abstractmethod

class Animal(ABC):
    @abstractmethod
    def speak(self):
        pass

class Dog(Animal):
    def speak(self):
        return "Woof!"

class Cat(Animal):
    def speak(self):
        return "Meow!"

class AnimalFactory(ABC):
    @abstractmethod
    def create_animal(self):
        pass

class DogFactory(AnimalFactory):
    def create_animal(self):
        return Dog()

class CatFactory(AnimalFactory):
    def create_animal(self):
        return Cat()

# Użycie
dog_factory = DogFactory()
dog = dog_factory.create_animal()
print(dog.speak())  # Wyjście: Woof!

cat_factory = CatFactory()
cat = cat_factory.create_animal()
print(cat.speak())  # Wyjście: Meow!

```

### PHP

```php
<?php

abstract class Animal {
    abstract public function speak();
}

class Dog extends Animal {
    public function speak() {
        return "Woof!";
    }
}

class Cat extends Animal {
    public function speak() {
        return "Meow!";
    }
}

abstract class AnimalFactory {
    abstract public function createAnimal();
}

class DogFactory extends AnimalFactory {
    public function createAnimal() {
        return new Dog();
    }
}

class CatFactory extends AnimalFactory {
    public function createAnimal() {
        return new Cat();
    }
}

// Użycie
$dogFactory = new DogFactory();
$dog = $dogFactory->createAnimal();
echo $dog->speak();  // Wyjście: Woof!

$catFactory = new CatFactory();
$cat = $catFactory->createAnimal();
echo $cat->speak();  // Wyjście: Meow!

```

## Przykładowe zastosowania:

- **Systemy logowania**: Różne systemy logowania mogą wymagać różnych mechanizmów uwierzytelniania (np. LDAP, OAuth, bazy danych). Metoda wytwórcza pozwala na dynamiczne wybieranie odpowiedniego mechanizmu uwierzytelniania.

- **Tworzenie dokumentów**: W zależności od formatu dokumentu (PDF, Word, Excel), fabryka może dynamicznie tworzyć odpowiedni typ dokumentu.

- **Silniki gier**: W zależności od typu gry, mogą być tworzone różne typy postaci lub przeciwników przy użyciu metody wytwórczej.

- **Aplikacje e-commerce**: Różne metody płatności (karta kredytowa, PayPal, przelew bankowy) mogą być dynamicznie tworzone w zależności od wyboru użytkownika.

### PHP
```PHP
// Abstrakcyjna klasa Produktu
abstract class Product {
    abstract public function description();
}

// Konkretne klasy Produktu
class Book extends Product {
    public function description() {
        echo "This is a book.\n";
    }
}

class Electronics extends Product {
    public function description() {
        echo "This is an electronic device.\n";
    }
}

// Abstrakcyjna klasa Fabryki
abstract class ProductFactory {
    abstract protected function factoryMethod();

    public function createProduct() {
        $product = $this->factoryMethod();
        return $product;
    }
}

// Konkretne klasy Fabryki
class BookFactory extends ProductFactory {
    protected function factoryMethod() {
        return new Book();
    }
}

class ElectronicsFactory extends ProductFactory {
    protected function factoryMethod() {
        return new Electronics();
    }
}

// Klasa klienta
$bookFactory = new BookFactory();
$book = $bookFactory->createProduct();
$book->description();

$electronicsFactory = new ElectronicsFactory();
$electronics = $electronicsFactory->createProduct();
$electronics->description();
```

### Python

```python
from abc import ABC, abstractmethod

# Abstrakcyjna klasa Produktu
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

# Abstrakcyjna klasa Fabryki
class ProductFactory(ABC):
    @abstractmethod
    def factory_method(self):
        pass

    def create_product(self):
        product = self.factory_method()
        return product

# Konkretne klasy Fabryki
class BookFactory(ProductFactory):
    def factory_method(self):
        return Book()

class ElectronicsFactory(ProductFactory):
    def factory_method(self):
        return Electronics()

# Klasa klienta
book_factory = BookFactory()
book = book_factory.create_product()
book.description()

electronics_factory = ElectronicsFactory()
electronics = electronics_factory.create_product()
electronics.description()
```