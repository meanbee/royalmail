vim <?php
require_once "Base.php";

class FirstclassTest extends Base {
	public function setUp() {
		parent::setUp();
	}

	protected function _loadMethod() {
		return Mage::getModel('royalmail/shipping_carrier_royalmail_firstclass');
	}
	
    public function testFromGramme() {
		$this->_getMethod()->setWeightUnit("g");
		$this->_getMethod()->_setWeight(100);
        $this->assertEquals(100, $this->_getMethod()->_getWeight());
    }
	
    public function testFromKilograme1() {
		$this->_getMethod()->setWeightUnit("kg");
		$this->_getMethod()->_setWeight(1);
        $this->assertEquals(1000, $this->_getMethod()->_getWeight());
    }
	
    public function testFromKilograme2() {
		$this->_getMethod()->setWeightUnit("kg");
		$this->_getMethod()->_setWeight(0.1);
        $this->assertEquals(100, $this->_getMethod()->_getWeight());
    }
	
    public function testToKilograme3() {
		$this->_getMethod()->setWeightUnit("kg");
		$this->_getMethod()->_setWeight(23.4);
        $this->assertEquals(23400, $this->_getMethod()->_getWeight());
    }
	
	public function testToLb1() {
		$this->_getMethod()->setWeightUnit("lb");
		$this->_getMethod()->_setWeight(1);
        $this->assertEquals(453, floor($this->_getMethod()->_getWeight()));
	}
	
	public function testToLb2() {
		$this->_getMethod()->setWeightUnit("lb");
		$this->_getMethod()->_setWeight(2.4);
        $this->assertEquals(1088, floor($this->_getMethod()->_getWeight()));
	}
	
	public function testToLb3() {
		$this->_getMethod()->setWeightUnit("lb");
		$this->_getMethod()->_setWeight(0.01);
        $this->assertEquals(4, floor($this->_getMethod()->_getWeight()));
	}
}
