<?php

use PHPUnit\Framework\TestCase;
use App\DatabaseConnection;

class DatabaseConnectionTest extends TestCase
{

    public function testCreateSingleton(): void
    {

        $db1 = DatabaseConnection::getInstance('FOO');
        $value1 = $db1->getGuid();

        $db2 = DatabaseConnection::getInstance('BAR');
        $value2 = $db2->getGuid();

        $this->assertEquals($db1, $db2);
        $this->assertEquals($value1, $value2);
    }
}
