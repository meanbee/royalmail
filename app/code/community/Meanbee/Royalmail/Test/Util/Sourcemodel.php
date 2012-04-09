<?php
abstract class Meanbee_Royalmail_Test_Util_Sourcemodel extends EcomDev_PHPUnit_Test_Case {
    public function testCorrectFormat() {
        $options = $this->_model->toOptionArray();

        $this->assertTrue(is_array($options), 'Should return an array');
        $this->assertGreaterThan(0, count($options));

        foreach ($options as $option) {
            $this->assertTrue(is_array($option), 'Each option should be an array');
            $this->assertEquals(2, count($option));
            $this->assertArrayHasKey('value', $option);
            $this->assertArrayHasKey('label', $option);
            $this->assertTrue(is_string($option['value']));
            $this->assertTrue(is_string($option['label']));
        }
    }
}
