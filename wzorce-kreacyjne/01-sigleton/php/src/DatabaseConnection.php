<?php

namespace App;

class DatabaseConnection
{

    private static $instance = null;

    private ?string $guid = NULL;

    public static function getInstance(string $guid): self
    {

        if (!isset(self::$instance)) {
            self::$instance = new self($guid);
        }

        return self::$instance;
    }

    private function __construct(string $guid)
    {
        $this->setGuid($guid);
    }

    /**
     * Funkcja ustawia
     *
     * @param string $guid
     * @return void
     */
    private function setGuid(string $guid): void
    {

        $this->guid = $guid;
    }

    public function getGuid(): ?string
    {

        return $this->guid;
    }
}
