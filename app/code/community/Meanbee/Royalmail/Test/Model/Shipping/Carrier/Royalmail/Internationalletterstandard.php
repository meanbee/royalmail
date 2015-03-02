<?php
class Meanbee_Royalmail_Test_Model_Shipping_Carrier_Royalmail_Internationalstandard extends Meanbee_Royalmail_Test_Model_Shipping_Carrier_Royalmail_Abstract {
    /** @var Meanbee_Royalmail_Model_Shipping_Carrier_Royalmail_Internationalletterstandard */
    protected $_model = null;

    public function setUp() {
        parent::setUp();

        $this->_model = Mage::getModel('royalmail/shipping_carrier_royalmail_internationalletterstandard');
    }

    public function tearDown() {
        parent::tearDown();

        $this->_model = null;
    }

    public function testAllowedFromFrance() {
        $this->assertEquals(
            2.35,
            $this->_model->getCost($this->_getRateRequest(
                100,
                1.00,
                'FR'
            ))
        );
    }

    public function testNotAllowedFromUnitedKingdom() {
        $this->assertNull(
            $this->_model->getCost($this->_getRateRequest(
                100,
                1.00,
                'GB'
            ))
        );
    }

    public function testMinimalPrice() {
        $this->assertEquals(
            0.97,
            $this->_model->getCost(
                $this->_getRateRequest(
                    10,
                    1.00,
                    'FR'
                )
            )
        );
    }

    public function testUpperLimit() {
        $this->assertEquals(
            2.35,
            $this->_model->getCost(
                $this->_getRateRequest(
                    100,
                    1.00,
                    'FR'
                )
            )
        );

        $this->assertNull(
            $this->_model->getCost($this->_getRateRequest(
                101,
                1.00,
                'FR'
            ))
        );
    }
}
