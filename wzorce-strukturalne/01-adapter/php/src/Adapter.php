<?php

namespace App;

class Adapter implements Target
{

    private $adaptee;

    public function __construct(Adaptee $adaptee)
    {
        $this->adaptee = $adaptee;
    }

    public function request()
    {

        $this->adaptee->specificRequest();
    }
}
