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
 * @copyright  Copyright (c) 2008 Meanbee Internet Solutions (http://www.meanbee.com)
 * @license    http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */

class Meanbee_Royalmail_Model_Shipping_Carrier_Royalmail_Airsure
    extends Meanbee_Royalmail_Model_Shipping_Carrier_Royalmail_Airmail {

    protected function getRates() {
        $rates = parent::getRates();

        if ($rates == null) {
            return null;
        }

        if ($this->_validAirsureCountry()) {
            if ($this->getPostageArea() == 'eu') {
                return $this->_loadCsv('airsure_eu');
            } else {
                for ($i = 0; $i < count($rates); $i++) {
                  $rates[$i]['cost'] += $this->_getExtraCharge();
                }
                return $rates;
            }
        } else {
          return null;
        }
    }


    protected function calculateRate($weight) {
        if ($weight <= 2000) {
            if ($this->getPostageArea() == 'eu') {
                $rates = $this->getRates();

                if ($rates == null) {
                    return null;
                }

                $last_rate = $rates[count($rates) - 1];

                $weight -= $last_rate['upper'];

                $calculated = $this->_getExtraCharge() * ceil($weight / 100);

                return $last_rate['cost'] + $calculated;

            } else if ($this->_validAirsureCountry()) {
                return parent::calculateRate($weight);
            }
        }

        return null;
    }

    protected function _getExtraCharge() {
        if ($this->getPostageArea() == 'eu') {
            return 0.72;
        } else {
            return 5.40;
        }
    }

    protected function _validAirsureCountry() {
        $country = strtoupper($this->_getCountry());

        switch($country) {
            case 'AD': case 'AT': case 'BE': case 'DK': case 'FO': case 'FI': case 'FR': case 'DE':
            case 'IS': case 'LI': case 'LU': case 'MC': case 'NL': case 'PT': case 'IE': case 'SK':
            case 'ES': case 'SE': case 'CH':

            case 'BR': case 'CA': case 'HK': case 'MY': case 'SG':
            case 'US':

            case 'NZ':
                return true;
                break;
            default:
                return false;
                break;
        }
    }

    protected function _getMaximumCartTotal() {
        return 36;
    }
}
