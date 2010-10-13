<?php
require_once 'PHPUnit/Framework.php';
require_once '../../../../../Mage.php';

abstract class Base extends PHPUnit_Framework_TestCase {
	protected $_method = null;
	protected $_country = array(
		"rw" => "SA",
		"uk" => "GB",
		"eu" => "IE"
	);

	public function setUp() {
        Varien_Profiler::enable();
        Mage::setIsDeveloperMode(true);
        ini_set('display_errors', 1);

        umask(0);
        Mage::app();
	}
	
	protected function _getMethod() {
		if ($this->_method === null) {
			$this->_method = $this->_loadMethod();
		}
		
		return $this->_method;
	}
	
	protected function _test($country, $value) {
		return $this->_getMethod()->test($country, $value);
	}
	
	abstract protected function _loadMethod();
}
