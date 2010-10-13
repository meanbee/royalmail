<?php
require_once "Base.php";

class AirmailTest extends Base {
	protected function _loadMethod() {
		return Mage::getModel('royalmail/shipping_carrier_royalmail_airmail');
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
	
	public function testBoundaries() {
		$tests = array (
			1    => 1.28,
			100  => 1.28,
			101  => 1.62,
			250  => 1.62,
			251  => 2.14,
			500  => 2.14,
			501  => 2.65,
			750  => 2.65,
			751  => 3.25,
			1000 => 3.25,
			1001 => 4.45,
			1250 => 4.45,
			1251 => 5.15,
			1500 => 5.15,
			1501 => 5.85,
			1750 => 5.85,
			1751 => 6.55,
			2000 => 6.55,
			2001 => 8.22,
			4000 => 8.22
		);
		
		foreach ($tests as $weight => $value) {
			$this->assertEquals($value, $this->_test($this->_country["uk"], $weight));
		}
	}
	
	public function testInBoundaries() {
		$tests = array (
			32   => 1.28,
			120  => 1.62,
			350  => 2.14,
			732  => 2.65,
			999  => 3.25,
			1111 => 4.45,
			1322 => 5.15,
			1655 => 5.85,
			1950 => 6.55,
			3574 => 8.22
		);
		
		foreach ($tests as $weight => $value) {
			$this->assertEquals($value, $this->_test($this->_country["uk"], $weight));
		}
	}
	
	public function testMoreThan2kg1() {
		$this->assertEquals(8.22 + (2.80 * 4), $this->_test($this->_country["uk"], 4000 + (2000 * 4)));
	}
	
	public function testMoreThan2kg2() {
		$this->assertEquals(8.22 + (2.80 * 1), $this->_test($this->_country["uk"], 4000 + (2000 * 1)));
	}
	
	public function testMoreThan2kg3() {
		$this->assertEquals(8.22 + (2.80 * 8), $this->_test($this->_country["uk"], (10 * 2000) - 1));
	}
	
	public function testMoreThanLimit1() {
		$this->assertNull($this->_test($this->_country["uk"], (20 * 1000) + 1));
	}
	
	public function testMoreThanLimit2() {
		$this->assertNull($this->_test($this->_country["uk"], 21 * 1000));
	}
}
