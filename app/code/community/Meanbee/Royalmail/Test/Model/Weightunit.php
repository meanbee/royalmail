<?php
class Meanbee_Royalmail_Test_Model_Weightunit extends Meanbee_Royalmail_Test_Util_Sourcemodel {
    /** @var Meanbee_Royalmail_Model_Weightunit */
    protected $_model = null;

    public function setUp() {
        $this->_model = Mage::getModel('royalmail/weightunit');
    }

    public function tearDown() {
        $this->_model = null;
    }
}
