<?php
class Meanbee_Royalmail_Test_Model_Shipping_Carrier_Royalmail_Internationalsignedfor extends Meanbee_Royalmail_Test_Model_Shipping_Carrier_Royalmail_Abstract {
    /** @var Meanbee_Royalmail_Model_Shipping_Carrier_Royalmail_Internationalsignedfor */
    protected $_model = null;

    public function setUp() {
        parent::setUp();

        $this->_model = Mage::getModel('royalmail/shipping_carrier_royalmail_internationalsignedfor');
    }

    public function tearDown() {
        parent::tearDown();

        $this->_model = null;
    }

    public function testNotAllowedFromUk() {
        $this->assertNull(
            $this->_model->getCost($this->_getRateRequest(
                50,
                1.00,
                'GB'
            )),
            'Airmail is not allowed for UK deliveries'
        );
    }

    public function testEuropeUpperLimit() {
        $this->assertEquals(
            13.82 + 5.15,
            $this->_model->getCost($this->_getRateRequest(
                2000,
                1.00,
                'FR'
            ))
        );

        $this->assertNull(
            $this->_model->getCost($this->_getRateRequest(
                2001,
                1.00,
                'FR'
            ))
        );
    }

    public function testRestOfWorld1UpperLimit() {
        $this->assertEquals(
            26.28 + 5.15,
            $this->_model->getCost($this->_getRateRequest(
                2000,
                1.00,
                'US'
            ))
        );

        $this->assertNull(
            $this->_model->getCost($this->_getRateRequest(
                2001,
                1.00,
                'US'
            ))
        );
    }

    public function testRestOfWorld2UpperLimit() {
        $this->assertEquals(
            27.46 + 5.15,
            $this->_model->getCost($this->_getRateRequest(
                2000,
                1.00,
                'NZ'
            ))
        );

        $this->assertNull(
            $this->_model->getCost($this->_getRateRequest(
                2001,
                1.00,
                'NZ'
            ))
        );
    }
}
