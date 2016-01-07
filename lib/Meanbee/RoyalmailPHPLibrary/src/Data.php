<?php

class Meanbee_RoyalmailPHPLibrary_Data
{

    // Constants to link to the appropriate columns in the CSV files
    const COUNTRY_CODE = 0;
    const WORLD_ZONE = 0;
    const SHIPPING_METHOD = 0;
    const METHOD_MIN_VALUE = 1;
    const METHOD_MAX_VALUE = 2;
    const METHOD_MIN_WEIGHT = 1;
    const METHOD_MAX_WEIGHT = 2;
    const METHOD_PRICE = 3;
    const METHOD_INSURANCE_VALUE = 4;
    const METHOD_NAME_CLEAN = 4;
    const METHOD_SIZE = 5;

    // Maps the method group name to the clean name and
    // the related method
    public $mappingCleanNameToMethod = array();

    // Maps the method group name to the clean name, to
    // allow for printing just the clean names to the user
    public $mappingCleanNameMethodGroup = array();

    // 1st array used, stores the csv of country to zone
    private $mappingCountryToZone = array();

    // 2nd array used, stores the csv of zone to method
    private $mappingZoneToMethod = array();

    // 3rd array used, stores the csv of shipping method
    // to the meta information. This includes the insurance
    // amount, and the corresponding price levels
    public $mappingMethodToMeta = array();

    // 4th array used, stores the csv of the delivery method
    // to the weight and price
    private $mappingDeliveryToPrice = array();

    // Array to temporarily hold the sorted country code methods
    private $sortedCountryCodeMethods = array();

    // Array to temporarily hold the sorted world zone to methods
    private $sortedZoneToMethods = array();

    // Array to temporarily hold the sorted method meta data
    private $sortedMethodToMeta = array();

    // Array to temporarily hold the sorted methods
    private $sortedDeliveryToPrices = array();

    public function __construct(
        $_csvCountryCode,
        $_csvZoneToDeliverMethod,
        $_csvDeliveryMethodMeta,
        $_csvDeliveryToPrice,
        $_csvCleanNameToMethod,
        $_csvCleanNameMethodGroup
    ) {
        $this->mappingCountryToZone = $this->csvToArray($_csvCountryCode);
        $this->mappingZoneToMethod = $this->csvToArray($_csvZoneToDeliverMethod);
        $this->mappingMethodToMeta = $this->csvToArray($_csvDeliveryMethodMeta);
        $this->mappingDeliveryToPrice = $this->csvToArray($_csvDeliveryToPrice);
        $this->mappingCleanNameToMethod = $this->csvToArray($_csvCleanNameToMethod);
        $this->mappingCleanNameMethodGroup = $this->csvToArray($_csvCleanNameMethodGroup);
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
    public function calculateMethods($country_code, $package_value, $package_weight)
    {
        $this->sortedCountryCodeMethods = array(
            $this->getCountryCodeData(
                $country_code,
                $this->mappingCountryToZone
            )
        );

        $this->sortedZoneToMethods = array(
            $this->getZoneToMethod(
                $this->sortedCountryCodeMethods,
                $this->mappingZoneToMethod
            )
        );

        $this->sortedMethodToMeta = array(
            $this->getMethodToMeta(
                $package_value,
                $this->sortedZoneToMethods,
                $this->mappingMethodToMeta
            )
        );

        $this->sortedDeliveryToPrices =
            $this->getMethodToPrice(
                $package_weight,
                $this->sortedMethodToMeta,
                $this->mappingDeliveryToPrice

            );

        return $this->sortedDeliveryToPrices;
    }

    /**
     *
     * Method to return a 2d array of world zones a country
     * (by its country code) is located in.
     *
     * @param $country_code
     * @param $mappingCountryToZone
     *
     * @return array
     */
    private function getCountryCodeData($country_code, $mappingCountryToZone)
    {
        // Get All array items that match the country code
        $countryCodeData = array();
        foreach ($mappingCountryToZone as $item) {
            if (isset($item[self::COUNTRY_CODE]) && $item[self::COUNTRY_CODE] == $country_code) {
                foreach ($item as $keys) {
                    $countryCodeData[] = $keys;
                }
            }
        }

        // Clean up the array removing excess values
        foreach ($countryCodeData as $key => $value) {
            if ($value == $country_code) {
                unset($countryCodeData[$key]);
            }
        }

        $countryCodeData = array_values($countryCodeData);

        return $countryCodeData;
    }

    /**
     * Method to return a 2d array of possible delivery methods based
     * on the given world zones a country is in.
     *
     * @param $sortedCountryCodeMethods
     * @param $mappingZoneToMethod
     *
     * @return array
     */
    private function getZoneToMethod($sortedCountryCodeMethods, $mappingZoneToMethod)
    {
        $mappingZoneData = array();
        foreach ($sortedCountryCodeMethods as $key => $value) {
            foreach ($value as $zone) {
                foreach ($mappingZoneToMethod as $item) {
                    if (isset($item[self::WORLD_ZONE]) && $item[self::WORLD_ZONE] == $zone) {
                        foreach ($item as $keys) {
                            $mappingZoneData[] = $keys;
                        }

                    }
                }
            }
        }

        // Clean up the array removing excess values
        foreach ($sortedCountryCodeMethods as $item => $itemValue) {
            foreach ($itemValue as $zone) {
                foreach ($mappingZoneData as $key => $value) {
                    if ($value == $zone) {
                        unset($mappingZoneData[$key]);
                    }
                }
            }

        }

        $mappingZoneData = array_values($mappingZoneData);

        return $mappingZoneData;
    }

    /**
     * Method to return a 2d array of the meta data for each
     * given allowed shipping method and the given package
     * value.
     *
     * @param $packageValue
     * @param $sortedZoneToMethods
     * @param $mappingMethodToMeta
     *
     * @return array
     */
    private function getMethodToMeta($packageValue, $sortedZoneToMethods, $mappingMethodToMeta)
    {
        $mappingZoneMethodData = array();
        foreach ($sortedZoneToMethods as $key => $value) {
            foreach ($value as $method) {
                foreach ($mappingMethodToMeta as $item) {
                    if (isset($item[self::SHIPPING_METHOD]) && $item[self::SHIPPING_METHOD] == $method) {
                        if ($packageValue >= $item[self::METHOD_MIN_VALUE] && $packageValue <= $item[self::METHOD_MAX_VALUE]) {
                            $mappingZoneMethodData[] = array($item);
                        }

                    }
                }
            }
        }

        $mappingZoneMethodData = array_values($mappingZoneMethodData);

        return $mappingZoneMethodData;
    }

    /**
     * Method to return a 2d array of sorted shipping methods based on
     * the weight of the item and the allowed shipping methods. Returns
     * a 2d array to be converting into objects by the RoyalMailMethod
     * class. Also adds the pretty text from the meta table to the
     * correct shipping method, to allow for less text in the delivery
     * to price csv.
     *
     * @param $package_weight
     * @param $sortedMethodToMeta
     * @param $mappingDeliveryToPrice
     *
     * @return array
     */
    private function getMethodToPrice($package_weight, $sortedMethodToMeta, $mappingDeliveryToPrice)
    {
        $mappingDeliveryToPriceData = array();
        foreach ($sortedMethodToMeta as $method) {
            foreach ($method as $meta) {
                foreach ($meta as $key => $value) {
                    foreach ($value as $methodData) {
                        foreach ($mappingDeliveryToPrice as $item) {
                            if (isset($item[self::SHIPPING_METHOD]) && $item[self::SHIPPING_METHOD] == $methodData) {
                                if ($package_weight >= $item[self::METHOD_MIN_WEIGHT] && $package_weight <= $item[self::METHOD_MAX_WEIGHT]) {
                                    $resultArray = array(
                                        'shippingMethodName'      => $item[self::SHIPPING_METHOD],
                                        'minimumWeight'           => $item[self::METHOD_MIN_WEIGHT],
                                        'maximumWeight'           => $item[self::METHOD_MAX_WEIGHT],
                                        'methodPrice'             => $item[self::METHOD_PRICE],
                                        'insuranceValue'          => $item[self::METHOD_INSURANCE_VALUE],
                                        'shippingMethodNameClean' => $value[self::METHOD_NAME_CLEAN]
                                    );

                                    if (isset($item[self::METHOD_SIZE])) {
                                        $resultArray['size'] = $item[self::METHOD_SIZE];
                                    }

                                    $mappingDeliveryToPriceData[] = $resultArray;

                                }
                            }
                        }
                    }
                }
            }
        }

        $mappingDeliveryToPriceData = array_values($mappingDeliveryToPriceData);

        return $mappingDeliveryToPriceData;
    }

    /**
     * Reads the given csv in to a 2d array
     *
     * @param string $filename
     * @param string $delimiter
     *
     * @return array
     * @throws \Exception
     */
    private function csvToArray($filename = '', $delimiter = ',')
    {
        if (!file_exists($filename) || !is_readable($filename)) {
            throw new \Exception("Unable to load the Royal Mail price data csv for '$filename'.
            Ensure that the data folder contains all the necessary csvs.");
        }

        $header = null;
        $data = array();
        if (($handle = fopen($filename, 'r')) !== false) {
            while (($row = fgetcsv($handle, 1000, $delimiter)) !== false) {
                $data[] = $row;
            }
            fclose($handle);
        }
        return $data;
    }
}