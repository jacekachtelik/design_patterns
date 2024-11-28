<?php

namespace App;

/**
 * Klasa standardowa aplikacji implementująca interfejs.
 */
class ConcreteTarget implements Target
{

    public function request(): string
    {
        return "JSON";
    }
}
