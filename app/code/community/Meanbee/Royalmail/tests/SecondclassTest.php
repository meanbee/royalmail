<?php
require_once "Base.php";

class SecondclassTest extends Base {
	protected function _loadMethod() {
		return Mage::getModel('royalmail/shipping_carrier_royalmail_secondclass');
	}
	
    public function testNoEu() {
        $this->assertNull($this->_test($this->_country["eu"], 10));
    }

    public function testNoRw() {
        $this->assertNull($this->_test($this->_country["rw"], 10));
    }

    public function testNoJunk() {
        $this->assertNull($this->_test("iamjunk", 10));
    }
	
	public function testMoreThanLimit() {
		$this->assertNull($this->_test($this->_country["uk"], 1001));
	}
}