
<?php
  // Setup: $ php composer.phar require facebook/webdriver
 
  require_once('vendor/autoload.php');
  use Facebook\WebDriver\Remote\RemoteWebDriver;
  use Facebook\WebDriver\WebDriverBy;
 
  $web_driver = RemoteWebDriver::create(
    "http://pubinator:580f062b-af5a-4982-85dc-4619f66a2987@@ondemand.saucelabs.com/wd/hub",
    array("name"=>"PHP demo Test","platform"=>"Windows 10", "browserName"=>"chrome", "version"=>"76")
  );
  $web_driver->get("http://127.0.0.1:3000/hello.html");
 
  /*
    Test actions here...
  */
  echo $web_driver->getTitle();
 
  $web_driver->quit();
?>