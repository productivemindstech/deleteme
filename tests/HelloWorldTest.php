<?php

require_once 'vendor/autoload.php';
define('SAUCE_HOST','pubinator:580f062b-af5a-4982-85dc-4619f66a2987@ondemand.saucelabs.com');
define('TRAVIS_JOB_NUMBER', getenv('TRAVIS_JOB_NUMBER'));

class WebTest extends PHPUnit_Extensions_Selenium2TestCase {

    //protected $start_url = 'https://saucelabs.com';
    protected $start_url = "http://localhost:9000/";

    public static $browsers = [
        [
            'browserName' => 'firefox',
	    'host' => SAUCE_HOST,
	    'tunnel-identifier' => TRAVIS_JOB_NUMBER,
	    'port' => 80,
	    'local' => false,
	    'desiredCapabilities' => [
		'version' => '69.0',
		'platform'=> 'Windows 10'
	    ]
        ],
        [
            'browserName' => 'chrome',
	    'host' => SAUCE_HOST,
	    'tunnel-identifier' => TRAVIS_JOB_NUMBER,
            'port' => 80,
	    'local' => false,
	    'desiredCapabilities' => [
		'version' => '69.0',
		'platform'=> 'Windows 10'
	    ]
        ]
    ];


    protected function setUp()
    {
        $this->setBrowserUrl($this->start_url);
    }

    public function testIndex()
    {
	    $this->url($this->start_url);
	    $this->assertContains("dusssssde", $this->title());
    }

    public function tearDown()
    {
        $this->stop();
    }
}
?>


<?php /*
require_once('vendor/autoload.php');
use Facebook\WebDriver\Remote\RemoteWebDriver;
use Facebook\WebDriver\WebDriverBy;



class HelloWorldTest extends PHPUnit_Framework_TestCase {
    public function testGreeting() {
        $greeting = "Hello World";
        $requiredGreeting = "Hello World";

        $this->assertEquals($greeting, $requiredGreeting);
    }

    public function testSeleniumSauce() {
//        $caps = Selenium::WebDriver::Remote::Capabilities.firefox([
//          'tunnel-identifier' => env('TRAVIS_JOB_NUMBER')
//        ]);
//        $driver = Selenium::WebDriver.for(:remote, json_encode('{
//                    url: "http://username:access_key@ondemand.saucelabs.com/wd/hub",
//          desired_capabilities: "' . $caps . '"
//        }'));

//        print_r($caps, true);


        $web_driver = Remote\RemoteWebDriver::create(
            "https://pubinator:580f062b-af5a-4982-85dc-4619f66a2987@ondemand.saucelabs.com:443/wd/hub",
            array("platform"=>"Windows 7", "browserName"=>"chrome", "version"=>"40")
        );
        $web_driver->get("https://saucelabs.com/test/guinea-pig");

        //Test actions here...


        $web_driver->quit();


        $this->assertEquals(false, true);
    }
} */
