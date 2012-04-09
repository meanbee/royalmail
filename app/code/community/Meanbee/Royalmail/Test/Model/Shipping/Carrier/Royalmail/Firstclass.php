<?php
class Meanbee_Royalmail_Test_Model_Shipping_Carrier_Royalmail_Firstclass extends Meanbee_Royalmail_Test_Model_Shipping_Carrier_Royalmail_Abstract {
    /** @var Meanbee_Royalmail_Model_Shipping_Carrier_Royalmail_Firstclass */
    protected $_model = null;

    public function setUp() {
        parent::setUp();

        $this->_model = Mage::getModel('royalmail/shipping_carrier_royalmail_firstclass');
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
        $this->assertEquals(
            2.70,
            $this->_model->getCost(
                $this->_getRateRequest(
                    50,
                    1.00,
                    'GB'
                )
            )
        );
    }

    public function testCSVUpperLimit() {
        $this->assertEquals(
            10.30,
            $this->_model->getCost(
                $this->_getRateRequest(
                    4000,
                    1.00,
                    'GB'
                )
            )
        );
    }

    public function testAlgorithmicCalcs() {
        $this->assertEquals(
            10.30 + 3.50,
            $this->_model->getCost(
                $this->_getRateRequest(
                    4100,
                    1.00,
                    'GB'
                )
            )
        );

        $this->assertEquals(
            10.30 + 3.50,
            $this->_model->getCost(
                $this->_getRateRequest(
                    6000,
                    1.00,
                    'GB'
                )
            )
        );

        $this->assertEquals(
            10.30 + (3.50 * 2),
            $this->_model->getCost(
                $this->_getRateRequest(
                    6100,
                    1.00,
                    'GB'
                )
            )
        );
    }
}
