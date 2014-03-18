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

class Meanbee_Royalmail_Helper_Data extends Mage_Core_Helper_Abstract {

    const WORLD_ZONE_EU = 'eu';
    const WORLD_ZONE_NONEU = 'noneu';
    const WORLD_ZONE_ONE = 'wz1';
    const WORLD_ZONE_TWO = 'wz2';

    protected $_worldZoneEu = array(
        'DK', 'EE', 'LV', 'AT', 'FI',
        'LT', 'SK', 'FR', 'LU', 'SI',
        'ES', 'DE', 'SE', 'GI', 'MT',
        'BE', 'GR', 'MC', 'BG', 'HU',
        'NL', 'IE', 'HR', 'IT', 'PL',
        'CY', 'PT', 'CZ', 'RO');
    protected  $_worldZoneNonEu = array(
        'SM', 'AM', 'FO', 'LI', 'RS',
        'XK', 'KZ', 'VA', 'NO', 'UZ',
        'UA', 'ME', 'TM', 'IS', 'TR',
        'MD', 'TJ', 'BA', 'GL', 'CH',
        'BY', 'GE', 'MK', 'AZ', 'KG',
        'RU', 'AD', 'AL');
    protected  $_worldZone2 = array(
        'AU', 'PW', 'IO', 'CX', 'CC',
        'CK', 'FJ', 'PF', 'TF', 'KI',
        'MO', 'NR', 'NC', 'NZ', 'NU',
        'NF', 'PG', 'LA', 'PN', 'SG',
        'SB', 'TK', 'TO', 'TV', 'AS',
        'WS');

    /**
     * RoyalMail allow weights over their upper limit, and usually charge per additional 250g.
     * This is a helper to add those charges onto the rates supplied.
     *
     * @param $rates
     * @param $charge
     * @param $weight
     * @param int $chargePer
     * @return mixed
     */
    public function addAdditionalWeightCharges($rates, $charge, $weight, $chargePer = 250) {
        for($i = 0; $i < count($rates); $i++) {
            if($weight > $rates[$i]['upper']) {
                $additional = ceil(((($weight - $rates[$i]['upper']) / $chargePer) * $charge * 100)) / 100;
                $rates[$i]['cost'] += $additional;
            }
        }
        return $rates;
    }

    /**
     * A simple helper to add the insurance charges on top of the rates supplied.
     * RoyalMail will compensate an item up to a certain value, but this costs extra for more cover.
     *
     * @param $rates
     * @param $charge
     * @param $cartTotal
     * @param int $valueOver
     * @return mixed
     */
    public function addInsuranceCharges($rates, $charge, $cartTotal, $valueOver = 50) {
        if($cartTotal > $valueOver) {
            for($i = 0; $i < count($rates); $i++) {
                $rates[$i]['cost'] += $charge;
            }
        }
        return $rates;
    }

    /**
     * Figure out what World Zone a country is in, as defined by RoyalMail
     * Used on International Rates.
     *
     * @param $countryCode
     * @return null|string
     */
    public function getWorldZone($countryCode) {
        $country = strtoupper($countryCode);
        if ($country != 'GB') {
            if (in_array($country, $this->_worldZoneEu)) {
                return self::WORLD_ZONE_EU;
            } else if (in_array($country, $this->_worldZoneNonEu)) {
                return self::WORLD_ZONE_NONEU;
            } else if (in_array($country, $this->_worldZone2)) {
                return self::WORLD_ZONE_TWO;
            } else {
                return self::WORLD_ZONE_ONE;
            }
        }
        return null;
    }
}
