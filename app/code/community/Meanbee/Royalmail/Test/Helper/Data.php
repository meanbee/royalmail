<?php

class Meanbee_Royalmail_Test_Helper_Data extends EcomDev_PHPUnit_Test_Case
{

    private $_dataHelper;

    public function setUp()
    {
        $this->_dataHelper = Mage::helper('royalmail');
    }

    public function tearDown()
    {
        $this->_dataHelper = null;
    }

    /**
     * @test
     */
    public function testGetWeightKg()
    {
        $this->_dataHelper->setWeightUnit('kg');
        $this->_dataHelper->_setWeight(0.02);
        $this->assertEquals(20.0, Mage::helper('royalmail')->_getWeight());
    }

    /**
     * @test
     */
    public function testGetWeightG()
    {
        $this->_dataHelper->setWeightUnit('g');
        $this->_dataHelper->_setWeight(0.02);
        $this->assertEquals(0.02, Mage::helper('royalmail')->_getWeight());
    }

    /**
     * @test
     */
    public function testGetWeightlb()
    {
        $this->_dataHelper->setWeightUnit('lb');
        $this->_dataHelper->_setWeight(0.02);
        $this->assertEquals(9.0718474000000011, Mage::helper('royalmail')->_getWeight());
    }
}