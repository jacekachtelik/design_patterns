<?php

namespace App;

/**
 * Druga klasa implementacji
 */
class ConcreteImplementorB implements Implementor
{

    public function implement(): string
    {
        return 'ConcreteImplementorA';
    }
}
