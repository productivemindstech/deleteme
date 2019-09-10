/*

This requires to have the jenkins plugins: sauce connect and php

1. Setting up creds for saucelabs:
This has to be done on this page http://<jenkins server>/credentials/store/system/domain/_/newCredentials
Choose, SauceLabs option as credentials type

2. It is required the server has composer installed globally
curl -s https://getcomposer.org/installer | php
sudo mv composer.phar /usr/local/bin/composer

3. Additionally, in order to build a php application, the following packages are needed in the system:
- php-curl
- php-xml
- php-mbstring

4. Most testings - because of the nature of some web browsers - will fail at loading localhost pages, so it is recommended to point an alternative name like "dev" to "127.0.0.1" in the OS hosts file

*/

node {
	stage "Build"
	checkout scm

	stage "Dependencies"
	sh 'php --version' 
	sh 'composer install' 

	stage "Testing"
	sauce('saucelabscreds') { 
		sauceconnect(options: '', useGeneratedTunnelIdentifier: false, verboseLogging: false) { 
			sh 'nohup php -S 0.0.0.0:9000 &'
			sh 'vendor/bin/phpunit'
			sh 'pkill php'
			step([$class: 'SauceOnDemandTestPublisher']) 
		}
	}
}
