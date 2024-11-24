<?php

namespace App;

use InvalidArgumentException;

class Factory
{

    /**
     * Metoda tworzy budynek na podstawie typu przekazanego w parametrze
     * 
     * @param string $type Typ budynku do utworzenia
     *
     * @return Building
     */
    public function createBuilding(string $type): Building
    {

        if ($type === 'house') {
            $factory = new HouseFactory();
        } elseif ($type === 'office') {
            $factory = new OfficeFactory;
        } else {
            throw new InvalidArgumentException('Nieprawidłowy typ budynku');
        }

        return $factory->createBuilding();
    }
}