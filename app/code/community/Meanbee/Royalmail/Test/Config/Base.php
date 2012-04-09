<?php
class Meanbee_Royalmail_Test_Config_Base extends EcomDev_PHPUnit_Test_Case_Config {
    public function testValidCodepool() {
        $this->assertModuleCodePool('community');
    }
}
