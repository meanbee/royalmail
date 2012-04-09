<?php
class Meanbee_Royalmail_Test_Model_Shipping_Carrier_Royalmail_Specialdeliverynextday1000 extends Meanbee_Royalmail_Test_Model_Shipping_Carrier_Royalmail_Abstract {
    /** @var Meanbee_Royalmail_Model_Shipping_Carrier_Royalmail_Specialdeliverynextday1000 */
    protected $_model = null;

    public function setUp() {
        parent::setUp();

        $this->_model = Mage::getModel('royalmail/shipping_carrier_royalmail_specialdeliverynextday1000');
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

    public function testMinimumBasketValue() {
        $this->assertNull(
            $this->_model->getCost(
                $this->_getRateRequest(
                    50,
                    500.00,
                    'GB'
                )
            )
        );

        $this->assertNotNull(
            $this->_model->getCost(
                $this->_getRateRequest(
                    50,
                    500.01,
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

    public function testLowerLimit() {
        $this->assertEquals(
            6.90,
            $this->_model->getCost(
                $this->_getRateRequest(
                    50,
                    750.00,
                    'GB'
                )
            )
        );
    }

    public function testUpperLimit() {
        $this->assertEquals(
            25.50,
            $this->_model->getCost(
                $this->_getRateRequest(
                    10000,
                    750.00,
                    'GB'
                )
            )
        );

        $this->assertNull(
            $this->_model->getCost($this->_getRateRequest(
                10001,
                750.00,
                'GB'
            ))
        );
    }
}
