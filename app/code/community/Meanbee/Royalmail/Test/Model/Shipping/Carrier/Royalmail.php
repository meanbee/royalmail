<?php
class Meanbee_Royalmail_Test_Model_Shipping_Carrier_Royalmail extends Meanbee_Royalmail_Test_Model_Shipping_Carrier_Royalmail_Abstract {
    /** @var Meanbee_Royalmail_Model_Shipping_Carrier_Royalmail */
    protected $_model = null;

    public function setUp() {
        $this->_model = Mage::getModel('royalmail/shipping_carrier_royalmail');
    }

    public function tearDown() {
        $this->_model = null;
    }

    public function testGetAllowedMethods() {
        $this->assertTrue(is_array($this->_model->getAllowedMethods()));
    }

    public function testGetMethodsSingle() {
        $this->assertTrue(is_string($this->_model->getMethods('letter')));
        $this->assertNull($this->_model->getMethods('idontexist'));
    }

    /**
     * When installing the module without configuration, it should be disabled.
     */
    public function testDisableByDefault() {
        $this->assertFalse($this->_model->collectRates($this->_getRateRequest(
            100, 1.0, 'GB'
        )));
    }
}
