<?php

namespace App;

/**
 * Pierwsza klasa implementacji
 */
class ConcreteImplementorA implements Implementor
{

    public function implement(): string
    {
        return 'ConcreteImplementorA';
    }
}
