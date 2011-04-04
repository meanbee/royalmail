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

class Meanbee_Royalmail_Model_Shipping_Carrier_Royalmail_Firstclass
    extends Meanbee_Royalmail_Model_Shipping_Carrier_Royalmail_Abstract {

    public function getRates() {
        $rates = $this->_loadCsv('firstclass');

        if ($this->_getCountry() == 'GB') {
            return $rates;
        }

        return null;
    }

    /**
     * Any packages over 2kg will be sent here.  We can then add £2.80 to
     * each 2kg it is over.
     *
     * @param float Package weight
     * @return float Cost of delivery
     */
    protected function calculateRate($weight) {
        // Each additional 2kg or part thereof +280p
        $rates = $this->getRates();

        if ($weight > 20000) {
            return null;
        }
        
        if ($rates == null) {
            return null;
        }

        $last_rate = $rates[count($rates) - 1];

        $weight -= $last_rate['upper'];

        $calculated = 3.05 * ceil($weight / 2000);

        return $last_rate['cost'] + $calculated;
    }
}
