<?php
class Meanbee_Royalmail_Test_Model_Parcelsize extends Meanbee_Royalmail_Test_Util_Sourcemodel {
    /** @var Meanbee_Royalmail_Model_Parcelsize */
    protected $_model = null;

    public function setUp() {
        $this->_model = Mage::getModel('royalmail/parcelsize');
    }

    public function tearDown() {
        $this->_model = null;
    }
}
