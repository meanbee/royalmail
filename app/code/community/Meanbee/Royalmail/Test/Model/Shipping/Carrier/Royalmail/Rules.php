<?php

class Meanbee_Royalmail_Test_Model_Shipping_Carrier_Royalmail_Rules extends Meanbee_Royalmail_Test_Model_Shipping_Carrier_Royalmail_Abstract
{

    protected $_model = null;
    protected $_countryCodes = array(
        Meanbee_Royalmail_Helper_Data::WORLD_ZONE_GB    => 'GB',
        Meanbee_Royalmail_Helper_Data::WORLD_ZONE_EU    => 'FR',
        Meanbee_Royalmail_Helper_Data::WORLD_ZONE_ONE   => 'US',
        Meanbee_Royalmail_Helper_Data::WORLD_ZONE_TWO   => 'AU',
    );

    /**
     * @test
     * @dataProvider     dataProvider
     * @dataProviderFile runTests.yaml
     *
     * @param $modelAlias
     * @param $data
     */
    public function runTests($modelAlias, $data)
    {
        $this->_model = Mage::getModel("royalmail/shipping_carrier_royalmail_{$modelAlias}");

        if (!is_array($data['zones'])) {
            $this->testAllowedZone($this->getCountryCode($data), $data['weights']['lowest'], $data['weights']['highest']);
            $this->testNotAllowedZones($this->getNotAllowedCountryCode($data), $data['weights']['lowest'], $data['weights']['highest']);
        } else {
            foreach ($data['zones'] as $key => $zone) {
                $this->testAllowedZone($this->getCountryCode($data, $key), $data['weights']['lowest'], $data['weights']['highest']);
                $this->testNotAllowedZones($this->getNotAllowedCountryCode($data, $key), $data['weights']['lowest'], $data['weights']['highest']);
            }
        }
    }

    /**
     * Test each allowed zones set, for the maximum and minimum
     * weight and prices.
     *
     * @param string $zone
     * @param string $lowest
     * @param string $highest
     */
    protected function testAllowedZone($zone, $lowest, $highest)
    {
        $this->testWeight(floatval($lowest['price']), floatval($lowest['weight']), $zone, $this->getCartTotal($lowest));
        $this->testWeight(floatval($highest['price']), floatval($highest['weight']), $zone, $this->getCartTotal($highest));
    }

    /**
     * Test each all zones which are not allowed for the maximum and
     * minimum weight and prices.
     *
     * @param string $zone
     * @param array  $lowest
     * @param array  $highest
     * @param float  $cartTotal
     */
    protected function testNotAllowedZones($zone, $lowest, $highest, $cartTotal = 1.00)
    {
        $this->assertNull(
            $this->_model->getCost(
                $this->_getRateRequest(
                    $lowest['weight'],
                    $cartTotal,
                    $zone
                )
            )
        );
        $this->assertNull(
            $this->_model->getCost(
                $this->_getRateRequest(
                    $highest['weight'],
                    $cartTotal,
                    $zone
                )
            )
        );
    }

    /**
     * Test that the price is correct based on country code and weight.
     *
     * @param mixed  $price
     * @param float  $weight
     * @param string $zone
     * @param float  $cartTotal
     */
    protected function testWeight($price, $weight, $zone, $cartTotal = 1.00)
    {
        $this->assertEquals(
            $price,
            $this->_model->getCost(
                $this->_getRateRequest(
                    $weight,
                    $cartTotal,
                    $zone
                )
            )
        );
    }

    /**
     * Get the Country Code from Zone.
     *
     * @param             $data
     * @param null|string $key
     *
     * @return string
     */
    protected function getCountryCode($data, $key = null)
    {
        if (isset($data['country_code'])) {
            if (is_array($data['country_code'])) {
                return $data['country_code'][$key];
            } else {
                return $data['country_code'];
            }
        }

        if (is_array($data['zones'])) {
            return $this->_countryCodes[$data['zones'][$key]];
        } else {
            return $this->_countryCodes[$data['zones']];
        }

    }

    /**
     * Get the total price of the cart.
     *
     * @param  $data
     * @return float
     */
    protected function getCartTotal($data)
    {
        if (isset($data['cart_total'])) {
            return $data['cart_total'];
        } else {
            return 1.00;
        }
    }

    /**
     * Get a country code that isn't aloud for the method.
     *
     * @param array       $data
     * @param null|string $key
     *
     * @return string
     */
    protected function getNotAllowedCountryCode($data, $key = null)
    {
        if(isset($data['not_allowed_zone'])) {
            $data['zone'] = $data['not_allowed_zone'];
            return $this->getCountryCode($data, $key);
        }
        $code = $this->getCountryCode($data, $key);
        if($code == 'GB')  {
            return $this->_countryCodes[Meanbee_Royalmail_Helper_Data::WORLD_ZONE_ONE];
        } else {
            return $this->_countryCodes[Meanbee_Royalmail_Helper_Data::WORLD_ZONE_GB];
        }
    }

}
