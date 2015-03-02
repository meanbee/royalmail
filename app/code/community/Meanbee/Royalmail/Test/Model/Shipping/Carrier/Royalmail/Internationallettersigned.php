<?php
class Meanbee_Royalmail_Test_Model_Shipping_Carrier_Royalmail_Internationallettersigned extends Meanbee_Royalmail_Test_Model_Shipping_Carrier_Royalmail_Abstract {
    /** @var Meanbee_Royalmail_Model_Shipping_Carrier_Royalmail_Internationallettersigned */
    protected $_model = null;

    public function setUp() {
        parent::setUp();

        $this->_model = Mage::getModel('royalmail/shipping_carrier_royalmail_internationallettersigned');
    }

    public function tearDown() {
        parent::tearDown();

        $this->_model = null;
    }

    public function testAllowedFromEstonia() {
        $this->assertEquals(
            7.35,
            $this->_model->getCost($this->_getRateRequest(
                100,
                1.00,
                'EE'
            ))
        );
    }

    public function testNotAllowedBelarus() {
        $this->assertNull(
            $this->_model->getCost($this->_getRateRequest(
                100,
                1.00,
                'BY'
            ))
        );
    }

    public function testNotAllowedFromNonEuCountry() {
        $this->assertEquals(
            null,
            $this->_model->getCost($this->_getRateRequest(
                100,
                1.00,
                'AM'
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
                    'EE'
                )
            )
        );
    }

    public function testUpperLimit() {
        $this->assertEquals(
            10.98,
            $this->_model->getCost(
                $this->_getRateRequest(
                    100,
                    2000.00,
                    'AX'
                )
            )
        );

        $this->assertNull(
            $this->_model->getCost($this->_getRateRequest(
                5001,
                1.00,
                'EE'
            ))
        );
    }
}
