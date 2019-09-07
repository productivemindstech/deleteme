<?php

class HelloWorldTest extends PHPUnit_Framework_TestCase {
    public function testGreeting() {
        $greeting = "Hello World";
        $requiredGreeting = "Hello World";

        $this->assertEquals($greeting, $requiredGreeting);
    }

    public function testSeleniumSauce() {
        $caps = Selenium::WebDriver::Remote::Capabilities.firefox([
          'tunnel-identifier' => env('TRAVIS_JOB_NUMBER')
        ]);
//        $driver = Selenium::WebDriver.for(:remote, json_encode('{
//                    url: "http://username:access_key@ondemand.saucelabs.com/wd/hub",
//          desired_capabilities: "' . $caps . '"
//        }'));

        print_r($caps, true);

        $this->assertEquals(false, true);
    }
}
