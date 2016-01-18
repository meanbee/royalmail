<?php

class Meanbee_RoyalmailPHPLibrary_CalculateMethod
{

    // Helper document root
    public $documentRoot;

    public $_csvCountryCode;
    public $_csvZoneToDeliverMethod;
    public $_csvDeliveryMethodMeta;
    public $_csvDeliveryToPrice;
    public $_csvCleanNameToMethod;
    public $_csvCleanNameMethodGroup;

    public function __construct()
    {
        $this->getDocumentRoot();

        // Set the default csv values
        $this->_csvCountryCode = $this->documentRoot . '../data/1_countryToZone.csv';
        $this->_csvZoneToDeliverMethod = $this->documentRoot . '../data/2_zoneToDeliveryMethod.csv';
        $this->_csvDeliveryMethodMeta = $this->documentRoot . '../data/3_deliveryMethodMeta.csv';
        $this->_csvDeliveryToPrice = $this->documentRoot . '../data/4_deliveryToPrice.csv';
        $this->_csvCleanNameToMethod = $this->documentRoot . '../data/5_cleanNameToMethod.csv';
        $this->_csvCleanNameMethodGroup = $this->documentRoot . '../data/6_cleanNameMethodGroup.csv';
    }

    /**
     * Method to run the appropriate sorting methods
     * in the correct order based on the country code,
     * package value, and package weight. Returns the
     * sorted values to the RoyalMailMethod class to be
     * converted into objects.
     *
     * @param $country_code
     * @param $package_value
     * @param $package_weight
     *
     * @return array
     */
    public function getMethods($country_code, $package_value, $package_weight)
    {
        $data = new Meanbee_RoyalmailPHPLibrary_Data(
            $this->_csvCountryCode,
            $this->_csvZoneToDeliverMethod,
            $this->_csvDeliveryMethodMeta,
            $this->_csvDeliveryToPrice,
            $this->_csvCleanNameToMethod,
            $this->_csvCleanNameMethodGroup
        );

        $sortedDeliveryMethods = array($data->calculateMethods($country_code, $package_value, $package_weight));

        $results = array();

        foreach ($sortedDeliveryMethods as $shippingMethod) {
            foreach ($shippingMethod as $item) {
                $method = new Meanbee_RoyalmailPHPLibrary_Src_Method();
                $method->countryCode = $country_code;
                $method->shippingMethodName = $item['shippingMethodName'];
                $method->minimumWeight = $item['minimumWeight'];
                $method->maximumWeight = $item['maximumWeight'];
                $method->methodPrice = $item['methodPrice'];
                $method->insuranceValue = $item['insuranceValue'];
                $method->shippingMethodNameClean = $item['shippingMethodNameClean'];

                if(isset($item['size'])){
                    $method->size = $item['size'];
                }

                $results[] = $method;
            }
        }
        return $results;
    }

    /**
     * Helper function to get the document root for csv files
     */
    public function getDocumentRoot()
    {
        $this->documentRoot = dirname(realpath(__FILE__)) . '/';
    }
}
