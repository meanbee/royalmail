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
            for ($i = 0; $i < count($rates); $i++) {
                $rates[$i]['cost'] += $this->_getExtraCharge();
            }

            return $rates;
        } else {
          return null;
        }
    }

    protected function _getExtraCharge() {
        if ($this->getPostageArea() == 'eu') {
            return 5.00;
        } else {
            return 5.40;
        }
    }

    /**
     * @see http://www.royalmail.com/personal/international-delivery/airsure#faq-19350048-19350039
     *
     * @return bool
     */
    protected function _validAirsureCountry() {
        $country = strtoupper($this->_getCountry());

        switch($country) {
            case 'AT': case 'BE': case 'DK': case 'EE': case 'FI': case 'FR': case 'DE': case 'LV':
            case 'LU': case 'MT': case 'NL': case 'PT': case 'IE': case 'ES': case 'SE':

            case 'AD':case 'FO': case 'IS': case 'LI': case 'MC': case 'CH':

            case 'AU': case 'BR': case 'CA': case 'HK': case 'MY': case 'SG': case 'NZ': case 'US':
                return true;
        }

        return false;
    }

    protected function _getMaximumCartTotal() {
        return 50;
    }
}
