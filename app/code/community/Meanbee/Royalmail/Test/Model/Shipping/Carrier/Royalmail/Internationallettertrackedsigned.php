<?php
class Meanbee_Royalmail_Test_Model_Shipping_Carrier_Royalmail_Internationallettertrackedsigned extends Meanbee_Royalmail_Test_Model_Shipping_Carrier_Royalmail_Abstract {
    /** @var Meanbee_Royalmail_Model_Shipping_Carrier_Royalmail_Internationallettertrackedsigned */
    protected $_model = null;

    public function setUp() {
        parent::setUp();

        $this->_model = Mage::getModel('royalmail/shipping_carrier_royalmail_internationallettertrackedsigned');
    }

    public function tearDown() {
        parent::tearDown();

        $this->_model = null;
    }

    public function testAllowedFromFrance() {
        $this->assertEquals(
            7.35,
            $this->_model->getCost($this->_getRateRequest(
                100,
                1.00,
                'FR'
            ))
        );
    }

    public function testNotAllowedFromAfghanistan() {
        $this->assertNull(
            $this->_model->getCost($this->_getRateRequest(
                100,
                1.00,
                'AF'
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
            5.97,
            $this->_model->getCost(
                $this->_getRateRequest(
                    20,
                    1.00,
                    'FR'
                )
            )
        );
    }

    public function testUpperLimit() {
        $this->assertEquals(
            10.95,
            $this->_model->getCost(
                $this->_getRateRequest(
                    100,
                    2000.00,
                    'US'
                )
            )
        );

        $this->assertNull(
            $this->_model->getCost($this->_getRateRequest(
                5001,
                1.00,
                'FR'
            ))
        );
    }

}
