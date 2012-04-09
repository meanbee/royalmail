<?php
class Meanbee_Royalmail_Test_Model_Roundingrule extends Meanbee_Royalmail_Test_Util_Sourcemodel {
    /** @var Meanbee_Royalmail_Model_Roundingrule */
    protected $_model = null;

    public function setUp() {
        $this->_model = Mage::getModel('royalmail/roundingrule');
    }

    public function tearDown() {
        $this->_model = null;
    }
}
