<?php
class Meanbee_Royalmail_Test_Model_Shipping_Carrier_Royalmail_Internationaltracked extends Meanbee_Royalmail_Test_Model_Shipping_Carrier_Royalmail_Abstract {
    /** @var Meanbee_Royalmail_Model_Shipping_Carrier_Royalmail_Internationaltracked */
    protected $_model = null;

    public function setUp() {
        parent::setUp();

        $this->_model = Mage::getModel('royalmail/shipping_carrier_royalmail_internationaltracked');
    }

    public function tearDown() {
        parent::tearDown();

        $this->_model = null;
    }

    public function testAllowedFromFrance() {
        $this->assertEquals(
            9.84,
            $this->_model->getCost($this->_getRateRequest(
                100,
                1.00,
                'FR'
            ))
        );
    }

    public function testNotAllowedFromAfghanistan() {
        $this->assertNull(
            $this->_model->getCost($this->_getRateRequest(
                100,
                1.00,
                'AF'
            ))
        );
    }

    public function testAllowedFromNonEuCountry() {
        $this->assertEquals(
            9,
            $this->_model->getCost($this->_getRateRequest(
                100,
                1.00,
                'AU'
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
            9.84,
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
            22.62,
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
                5001,
                1.00,
                'FR'
            ))
        );
    }
}
