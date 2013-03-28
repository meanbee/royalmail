<?php
class Meanbee_Royalmail_Test_Model_Shipping_Carrier_Royalmail_Internationalsignedforinsurance extends Meanbee_Royalmail_Test_Model_Shipping_Carrier_Royalmail_Abstract {
    /** @var Meanbee_Royalmail_Model_Shipping_Carrier_Royalmail_Internationalsignedforinsurance */
    protected $_model = null;

    public function setUp() {
        parent::setUp();

        $this->_model = Mage::getModel('royalmail/shipping_carrier_royalmail_internationalsignedforinsurance');
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
            13.65 + 7.90,
            $this->_model->getCost($this->_getRateRequest(
                2000,
                350,
                'FR'
            ))
        );

        $this->assertNull(
            $this->_model->getCost($this->_getRateRequest(
                2001,
                350,
                'FR'
            ))
        );
    }

    public function testRestOfWorld1UpperLimit() {
        $this->assertEquals(
            23.40 + 7.90,
            $this->_model->getCost($this->_getRateRequest(
                2000,
                350,
                'US'
            ))
        );

        $this->assertNull(
            $this->_model->getCost($this->_getRateRequest(
                2001,
                350,
                'US'
            ))
        );
    }

    public function testRestOfWorld2UpperLimit() {
        $this->assertEquals(
            24.65 + 7.90,
            $this->_model->getCost($this->_getRateRequest(
                2000,
                350,
                'NZ'
            ))
        );

        $this->assertNull(
            $this->_model->getCost($this->_getRateRequest(
                2001,
                350,
                'NZ'
            ))
        );
    }
}
