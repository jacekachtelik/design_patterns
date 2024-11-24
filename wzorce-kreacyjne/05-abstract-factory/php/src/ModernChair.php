<?php

namespace App;

class ModernChair implements Chair
{

    public function hasLegs(): bool
    {
        return true;
    }

    public function sitOn(): string
    {
        return 'Siedzenie na krześle w stylu nowoczesnym';
    }
}
