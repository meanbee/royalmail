<?php
class Meanbee_Royalmail_Test_Model_Shipping_Carrier_Royalmail_Specialdelivery9am1000 extends Meanbee_Royalmail_Test_Model_Shipping_Carrier_Royalmail_Abstract {
    /** @var Meanbee_Royalmail_Model_Shipping_Carrier_Royalmail_Specialdelivery9am1000 */
    protected $_model = null;

    public function setUp() {
        parent::setUp();

        $this->_model = Mage::getModel('royalmail/shipping_carrier_royalmail_specialdelivery9am1000');
    }

    public function tearDown() {
        parent::tearDown();

        $this->_model = null;
    }

    public function testNotAllowedFromFrance() {
        $this->assertNull(
            $this->_model->getCost($this->_getRateRequest(
                50,
                1500,
                'FR'
            ))
        );
    }

    public function testMinimalBasketValue() {
        $this->assertNull(
            $this->_model->getCost(
                $this->_getRateRequest(
                    50,
                    50.00,
                    'GB'
                )
            )
        );

        $this->assertNotNull(
            $this->_model->getCost(
                $this->_getRateRequest(
                    50,
                    50.01,
                    'GB'
                )
            )
        );
    }

    public function testMaximumBasketValue() {
        $this->assertNull(
            $this->_model->getCost(
                $this->_getRateRequest(
                    50,
                    1000.01,
                    'GB'
                )
            )
        );

        $this->assertNotNull(
            $this->_model->getCost(
                $this->_getRateRequest(
                    50,
                    1000.00,
                    'GB'
                )
            )
        );
    }

    public function testMinimalPrice() {
        $this->assertEquals(
            17.64 + 2.20,
            $this->_model->getCost(
                $this->_getRateRequest(
                    50,
                    500,
                    'GB'
                )
            )
        );
    }

    public function testUpperLimit() {
        $this->assertEquals(
            26.16 + 2.20,
            $this->_model->getCost(
                $this->_getRateRequest(
                    2000,
                    500,
                    'GB'
                )
            )
        );

        $this->assertNull(
            $this->_model->getCost($this->_getRateRequest(
                2001,
                500,
                'GB'
            ))
        );
    }
}
