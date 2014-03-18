<?php
/**
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Open Software License (OSL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://opensource.org/licenses/osl-3.0.php
 *
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to support@meanbee.com so we can send you a copy immediately.
 *
 * @category   Meanbee
 * @package    Meanbee_Royalmail
 * @copyright  Copyright (c) 2014 Meanbee Internet Solutions (http://www.meanbee.com)
 * @license    http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */

class Meanbee_Royalmail_Model_Shipping_Carrier_Royalmail_Internationaltracked
    extends Meanbee_Royalmail_Model_Shipping_Carrier_Royalmail_Abstract {

    protected $additionalChargeEu = 1.74;
    protected $additionalChargeNonEu = 1.45;
    protected $additionalChargeWz1 = 2.70;
    protected $additionalChargeWz2 = 2.85;
    protected $maxWeight = 5000;
    protected $insureOver = 50;
    protected $additionalInsuranceChargeEu = 3;
    protected $additionalInsuranceChargeNonEu = 2.50;
    protected $additionalInsuranceChargeWz1 = 2.50;
    protected $additionalInsuranceChargeWz2 = 2.50;

    public function getRates() {
        $_helper = Mage::helper('royalmail');
        $country = $this->_getCountry();
        $worldZone = $_helper->getWorldZone($country);
        $weight = $this->_getWeight();

        if($weight > $this->maxWeight) {
            return null;
        }

        if($country != 'GB') {
            switch($worldZone) {
                case 'eu':
                    $rates = $_helper->addAdditionalWeightCharges(
                        $_helper->addInsuranceCharges(
                            $this->_getEuRates(),
                            $this->additionalInsuranceChargeEu,
                            $this->getCartTotal(),
                            $this->insureOver
                        ),
                        $this->additionalChargeEu,
                        $weight
                    );
                    break;
                case 'noneu':
                    $rates = $_helper->addAdditionalWeightCharges(
                        $_helper->addInsuranceCharges(
                            $this->_getNonEuRates(),
                            $this->additionalInsuranceChargeNonEu,
                            $this->getCartTotal(),
                            $this->insureOver
                        ),
                        $this->additionalChargeNonEu,
                        $weight
                    );
                    break;
                case 'wz1':
                    $rates = $_helper->addAdditionalWeightCharges(
                        $_helper->addInsuranceCharges(
                            $this->_getWz1Rates(),
                            $this->additionalInsuranceChargeWz1,
                            $this->getCartTotal(),
                            $this->insureOver
                        ),
                        $this->additionalChargeWz1,
                        $weight
                    );
                    break;
                case 'wz2':
                    $rates = $_helper->addAdditionalWeightCharges(
                        $_helper->addInsuranceCharges(
                            $this->_getWz2Rates(),
                            $this->additionalInsuranceChargeWz2,
                            $this->getCartTotal(),
                            $this->insureOver
                        ),
                        $this->additionalChargeWz2,
                        $weight
                    );
                    break;
            }
            return $rates;
        }
        return null;
    }

    public function calculateRate($weight) {
        if($weight <= $this->maxWeight) {
            $rates = $this->getRates();
            return $rates[count($rates)-1]['cost'];
        }
        return null;
    }

    protected function _getEuRates() {
        return $this->_loadCsv('internationaltracked_eu');
    }

    protected function _getNonEuRates() {
        return $this->_loadCsv('internationaltracked_noneu');
    }

    protected function _getWz1Rates() {
        return $this->_loadCsv('internationaltracked_wz1');
    }

    protected function _getWz2Rates() {
        return $this->_loadCsv('internationaltracked_wz2');
    }
}