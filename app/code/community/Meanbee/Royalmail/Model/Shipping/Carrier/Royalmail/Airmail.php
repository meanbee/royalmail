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

class Meanbee_Royalmail_Model_Shipping_Carrier_Royalmail_Airmail
    extends Meanbee_Royalmail_Model_Shipping_Carrier_Royalmail_Abstract {

    /**
     * European Union Rates
     *
     * @return array rates
     */
    protected function _getEuRates() {
        $rates_eu = $this->_loadCsv("airmail_eu");

        return $rates_eu;
    }

    /**
     * Rest of the World Rates
     *
     * @return array rates
     */
    protected function _getRw1Rates() {
        $rates_rw = $this->_loadCsv("airmail_rw1");

        return $rates_rw;
    }

    /**
     * Rest of the World Rates
     *
     * @return array rates
     */
    protected function _getRw2Rates() {
        $rates_rw = $this->_loadCsv("airmail_rw2");

        return $rates_rw;
    }

    /**
     * Establish which rates to return
     *
     * @see http://www.royalmail.com/portal/rm/content3?catId=400036&mediaId=53600700
     * @return rates
     */
    protected function getRates() {
        $country = strtoupper($this->_getCountry());

        if ($country != 'GB') {
            switch ($this->getPostageArea()) {
                case 'eu':
                    return $this->_getEuRates();
                case 'rw2':
                    return $this->_getRw2Rates();
                case 'rw1':
                default:
                    return $this->_getRwRates1();
            }
        }

        return null;
    }

    /**
     * @param $weight
     * @return null|float
     */
    protected function calculateRate($weight) {
        $rates = $this->getRates();

        /**
         * Maxium package weight is 2kg
         *
         * @see http://www.royalmail.com/sites/default/files/Royal_Mail_Delivery_and_Collection_Services_Price_Guide_April2012.pdf
         */
        if ($weight > 2000) {
            return null;
        }

        if ($rates == null) {
            return null;
        }

        $last_rate = $rates[count($rates) - 1];

        $weight -= $last_rate['upper'];

        $calculated = $this->_getAdditionalWeightCharge() * ceil($weight / 100);

        return $last_rate['cost'] + $calculated;
    }

    protected function _getAdditionalWeightCharge() {
        switch ($this->getPostageArea()) {
            case 'eu':
                return 0.60;
            case 'rw1':
                return 1.08;
            case 'rw2':
            default:
                return 1.28;
        }
    }

    protected function getPostageArea() {
        $country = strtoupper($this->_getCountry());

        if ($country != 'GB') {
            switch ($country) {
                case 'AL': case 'AD': case 'AM': case 'AT': case 'AZ': case 'BY': case 'BE':
                case 'BA': case 'BG': case 'HR': case 'CY': case 'CZ': case 'DK': case 'EE':
                case 'FO': case 'FI': case 'FR': case 'GE': case 'DE': case 'GI': case 'GR':
                case 'GL': case 'HU': case 'IS': case 'IE': case 'IT': case 'KZ': case 'KG':
                case 'LV': case 'LI': case 'LT': case 'LU': case 'MK': case 'MT': case 'MD':
                case 'MC': case 'NL': case 'NO': case 'PL': case 'PT': case 'RO': case 'RU':
                case 'SM': case 'SK': case 'SI': case 'ES': case 'SE': case 'CH': case 'TJ':
                case 'TR': case 'TM': case 'UA': case 'UZ': case 'VA':
                    return 'eu';
                case 'AU': case 'NZ': case 'PG':
                    return 'rw2';
                default:
                    return 'rw1';
            }
        }

        return null;
    }
}
