<?php
require_once 'vendor/autoload.php';
define('SAUCE_HOST','pubinator:580f062b-af5a-4982-85dc-4619f66a2987@ondemand.saucelabs.com');
class WebTest extends PHPUnit_Extensions_Selenium2TestCase {
	
   public static $browsers = array(
        array(
			'name' => 'Sample Selenium2TestCase',
            'browserName' => 'firefox',
            'host' => SAUCE_HOST,
            'port' => 80,
            'desiredCapabilities' => array(
                'version' => '69.0',
                'platform'=> 'Windows 10'
            )
        )
    );
    protected function setUp()
    {
        $this->setBrowserUrl('http://localhost:3000/');
    }
    public function testTitle()
    {
		$start_url = 'hello.html';
        $this->url($start_url);
		$currentURL = $this->url();
		echo $currentURL;
        $this->assertContains("PHP Hello World Test", $this->title());
		
    }
}
?>