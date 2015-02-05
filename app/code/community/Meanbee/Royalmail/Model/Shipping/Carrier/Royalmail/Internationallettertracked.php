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

class Meanbee_Royalmail_Model_Shipping_Carrier_Royalmail_Internationallettertracked
    extends Meanbee_Royalmail_Model_Shipping_Carrier_Royalmail_Abstract {

    protected $insureOver = 50;
    protected $additionalInsuranceChargeEu = 3.00;
    protected $additionalInsuranceChargeNonEu = 2.50;
    protected $additionalInsuranceChargeWz = 2.50;

    public function getRates() {
        $_helper = Mage::helper('royalmail');
        $country = $this->_getCountry();
        $worldZone = $_helper->getWorldZone($country);


        if (!$_helper->isCountryAvailableForInternationalTracked($country)) {
            return null;
        }


        switch($worldZone) {
            case Meanbee_Royalmail_Helper_Data::WORLD_ZONE_GB:
                return null;
            case Meanbee_Royalmail_Helper_Data::WORLD_ZONE_EU:
                $rates = $_helper->addInsuranceCharges(
                    $this->_getEuRates(),
                    $this->additionalInsuranceChargeEu,
                    $this->getCartTotal(),
                    $this->insureOver
                );
                break;
            case Meanbee_Royalmail_Helper_Data::WORLD_ZONE_NONEU:
                $rates = $_helper->addInsuranceCharges(
                    $this->_getNonEuRates(),
                    $this->additionalInsuranceChargeNonEu,
                    $this->getCartTotal(),
                    $this->insureOver
                );
                break;
            case Meanbee_Royalmail_Helper_Data::WORLD_ZONE_ONE:
            case Meanbee_Royalmail_Helper_Data::WORLD_ZONE_TWO:
                $rates = $_helper->addInsuranceCharges(
                    $this->_getWzRates(),
                    $this->additionalInsuranceChargeWz,
                    $this->getCartTotal(),
                    $this->insureOver
                );
                break;
            default:
                return null;
        }
        return $rates;
    }

    protected function _getEuRates() {
        return $this->_loadCsv('internationallettertracked_eu');
    }

    protected function _getNonEuRates() {
        return $this->_loadCsv('internationallettertracked_noneu');
    }

    protected function _getWzRates() {
        return $this->_loadCsv('internationallettertracked_wz');
    }

}