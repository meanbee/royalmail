<?php
abstract class Meanbee_Royalmail_Test_Model_Shipping_Carrier_Royalmail_Abstract extends EcomDev_PHPUnit_Test_Case {
    /**
     * @return Mage_Shipping_Model_Rate_Request
     */
    protected function _getRateRequest($weight, $value, $country) {
        /** @var $request Mage_Shipping_Model_Rate_Request */
        $request = Mage::getModel('shipping/rate_request')->setData(array(
            'package_weight'  => $weight,
            'package_value'   => $value,
            'dest_country_id' => $country
        ));

        return $request;
   }
}
