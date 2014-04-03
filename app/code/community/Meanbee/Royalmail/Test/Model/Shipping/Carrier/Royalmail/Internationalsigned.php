<?php
class Meanbee_Royalmail_Test_Model_Shipping_Carrier_Royalmail_Internationalsigned extends Meanbee_Royalmail_Test_Model_Shipping_Carrier_Royalmail_Abstract {
    /** @var Meanbee_Royalmail_Model_Shipping_Carrier_Royalmail_Internationalsigned */
    protected $_model = null;

    public function setUp() {
        parent::setUp();

        $this->_model = Mage::getModel('royalmail/shipping_carrier_royalmail_internationalsigned');
    }

    public function tearDown() {
        parent::tearDown();

        $this->_model = null;
    }

    public function testAllowedFromFiji() {
        $this->assertEquals(
            9,
            $this->_model->getCost($this->_getRateRequest(
                100,
                1.00,
                'FJ'
            ))
        );
    }

    public function testNotAllowedFromFrance() {
        $this->assertNull(
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
            9,
            $this->_model->getCost(
                $this->_getRateRequest(
                    50,
                    1.00,
                    'FJ'
                )
            )
        );
    }

    public function testUpperLimit() {
        $this->assertEquals(
            30,
            $this->_model->getCost(
                $this->_getRateRequest(
                    2000,
                    1.00,
                    'FJ'
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

    public function testAdditionalInsuranceCharge() {
        $this->assertEquals(
            32.5,
            $this->_model->getCost(
                $this->_getRateRequest(
                    2000,
                    100.00,
                    'FJ'
                )
            )
        );
    }
}
