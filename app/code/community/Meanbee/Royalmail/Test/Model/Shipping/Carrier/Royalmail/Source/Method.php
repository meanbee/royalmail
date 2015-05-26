<?php
class Meanbee_Royalmail_Test_Model_Shipping_Carrier_Royalmail_Source_Method extends Meanbee_Royalmail_Test_Util_Sourcemodel {
    /** @var Meanbee_Royalmail_Model_Shipping_Carrier_Royalmail_Source_Method */
    protected $_model = null;

    public function setUp() {
        $this->_model = Mage::getModel('royalmail/shipping_carrier_royalmail_source_method');
    }

    public function tearDown() {
        $this->_model = null;
    }
}

