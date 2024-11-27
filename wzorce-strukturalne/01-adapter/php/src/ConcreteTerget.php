<?php

namespace App;

class ConcreteTarget implements Target
{

    public function request(): string
    {

        return "Concrete request\n";
    }
}
