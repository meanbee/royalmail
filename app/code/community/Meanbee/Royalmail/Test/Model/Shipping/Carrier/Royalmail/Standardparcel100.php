<?php
class Meanbee_Royalmail_Test_Model_Shipping_Carrier_Royalmail_Standardparcel100 extends Meanbee_Royalmail_Test_Model_Shipping_Carrier_Royalmail_Abstract {
    /** @var Meanbee_Royalmail_Model_Shipping_Carrier_Royalmail_Standardparcel100 */
    protected $_model = null;

    public function setUp() {
        parent::setUp();

        $this->_model = Mage::getModel('royalmail/shipping_carrier_royalmail_standardparcel100');
    }

    public function tearDown() {
        parent::tearDown();

        $this->_model = null;
    }

    public function testNotAllowedFromFrance() {
        $this->assertNull(
            $this->_model->getCost($this->_getRateRequest(
                50,
                1.00,
                'FR'
            ))
        );
    }

    public function testMinimalPrice() {
        $this->markTestSkipped('This price has not yet been confirmed by Royal Mail');
    }

    public function testUpperLimit() {
        $this->markTestSkipped('This price has not yet been confirmed by Royal Mail');
    }
}
