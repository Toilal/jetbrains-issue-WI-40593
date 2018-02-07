<?php

namespace Tests\Issue;


use Issue\HelloWorld;
use PHPUnit\Framework\TestCase;

class HelloWorldTest extends TestCase
{
    /** @var HelloWorld */
    private $helloWorld;

    protected function setUp()
    {
        $this->helloWorld = new HelloWorld();
    }

    /**
     * @throws \Exception
     */
    public function testGet()
    {
        $this->assertEquals("Hello World!", $this->helloWorld->get());
    }
}