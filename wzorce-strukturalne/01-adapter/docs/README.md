# Wzorzec projektowy: Adapter (Adapter)

## Opis
Wzorzec projektowy Adapter (ang. Adapter) jest strukturalnym wzorcem projektowym, który umożliwia obiektom z niekompatybilnymi interfejsami współpracę. Adapter działa jak pośrednik, który "tłumaczy" interfejs jednej klasy na interfejs oczekiwany przez klienta. Jest to szczególnie przydatne, gdy chcemy użyć istniejącej klasy, ale jej interfejs nie pasuje do reszty naszego systemu.

## Zalety
- Zwiększenie elastyczności: Umożliwia integrację klas z różnymi interfejsami bez konieczności ich modyfikacji.

- Ponowne wykorzystanie kodu: Pozwala na ponowne użycie istniejących klas w nowych kontekstach, minimalizując potrzebę tworzenia nowych klas od podstaw.

- Zgodność interfejsów: Umożliwia współpracę klas z różnymi interfejsami, zwiększając spójność systemu.

## Wady
- Złożoność: Może wprowadzić dodatkową warstwę abstrakcji, co może zwiększyć złożoność kodu.

- Przejrzystość kodu: Może zmniejszyć czytelność kodu, szczególnie gdy używa się wielu adapterów.
## Przykłady

### PHP

```php
// Interfejs docelowy
interface Target {
    public function request();
}

// Klasa docelowa
class ConcreteTarget implements Target {
    public function request() {
        echo "ConcreteTarget request\n";
    }
}

// Klasa, która musi zostać zaadaptowana
class Adaptee {
    public function specificRequest() {
        echo "Adaptee specific request\n";
    }
}

// Adapter
class Adapter implements Target {
    private $adaptee;

    public function __construct(Adaptee $adaptee) {
        $this->adaptee = $adaptee;
    }

    public function request() {
        // tłumaczenie interfejsu
        $this->adaptee->specificRequest();
    }
}

// Klasa klienta
$adaptee = new Adaptee();
$adapter = new Adapter($adaptee);
$adapter->request();

```

### Python

```python
# Interfejs docelowy
class Target:
    def request(self):
        pass

# Klasa docelowa
class ConcreteTarget(Target):
    def request(self):
        print("ConcreteTarget request")

# Klasa, która musi zostać zaadaptowana
class Adaptee:
    def specific_request(self):
        print("Adaptee specific request")

# Adapter
class Adapter(Target):
    def __init__(self, adaptee):
        self.adaptee = adaptee

    def request(self):
        # tłumaczenie interfejsu
        self.adaptee.specific_request()

# Klasa klienta
adaptee = Adaptee()
adapter = Adapter(adaptee)
adapter.request()
```


## Praktyczne zastosowania:
- **Integracja z zewnętrznymi bibliotekami**: Adaptery mogą być używane do integracji zewnętrznych bibliotek, które mają inny interfejs niż nasz system, pozwalając na bezproblemowe korzystanie z funkcji tych bibliotek.

- **Migracja do nowego systemu**: Przy migracji do nowego systemu, adapter może umożliwić współpracę starego kodu z nowym systemem, ułatwiając stopniową migrację.

- **Rozszerzenie funkcjonalności starych systemów**: Można użyć adaptera do dodania nowych funkcji do starszych systemów bez konieczności modyfikowania istniejącego kodu.

- **Systemy wieloplatformowe**: Adapter może umożliwić współpracę aplikacji działających na różnych platformach, które mają różne interfejsy.