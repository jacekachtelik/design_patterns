<?php

use App\ConcretePrototype;
use PHPUnit\Framework\TestCase;

class PrototypeTest extends TestCase
{

    public function testPrototype()
    {

        $prototype = new ConcretePrototype('A');

        $this->assertEquals('A', $prototype->getProperty());
    }

    public function testClone()
    {

        $prototype = new ConcretePrototype('A');
        $clone = $prototype->clone();
        $clone->setProperty('B');

        $this->assertEquals('B', $clone->getProperty());
    }

    public function testPrototypeWithClone()
    {

        $prototype = new ConcretePrototype('A');
        $clone = $prototype->clone();
        $clone->setProperty('B');

        $this->assertEquals('A', $prototype->getProperty());
        $this->assertEquals('B', $clone->getProperty());
        $this->assertNotEquals($prototype->getProperty(), $clone->getProperty());
    }
}
