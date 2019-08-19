<?php

class HelloWorldTest extends PHPUnit_Framework_TestCase {
    public function testGreeting() {
        $greeting = "Hi World";
        $requiredGreeting = "Hello World";

        $this->assertEquals($greeting, $requiredGreeting);
    }
}
