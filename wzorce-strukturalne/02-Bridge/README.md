# Wzorzec projektowy: Most (Bridge)
## Opis
Wzorzec projektowy Most (ang. Bridge) jest strukturalnym wzorcem projektowym, który umożliwia oddzielenie abstrakcji od jej implementacji, co pozwala na ich niezależne rozwijanie. Dzięki temu wzorcowi możliwe jest uniknięcie sztywnego powiązania między wysokopoziomowymi i niskopoziomowymi komponentami, co zwiększa elastyczność i możliwość rozszerzenia systemu.

## Zalety
- Oddzielenie abstrakcji od implementacji: Pozwala na niezależne rozwijanie i modyfikowanie abstrakcji oraz implementacji.

- Zwiększona elastyczność: Umożliwia łatwe dodawanie nowych implementacji bez konieczności modyfikowania istniejących klas abstrakcji.

- Zgodność z zasadą otwarte-zamknięte: Klasy można rozszerzać bez modyfikowania ich kodu, co jest zgodne z zasadą otwarte-zamknięte (Open/Closed Principle).

## Wady
- Złożoność: Może wprowadzić dodatkową warstwę abstrakcji, co może zwiększyć złożoność kodu.

- Większa liczba klas: Może prowadzić do stworzenia większej liczby klas, co może zwiększyć złożoność zarządzania kodem.

## Przykłady

### PHP

```php
// Interfejs implementacji
interface Implementor {
    public function operationImplementation();
}

// Konkretne implementacje
class ConcreteImplementorA implements Implementor {
    public function operationImplementation() {
        echo "ConcreteImplementorA operation\n";
    }
}

class ConcreteImplementorB implements Implementor {
    public function operationImplementation() {
        echo "ConcreteImplementorB operation\n";
    }
}

// Abstrakcja
abstract class Abstraction {
    protected $implementor;

    public function __construct(Implementor $implementor) {
        $this->implementor = $implementor;
    }

    abstract public function operation();
}

// Rozszerzona abstrakcja
class ExtendedAbstraction extends Abstraction {
    public function operation() {
        echo "ExtendedAbstraction operation with: ";
        $this->implementor->operationImplementation();
    }
}

// Klasa klienta
$implementorA = new ConcreteImplementorA();
$implementorB = new ConcreteImplementorB();

$abstractionA = new ExtendedAbstraction($implementorA);
$abstractionB = new ExtendedAbstraction($implementorB);

$abstractionA->operation();
$abstractionB->operation();
```

### Python

```python
from abc import ABC, abstractmethod

# Interfejs implementacji
class Implementor(ABC):
    @abstractmethod
    def operation_implementation(self):
        pass

# Konkretne implementacje
class ConcreteImplementorA(Implementor):
    def operation_implementation(self):
        print("ConcreteImplementorA operation")

class ConcreteImplementorB(Implementor):
    def operation_implementation(self):
        print("ConcreteImplementorB operation")

# Abstrakcja
class Abstraction(ABC):
    def __init__(self, implementor):
        self.implementor = implementor

    @abstractmethod
    def operation(self):
        pass

# Rozszerzona abstrakcja
class ExtendedAbstraction(Abstraction):
    def operation(self):
        print("ExtendedAbstraction operation with: ", end="")
        self.implementor.operation_implementation()

# Klasa klienta
implementor_a = ConcreteImplementorA()
implementor_b = ConcreteImplementorB()

abstraction_a = ExtendedAbstraction(implementor_a)
abstraction_b = ExtendedAbstraction(implementor_b)

abstraction_a.operation()
abstraction_b.operation()
```

## Praktyczne zastosowania:
- Systemy GUI: Most może być używany do oddzielenia abstrakcji interfejsu użytkownika od jego implementacji, co umożliwia łatwe dodawanie nowych sposobów renderowania bez modyfikowania logiki interfejsu użytkownika.

- Silniki gier: Może być używany do oddzielenia logiki gry od mechanizmów renderowania, co pozwala na tworzenie gier działających na różnych platformach (np. PC, konsola) bez konieczności zmiany logiki gry.

- Bazy danych: Może być używany do oddzielenia logiki dostępu do danych od konkretnej implementacji bazy danych, co umożliwia łatwe przełączanie między różnymi bazami danych (np. MySQL, PostgreSQL).

Systemy raportowania: Może być używany do oddzielenia generowania raportów od ich konkretnej implementacji, co umożliwia generowanie raportów w różnych formatach (np. PDF, CSV) bez zmiany logiki raportowania.