<?php

namespace App;

class House
{

    private $walls;

    private $roof;

    private $windows;

    public function setWalls($walls): void
    {

        $this->walls = $walls;
    }

    public function setRoof($roof): void
    {

        $this->roof = $roof;
    }

    public function setWindows($windows): void
    {

        $this->windows = $windows;
    }

    public function show(): string
    {

        return sprintf('Dom ze %s, %s oraz %s ', $this->walls, $this->roof, $this->windows);
    }
}
