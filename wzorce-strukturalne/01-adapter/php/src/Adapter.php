<?php

namespace App;

/**
 * Adapter implementujący interfejs standardowy, który przyjmuje klasę niekompatybilną i zwraca dane w postaci kompatybilnej.
 */
class Adapter implements Target
{

    private Adaptee $adaptee;

    public function __construct(Adaptee $adaptee)
    {
        $this->adaptee = $adaptee;
    }

    public function request(): string
    {
        return $this->adaptee->specificRequest();
    }
}
