<?php


use App\MyClass;
use PHPUnit\Framework\TestCase;

class MyClassTest extends TestCase
{
    protected MyClass $myClass;

    public function setUp(): void
    {
        parent::setUp();
        $this->myClass = new MyClass();
    }

    public function testGetHello()
    {
        $this->assertEquals("Hello World", $this->myClass->getHello());
    }
}
