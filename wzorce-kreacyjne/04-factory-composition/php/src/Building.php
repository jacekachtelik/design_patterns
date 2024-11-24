<?php

namespace App;

class Building
{

    private array $components = [];

    public function addComponent(BuildingComponent $component): void
    {

        $this->components[] = $component;
    }

    public function displayInfo()
    {
        if (!empty($this->components)) {
            $infos = [];
            foreach ($this->components as $component) {
                if ($component instanceof BuildingComponent) {
                    $infos[] = $component->displayInfo();
                }
            }
            return implode(', ', $infos);
        }
        return 'Brak zdefiniowanych komponentów';
    }
}
