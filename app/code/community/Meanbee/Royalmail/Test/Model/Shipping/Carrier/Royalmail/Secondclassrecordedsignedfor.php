<?php
class Meanbee_Royalmail_Test_Model_Shipping_Carrier_Royalmail_Secondclassrecordedsignedfor extends Meanbee_Royalmail_Test_Model_Shipping_Carrier_Royalmail_Abstract {
    /** @var Meanbee_Royalmail_Model_Shipping_Carrier_Royalmail_Secondclassrecordedsignedfor */
    protected $_model = null;

    public function setUp() {
        parent::setUp();

        $this->_model = Mage::getModel('royalmail/shipping_carrier_royalmail_secondclassrecordedsignedfor');
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
            2.20 + 0.95,
            $this->_model->getCost(
                $this->_getRateRequest(
                    50,
                    1.00,
                    'GB'
                )
            )
        );
    }

    public function testUpperLimit() {
        $this->assertEquals(
            3.50 + 0.95,
            $this->_model->getCost(
                $this->_getRateRequest(
                    1000,
                    1.00,
                    'GB'
                )
            )
        );

        $this->assertNull(
            $this->_model->getCost($this->_getRateRequest(
                1001,
                1.00,
                'GB'
            ))
        );
    }
}
