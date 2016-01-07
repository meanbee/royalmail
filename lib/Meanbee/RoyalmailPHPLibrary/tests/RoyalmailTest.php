<?php

class Meanbee_RoyalmailPHPLibrary_tests_RoyalmailTest extends PHPUnit_Framework_TestCase
{

    private $calculateMethodClass;
    private $dataClass;
    private $emptyArray;
    private $testDataClassArray;

    /**
     * Setup the necessary classes and data
     */
    public function setUp()
    {
        $this->calculateMethodClass = new CalculateMethod();
        $this->dataClass = new Data(
            $this->calculateMethodClass->_csvCountryCode,
            $this->calculateMethodClass->_csvZoneToDeliverMethod,
            $this->calculateMethodClass->_csvDeliveryMethodMeta,
            $this->calculateMethodClass->_csvDeliveryToPrice,
            $this->calculateMethodClass->_csvCleanNameToMethod,
            $this->calculateMethodClass->_csvCleanNameMethodGroup
        );

        $this->emptyArray = array();
        $this->testDataClassArray = Array
        (
            0 => Array
            (
                'shippingMethodName'      => 'WORLD_ZONE_EU_INTERNATIONAL_TRACKED_AND_SIGNED_LETTER',
                'minimumWeight'           => 0.021,
                'maximumWeight'           => 0.100,
                'methodPrice'             => 6.52,
                'insuranceValue'          => 50,
                'shippingMethodNameClean' => 'Royal Mail International Tracked and Signed Letter'
            ),
            1 => Array
            (
                'shippingMethodName'      => 'WORLD_ZONE_EU_INTERNATIONAL_TRACKED_AND_SIGNED_LARGE_LETTER',
                'minimumWeight'           => 0.001,
                'maximumWeight'           => 0.100,
                'methodPrice'             => 08.10,
                'insuranceValue'          => 50,
                'shippingMethodNameClean' => 'Royal Mail International Tracked and Signed Large Letter'
            ),
            2 => Array
            (
                'shippingMethodName'      => 'WORLD_ZONE_EU_INTERNATIONAL_SIGNED_LETTER',
                'minimumWeight'           => 0.020,
                'maximumWeight'           => 0.100,
                'methodPrice'             => 6.52,
                'insuranceValue'          => 50,
                'shippingMethodNameClean' => 'Royal Mail International Signed'
            ),
            3 => Array
            (
                'shippingMethodName'      => 'UK_GUARANTEED_ROYAL_MAIL_SPECIAL_DELIVER_1PM',
                'minimumWeight'           => 0.001,
                'maximumWeight'           => 0.100,
                'methodPrice'             => 6.45,
                'insuranceValue'          => 500,
                'shippingMethodNameClean' => 'Royal Mail Special Delivery: Guaranteed by 1pm'
            ),
            4 => Array
            (
                'shippingMethodName'      => 'UK_GUARANTEED_ROYAL_MAIL_SPECIAL_DELIVER_1PM',
                'minimumWeight'           => 0.001,
                'maximumWeight'           => 0.100,
                'methodPrice'             => 7.45,
                'insuranceValue'          => 1000,
                'shippingMethodNameClean' => 'Royal Mail Special Delivery: Guaranteed by 1pm'
            ),
            5 => Array
            (
                'shippingMethodName'      => 'UK_GUARANTEED_ROYAL_MAIL_SPECIAL_DELIVER_1PM',
                'minimumWeight'           => 0.001,
                'maximumWeight'           => 0.100,
                'methodPrice'             => 9.45,
                'insuranceValue'          => 2500,
                'shippingMethodNameClean' => 'Royal Mail Special Delivery: Guaranteed by 1pm'
            ),
            6 => Array
            (
                'shippingMethodName'      => 'UK_STANDARD_FIRST_CLASS_LETTER',
                'minimumWeight'           => 0.001,
                'maximumWeight'           => 0.100,
                'methodPrice'             => 0.63,
                'insuranceValue'          => 20,
                'shippingMethodNameClean' => 'Royal Mail Standard First Class Letter'
            )

        );
    }

    /**
     * Cleans up the used classes
     */
    public function tearDown()
    {
        $this->calculateMethodClass = null;
        $this->dataClass = null;
    }

    /**
     * Test to ensure that the calculate method class is returning
     */
    public function testRoyalMailClassRealValues()
    {
        $this->assertNotEmpty($this->calculateMethodClass->getMethods('GB', 20, 0.050));
    }

    /**
     * Test to compare the returned data from the Data class to expected values
     */
    public function testRoyalMailMethodRealValues()
    {
        $this->assertEquals($this->testDataClassArray, $this->dataClass->calculateMethods('GB', 19.99, 0.050));
    }

    /**
     * Test to ensure the only the expected empty array is returned from incorrect data to the data class
     */
    public function testRoyalMailMethodFake()
    {
        $this->assertEquals($this->emptyArray, $this->dataClass->calculateMethods('GASD', "aSDASD", "ASDASD"));
        $this->assertEquals($this->emptyArray, $this->dataClass->calculateMethods(123123123, "asdasd", "asdadasd"));
        $this->assertEquals($this->emptyArray, $this->dataClass->calculateMethods(123123, 123123, "ASDASD"));
        $this->assertEquals($this->emptyArray, $this->dataClass->calculateMethods(123123123, 123123123, 123123123));
        $this->assertEquals($this->emptyArray, $this->dataClass->calculateMethods('GB', "aSD!!ASD", 0.100));
        $this->assertEquals($this->emptyArray, $this->dataClass->calculateMethods('GB', 123123123123, 0.100));
    }

    /**
     * Test to ensure that only the expected empty array is returned from null and incorrect data
     * from the Data class
     */
    public function testRoyalMailMethodNull()
    {
        $this->assertEquals($this->emptyArray, $this->dataClass->calculateMethods(null, 123123123123, 0.100));
        $this->assertEquals($this->emptyArray, $this->dataClass->calculateMethods(null, null, 0.100));
        $this->assertEquals($this->emptyArray, $this->dataClass->calculateMethods('GB', null, 0.100));
        $this->assertEquals($this->emptyArray, $this->dataClass->calculateMethods('GB', null, null));
        $this->assertEquals($this->emptyArray, $this->dataClass->calculateMethods('GB', 123123123123, null));
        $this->assertEquals($this->emptyArray, $this->dataClass->calculateMethods(null, null, null));
    }

    /**
     * Test to ensure that only the expected empty array is returned from incorrect
     * data from the CalculateMethod class
     */
    public function testRoyalMailClassFake()
    {
        $this->assertEquals(
            $this->emptyArray,
            $this->calculateMethodClass->getMethods('GASD', "aSDASD", "ASDASD"));
        $this->assertEquals(
            $this->emptyArray,
            $this->calculateMethodClass->getMethods(123123123, "asdasd", "asdadasd"));
        $this->assertEquals(
            $this->emptyArray,
            $this->calculateMethodClass->getMethods(123123, 123123, "ASDASD"));
        $this->assertEquals(
            $this->emptyArray,
            $this->calculateMethodClass->getMethods(123123123, 123123123, 123123123));
        $this->assertEquals(
            $this->emptyArray,
            $this->calculateMethodClass->getMethods('GB', "aSD!!ASD", 0.100));
        $this->assertEquals(
            $this->emptyArray,
            $this->calculateMethodClass->getMethods('GB', 123123123123, 0.100));
    }

    /**
     * Test to ensure that only the expected empty array is returned from null
     * and incorrect data from the CalculateMethod class
     */
    public function testRoyalMailClassNull()
    {
        $this->assertEquals($this->emptyArray, $this->calculateMethodClass->getMethods(null, 123123123123, 0.100));
        $this->assertEquals($this->emptyArray, $this->calculateMethodClass->getMethods(null, null, 0.100));
        $this->assertEquals($this->emptyArray, $this->calculateMethodClass->getMethods('GB', null, 0.100));
        $this->assertEquals($this->emptyArray, $this->calculateMethodClass->getMethods('GB', null, null));
        $this->assertEquals($this->emptyArray, $this->calculateMethodClass->getMethods('GB', 123123123123, null));
        $this->assertEquals($this->emptyArray, $this->calculateMethodClass->getMethods(null, null, null));
    }

}