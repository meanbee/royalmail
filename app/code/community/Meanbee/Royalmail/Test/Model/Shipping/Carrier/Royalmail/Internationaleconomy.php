<?php
class Meanbee_Royalmail_Test_Model_Shipping_Carrier_Royalmail_Internationaleconomy extends Meanbee_Royalmail_Test_Model_Shipping_Carrier_Royalmail_Abstract {
    /** @var Meanbee_Royalmail_Model_Shipping_Carrier_Royalmail_Internationaleconomy */
    protected $_model = null;

    public function setUp() {
        parent::setUp();

        $this->_model = Mage::getModel('royalmail/shipping_carrier_royalmail_internationaleconomy');
    }

    public function tearDown() {
        parent::tearDown();

        $this->_model = null;
    }

    public function testNotAllowedFromGb() {
        $this->assertNull(
            $this->_model->getCost($this->_getRateRequest(
                50,
                1.00,
                'GB'
            ))
        );
    }

    public function testMinimalPrice() {
        $this->assertEquals(
            2.80,
            $this->_model->getCost(
                $this->_getRateRequest(
                    50,
                    1.00,
                    'FR'
                )
            )
        );
    }

    public function testUpperLimit() {
        $this->assertEquals(
            13.80,
            $this->_model->getCost(
                $this->_getRateRequest(
                    2000,
                    1.00,
                    'FR'
                )
            )
        );

        $this->assertNull(
            $this->_model->getCost($this->_getRateRequest(
                2001,
                1.00,
                'FR'
            ))
        );
    }
}
