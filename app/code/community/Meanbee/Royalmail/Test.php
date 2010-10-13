<?php
require_once '../../../../Mage.php';

Varien_Profiler::enable();
Mage::setIsDeveloperMode(true);
ini_set('display_errors', 1);

umask(0);
Mage::app();

function test($expected, $result) {
	if($expected !== $result) {
		echo "<br />Fail. Expected: $expected. Result was: $result<br />";
	} else {
		echo ".";
	}
}

/**
 * TESTING
 *
 * If submit any tests you write to nick.jones@meanbee.com so that I can
 * add them in any future release.
 *
 * 3lb = 1360.7 grammes
 */

define('COUNTRY_RW', 'SA');
define('COUNTRY_UK', 'GB');
define('COUNTRY_EU', 'IE');

// Airmail
$method = Mage::getModel('royalmail/shipping_carrier_royalmail_airmail');

test(1.24,  $method->test(COUNTRY_EU, 10, 'g'));
test(6.21,  $method->test(COUNTRY_EU, 1,  'kg'));
test(8.01,  $method->test(COUNTRY_EU, 3,  'lb'));

test(1.64,  $method->test(COUNTRY_RW, 10, 'g'));
test(11.27, $method->test(COUNTRY_RW, 1,  'kg'));
test(14.87, $method->test(COUNTRY_RW, 3,  'lb'));

test(null,  $method->test(COUNTRY_GB, 150, 'g'));

// Airsure
$method = Mage::getModel('royalmail/shipping_carrier_royalmail_airsure');

test(1.24 + 4.2,  $method->test(COUNTRY_EU, 10, 'g'));
test(6.21 + 4.2,  $method->test(COUNTRY_EU, 1,  'kg'));
test(8.01 + 4.2,  $method->test(COUNTRY_EU, 3,  'lb'));

test(1.64 + 4.2,  $method->test(COUNTRY_RW, 10, 'g'));
test(11.27 + 4.2, $method->test(COUNTRY_RW, 1,  'kg'));
test(14.87 + 4.2, $method->test(COUNTRY_RW, 3,  'lb'));

test(null,  $method->test(COUNTRY_GB, 150, 'g'));

// Airsure (Insurance)
$method = Mage::getModel('royalmail/shipping_carrier_royalmail_airsureinsurance');

test(1.24 + 4.2 + 2.2,  $method->test(COUNTRY_EU, 10, 'g'));
test(6.21 + 4.2 + 2.2,  $method->test(COUNTRY_EU, 1,  'kg'));
test(8.01 + 4.2 + 2.2,  $method->test(COUNTRY_EU, 3,  'lb'));

test(1.64 + 4.2 + 2.2,  $method->test(COUNTRY_RW, 10, 'g'));
test(11.27 + 4.2 + 2.2, $method->test(COUNTRY_RW, 1,  'kg'));
test(14.87 + 4.2 + 2.2, $method->test(COUNTRY_RW, 3,  'lb'));

test(null,  $method->test(COUNTRY_GB, 150, 'g'));

// First Class
$method = Mage::getModel('royalmail/shipping_carrier_royalmail_firstclass');

test(1.14,  $method->test(COUNTRY_GB, 90,   'g'));
test(8.22,  $method->test(COUNTRY_GB, 2.5,  'kg'));
test(8.22,  $method->test(COUNTRY_GB, 2.5,  'kg'));
test(5.00,  $method->test(COUNTRY_GB, 3,    'lb'));
test(27.82, $method->test(COUNTRY_GB, 10.1, 'kg'));

test(null, $method->test(COUNTRY_EU, 10, 'g'));
test(null, $method->test(COUNTRY_RW, 3,  'lb'));

// First Class (Signed for)
$method = Mage::getModel('royalmail/shipping_carrier_royalmail_firstclassrecordedsignedfor');

test(1.14 + 0.72,  $method->test(COUNTRY_GB, 90,   'g'));
test(8.22 + 0.72,  $method->test(COUNTRY_GB, 2.5,  'kg'));
test(8.22 + 0.72,  $method->test(COUNTRY_GB, 2.5,  'kg'));
test(5.00 + 0.72,  $method->test(COUNTRY_GB, 3,    'lb'));
test(27.82 + 0.72, $method->test(COUNTRY_GB, 10.1, 'kg'));

test(null, $method->test(COUNTRY_EU, 10, 'g'));
test(null, $method->test(COUNTRY_RW, 3,  'lb'));

// International Signed For
$method = Mage::getModel('royalmail/shipping_carrier_royalmail_internationalsignedfor');

test(1.24 + 3.5,  $method->test(COUNTRY_EU, 10, 'g'));
test(6.21 + 3.5,  $method->test(COUNTRY_EU, 1,  'kg'));
test(8.01 + 3.5,  $method->test(COUNTRY_EU, 3,  'lb'));

test(1.64 + 3.5,  $method->test(COUNTRY_RW, 10, 'g'));
test(11.27 + 3.5, $method->test(COUNTRY_RW, 1,  'kg'));
test(14.87 + 3.5, $method->test(COUNTRY_RW, 3,  'lb'));

test(null,  $method->test(COUNTRY_GB, 150, 'g'));

// Second Class
$method = Mage::getModel('royalmail/shipping_carrier_royalmail_secondclass');

test(1.14,  $method->test(COUNTRY_GB, 90,   'g'));
test(8.22,  $method->test(COUNTRY_GB, 2.5,  'kg'));
test(8.22,  $method->test(COUNTRY_GB, 2.5,  'kg'));
test(5.00,  $method->test(COUNTRY_GB, 3,    'lb'));
test(27.82, $method->test(COUNTRY_GB, 10.1, 'kg'));

test(null, $method->test(COUNTRY_EU, 10, 'g'));
test(null, $method->test(COUNTRY_RW, 3,  'lb'));
