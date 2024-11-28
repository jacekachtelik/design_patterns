<?php

namespace App;

/**
 * Interfejs, który muszą implementować wszystkie klasy aplikacji
 */
interface Target
{

    public function request(): string;
}
