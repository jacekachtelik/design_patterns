<?php

namespace App;

/**
 * Klasa niekompatybilna z resztą aplikacji, która jest adaptowana.
 * Zawiera kod niekompatybilny z interfejsem aplikacji
 */
class Adaptee
{

    public function specificRequest(): string
    {
        return "XML";
    }
}
