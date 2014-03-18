<?php

class Meanbee_Royalmail_Test_Helper_Data extends EcomDev_PHPUnit_Test_Case {

    /**
     * @test
     */
    public function testGetCountryWorldZone() {
        $this->assertEquals('wz2', Mage::helper('royalmail')->getWorldZone('TO'));
    }
}