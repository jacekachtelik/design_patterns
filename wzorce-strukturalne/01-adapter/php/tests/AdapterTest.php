<?php

use App\Adaptee;
use App\Adapter;
use App\ConcreteTarget;
use PHPUnit\Framework\TestCase;

class AdapterTest extends TestCase
{

    public function testAdapter()
    {

        $concreteTarget = new ConcreteTarget();
        $result = $concreteTarget->request();

        $this->assertEquals('JSON', $result);

        $adaptee = new Adaptee();
        $adapter = new Adapter($adaptee);
        $result = $adapter->request();

        $this->assertEquals('XML', $result);
    }
}
