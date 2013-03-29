<?php
class Meanbee_Royalmail_Test_Model_Shipping_Carrier_Royalmail_Specialdelivery9am2500 extends Meanbee_Royalmail_Test_Model_Shipping_Carrier_Royalmail_Abstract {
    /** @var Meanbee_Royalmail_Model_Shipping_Carrier_Royalmail_Specialdelivery9am2500 */
    protected $_model = null;

    public function setUp() {
        parent::setUp();

        $this->_model = Mage::getModel('royalmail/shipping_carrier_royalmail_specialdelivery9am2500');
    }

    public function tearDown() {
        parent::tearDown();

        $this->_model = null;
    }

    public function testNotAllowedFromFrance() {
        $this->assertNull(
            $this->_model->getCost($this->_getRateRequest(
                50,
                2500.00,
                'FR'
            ))
        );
    }

    public function testMinimalBasketValue() {
        $this->assertNotNull(
            $this->_model->getCost(
                $this->_getRateRequest(
                    50,
                    2500,
                    'GB'
                )
            )
        );
    }

    public function testMinimalPrice() {
        $this->assertEquals(
            17.64 + 5.70,
            $this->_model->getCost(
                $this->_getRateRequest(
                    50,
                    2500.00,
                    'GB'
                )
            )
        );
    }

    public function testUpperLimit() {
        $this->assertEquals(
            26.16 + 5.70,
            $this->_model->getCost(
                $this->_getRateRequest(
                    2000,
                    3000.00,
                    'GB'
                )
            )
        );

        $this->assertNull(
            $this->_model->getCost($this->_getRateRequest(
                2001,
                3000.00,
                'GB'
            ))
        );
    }
}
