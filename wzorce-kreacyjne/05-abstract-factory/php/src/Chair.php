<?php

namespace App;

interface Chair
{

    public function hasLegs(): bool;

    public function sitOn(): string;
}
