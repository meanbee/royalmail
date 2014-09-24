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

class Meanbee_Royalmail_Model_Shipping_Carrier_Royalmail_Specialdelivery9am
    extends Meanbee_Royalmail_Model_Shipping_Carrier_Royalmail_Abstract {

    protected function getRates() {
        $helper = Mage::helper('royalmail');
        $rates = $this->_getRatesCsv();

        if ($helper->getWorldZone($this->_getCountry()) == 'gb' && $this->_getCountry() != "GG") {
            return $rates;
        }

        return null;
    }

    protected function _getRatesCsv() {
        $total = $this->getCartTotal();
        if ($total <= 50) {
            return $this->_loadCsv('9am50');
        } else if ($total <= 1000) {
            return $this->_loadCsv('9am1000');
        } else if ($total <= 2500) {
            return $this->_loadCsv('9am2500');
        }
        return null;
    }
}
