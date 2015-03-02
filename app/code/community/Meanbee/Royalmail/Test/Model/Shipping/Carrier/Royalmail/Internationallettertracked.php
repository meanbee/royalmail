<?php
class Meanbee_Royalmail_Test_Model_Shipping_Carrier_Royalmail_Internationallettertracked extends Meanbee_Royalmail_Test_Model_Shipping_Carrier_Royalmail_Abstract {
    /** @var Meanbee_Royalmail_Model_Shipping_Carrier_Royalmail_Internationallettertracked */
    protected $_model = null;

    public function setUp() {
        parent::setUp();

        $this->_model = Mage::getModel('royalmail/shipping_carrier_royalmail_internationallettertracked');
    }

    public function tearDown() {
        parent::tearDown();

        $this->_model = null;
    }

    public function testAllowedFromFrance() {
        $this->assertEquals(
            8.82,
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

    /*
     * The reason this is null is because Royal Mail don't actually offer a tracked delivery to noneu countries
     * Mage::getHelper('royalmail')->isCountryAvailableForInternationalTracked();
     */
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
            7.16,
            $this->_model->getCost(
                $this->_getRateRequest(
                    20,
                    1.00,
                    'FR'
                )
            )
        );
    }

    public function testUpperLimit() {
        $this->assertEquals(
            11.82,
            $this->_model->getCost(
                $this->_getRateRequest(
                    100,
                    2000.00,
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
