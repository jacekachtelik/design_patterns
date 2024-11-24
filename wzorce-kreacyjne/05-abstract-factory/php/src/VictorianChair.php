<?php

namespace App;

class VictorianChair implements Chair
{

    public function hasLegs(): bool
    {
        return true;
    }

    public function sitOn(): string
    {
        return 'Siedzenie na krześle w stylu wiktoriańskim';
    }
}
