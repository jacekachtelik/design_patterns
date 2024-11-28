# Fabryka z kompozycją (ang. Factory with Composition)

## Opis

Wzorzec projektowy Fabryka z Kompozycją (ang. Factory with Composition) polega na tworzeniu złożonych obiektów poprzez łączenie różnych części (komponentów), co pozwala na dynamiczne tworzenie elastycznych i skalowalnych struktur. Jest to rozszerzenie wzorca Fabryka, gdzie zamiast tworzenia prostych obiektów, fabryka tworzy złożone struktury poprzez łączenie mniejszych, wyspecjalizowanych obiektów.

## Zalety
- **Elastyczność**: Umożliwia dynamiczne tworzenie różnych kombinacji komponentów, co zwiększa elastyczność systemu.

- **Skalowalność**: Ułatwia dodawanie nowych typów komponentów bez konieczności modyfikacji istniejącej fabryki.

- **Reużywalność**: Komponenty mogą być wielokrotnie używane w różnych kontekstach, co zmniejsza powielanie kodu.

- **Łatwość utrzymania**: Modułowa budowa ułatwia zarządzanie i modyfikację systemu.

## Wady
- **Złożoność**: Może zwiększyć złożoność kodu, szczególnie gdy liczba komponentów i ich kombinacji rośnie.

- **Koszt wydajności**: Dynamiczne tworzenie i łączenie komponentów może wpływać na wydajność systemu, szczególnie w aplikacjach o wysokich wymaganiach czasowych.

## Przykłady

### PHP

```PHP
// Abstrakcyjna klasa komponentu
abstract class Component {
    abstract public function render();
}

// Konkretne klasy komponentów
class TextComponent extends Component {
    public function render() {
        return "This is a text component.";
    }
}

class ImageComponent extends Component {
    public function render() {
        return "This is an image component.";
    }
}

// Klasa fabryki z kompozycją
class CompositeFactory {
    private $components = [];

    public function addComponent(Component $component) {
        $this->components[] = $component;
    }

    public function createComposite() {
        $composite = new Composite();
        foreach ($this->components as $component) {
            $composite->addComponent($component);
        }
        return $composite;
    }
}

// Klasa kompozytu
class Composite extends Component {
    private $components = [];

    public function addComponent(Component $component) {
        $this->components[] = $component;
    }

    public function render() {
        $result = "";
        foreach ($this->components as $component) {
            $result .= $component->render() . "\n";
        }
        return $result;
    }
}

// Klasa klienta
$factory = new CompositeFactory();
$factory->addComponent(new TextComponent());
$factory->addComponent(new ImageComponent());

$composite = $factory->createComposite();
echo $composite->render();
```

### Python

```python
from abc import ABC, abstractmethod

# Abstrakcyjna klasa komponentu
class Component(ABC):
    @abstractmethod
    def render(self):
        pass

# Konkretne klasy komponentów
class TextComponent(Component):
    def render(self):
        return "This is a text component."

class ImageComponent(Component):
    def render(self):
        return "This is an image component."

# Klasa fabryki z kompozycją
class CompositeFactory:
    def __init__(self):
        self.components = []

    def add_component(self, component):
        self.components.append(component)

    def create_composite(self):
        composite = Composite()
        for component in self.components:
            composite.add_component(component)
        return composite

# Klasa kompozytu
class Composite(Component):
    def __init__(self):
        self.components = []

    def add_component(self, component):
        self.components.append(component)

    def render(self):
        result = ""
        for component in self.components:
            result += component.render() + "\n"
        return result

# Klasa klienta
factory = CompositeFactory()
factory.add_component(TextComponent())
factory.add_component(ImageComponent())

composite = factory.create_composite()
print(composite.render())
```

## Praktyczne zastosowania:
- **Tworzenie interfejsów użytkownika**: Możesz użyć fabryki z kompozycją do dynamicznego tworzenia okien dialogowych, które zawierają różne elementy GUI (przyciski, pola tekstowe, etykiety) w zależności od potrzeb użytkownika.

- **Konfigurowalne raporty**: W systemach raportowania fabryka może być używana do składania raportów z różnych sekcji (nagłówki, tabele, wykresy) na podstawie specyfikacji użytkownika.

- **Budowanie dokumentów**: Możesz dynamicznie tworzyć złożone dokumenty, takie jak strony internetowe lub dokumenty tekstowe, łącząc różne komponenty (nagłówki, paragrafy, obrazy) w zależności od treści.

- **Systemy zarządzania treścią (CMS)**: W systemach CMS fabryka z kompozycją może być używana do tworzenia złożonych stron internetowych poprzez łączenie różnych typów zawartości, takich jak tekst, obrazy, filmy, itd.