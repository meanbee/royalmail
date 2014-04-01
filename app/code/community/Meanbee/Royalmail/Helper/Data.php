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
    const INTERNATIONAL_SIGNED = 'international_signed';
    const INTERNATIONAL_TRACKED_AND_SIGNED = 'international_trackedsigned';
    const INTERNATIONAL_TRACKED = 'international_tracked';

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

    protected static $_internationalMethodAvailability = array(
        'AF' => array(self::INTERNATIONAL_SIGNED),
        'AX' => array(self::INTERNATIONAL_SIGNED),
        'AL' => array(self::INTERNATIONAL_SIGNED),
        'DZ' => array(self::INTERNATIONAL_SIGNED),
        'AD' => array(self::INTERNATIONAL_TRACKED_AND_SIGNED, self::INTERNATIONAL_TRACKED),
        'AO' => array(self::INTERNATIONAL_SIGNED),
        'AI' => array(self::INTERNATIONAL_SIGNED),
        'AG' => array(self::INTERNATIONAL_SIGNED),
        'AR' => array(self::INTERNATIONAL_TRACKED_AND_SIGNED),
        'AM' => array(self::INTERNATIONAL_SIGNED),
        'AW' => array(self::INTERNATIONAL_SIGNED),
        'AU' => array(self::INTERNATIONAL_TRACKED, self::INTERNATIONAL_SIGNED),
        'AT' => array(self::INTERNATIONAL_TRACKED_AND_SIGNED, self::INTERNATIONAL_TRACKED),
        'AZ' => array(self::INTERNATIONAL_SIGNED),
        'BS' => array(self::INTERNATIONAL_SIGNED),
        'BH' => array(self::INTERNATIONAL_SIGNED),
        'BD' => array(self::INTERNATIONAL_SIGNED),
        'BB' => array(self::INTERNATIONAL_SIGNED),
        'BY' => array(self::INTERNATIONAL_TRACKED_AND_SIGNED),
        'BE' => array(self::INTERNATIONAL_TRACKED_AND_SIGNED, self::INTERNATIONAL_TRACKED),
        'BZ' => array(self::INTERNATIONAL_SIGNED),
        'BJ' => array(self::INTERNATIONAL_SIGNED),
        'BM' => array(self::INTERNATIONAL_SIGNED),
        'BT' => array(self::INTERNATIONAL_SIGNED),
        'BO' => array(self::INTERNATIONAL_SIGNED),
        'BQ' => array(self::INTERNATIONAL_SIGNED),
        'BA' => array(self::INTERNATIONAL_SIGNED),
        'BW' => array(self::INTERNATIONAL_SIGNED),
        'BR' => array(self::INTERNATIONAL_TRACKED, self::INTERNATIONAL_SIGNED),
        'IO' => array(self::INTERNATIONAL_SIGNED),
        'VG' => array(self::INTERNATIONAL_SIGNED),
        'BN' => array(self::INTERNATIONAL_SIGNED),
        'BG' => array(self::INTERNATIONAL_TRACKED_AND_SIGNED),
        'BF' => array(self::INTERNATIONAL_SIGNED),
        'BI' => array(self::INTERNATIONAL_SIGNED),
        'KH' => array(self::INTERNATIONAL_SIGNED),
        'CM' => array(self::INTERNATIONAL_SIGNED),
        'CA' => array(self::INTERNATIONAL_TRACKED_AND_SIGNED, self::INTERNATIONAL_TRACKED),
        'CV' => array(self::INTERNATIONAL_SIGNED),
        'KY' => array(self::INTERNATIONAL_TRACKED_AND_SIGNED),
        'CF' => array(self::INTERNATIONAL_SIGNED),
        'TD' => array(self::INTERNATIONAL_SIGNED),
        'CL' => array(self::INTERNATIONAL_SIGNED),
        'CN' => array(self::INTERNATIONAL_SIGNED),
        'CX' => array(self::INTERNATIONAL_SIGNED),
        'CO' => array(self::INTERNATIONAL_SIGNED),
        'KM' => array(self::INTERNATIONAL_SIGNED),
        'CD' => array(self::INTERNATIONAL_SIGNED),
        'CG' => array(self::INTERNATIONAL_SIGNED),
        'CK' => array(self::INTERNATIONAL_SIGNED),
        'CR' => array(self::INTERNATIONAL_SIGNED),
        'HR' => array(self::INTERNATIONAL_TRACKED_AND_SIGNED, self::INTERNATIONAL_TRACKED),
        'CU' => array(self::INTERNATIONAL_SIGNED),
        'CW' => array(self::INTERNATIONAL_SIGNED),
        'CY' => array(self::INTERNATIONAL_SIGNED),
        'CZ' => array(self::INTERNATIONAL_TRACKED_AND_SIGNED),
        'DK' => array(self::INTERNATIONAL_TRACKED_AND_SIGNED, self::INTERNATIONAL_TRACKED),
        'DJ' => array(self::INTERNATIONAL_SIGNED),
        'DM' => array(self::INTERNATIONAL_SIGNED),
        'DO' => array(self::INTERNATIONAL_SIGNED),
        'EC' => array(self::INTERNATIONAL_TRACKED_AND_SIGNED),
        'EG' => array(self::INTERNATIONAL_SIGNED),
        'SV' => array(self::INTERNATIONAL_SIGNED),
        'GQ' => array(self::INTERNATIONAL_SIGNED),
        'ER' => array(self::INTERNATIONAL_SIGNED),
        'EE' => array(self::INTERNATIONAL_TRACKED, self::INTERNATIONAL_SIGNED),
        'ET' => array(self::INTERNATIONAL_SIGNED),
        'FK' => array(self::INTERNATIONAL_SIGNED),
        'FO' => array(self::INTERNATIONAL_SIGNED),
        'FJ' => array(self::INTERNATIONAL_SIGNED),
        'FI' => array(self::INTERNATIONAL_TRACKED_AND_SIGNED, self::INTERNATIONAL_TRACKED),
        'FR' => array(self::INTERNATIONAL_TRACKED_AND_SIGNED, self::INTERNATIONAL_TRACKED),
        'GF' => array(self::INTERNATIONAL_SIGNED),
        'PF' => array(self::INTERNATIONAL_SIGNED),
        'GA' => array(self::INTERNATIONAL_SIGNED),
        'GM' => array(self::INTERNATIONAL_SIGNED),
        'GE' => array(self::INTERNATIONAL_SIGNED),
        'DE' => array(self::INTERNATIONAL_TRACKED_AND_SIGNED, self::INTERNATIONAL_TRACKED),
        'GH' => array(self::INTERNATIONAL_SIGNED),
        'GI' => array(self::INTERNATIONAL_TRACKED_AND_SIGNED),
        'GR' => array(self::INTERNATIONAL_TRACKED_AND_SIGNED),
        'GL' => array(self::INTERNATIONAL_SIGNED),
        'GD' => array(self::INTERNATIONAL_SIGNED),
        'GP' => array(self::INTERNATIONAL_SIGNED),
        'GT' => array(self::INTERNATIONAL_SIGNED),
        'GN' => array(self::INTERNATIONAL_SIGNED),
        'GW' => array(self::INTERNATIONAL_SIGNED),
        'GY' => array(self::INTERNATIONAL_SIGNED),
        'HT' => array(self::INTERNATIONAL_SIGNED),
        'HN' => array(self::INTERNATIONAL_SIGNED),
        'HK' => array(self::INTERNATIONAL_TRACKED_AND_SIGNED, self::INTERNATIONAL_TRACKED),
        'HU' => array(self::INTERNATIONAL_TRACKED_AND_SIGNED, self::INTERNATIONAL_TRACKED),
        'IS' => array(self::INTERNATIONAL_TRACKED_AND_SIGNED, self::INTERNATIONAL_TRACKED),
        'IN' => array(self::INTERNATIONAL_TRACKED, self::INTERNATIONAL_SIGNED),
        'ID' => array(self::INTERNATIONAL_SIGNED),
        'IR' => array(self::INTERNATIONAL_SIGNED),
        'IQ' => array(self::INTERNATIONAL_SIGNED),
        'IE' => array(self::INTERNATIONAL_TRACKED_AND_SIGNED, self::INTERNATIONAL_TRACKED),
        'IL' => array(self::INTERNATIONAL_SIGNED),
        'IT' => array(self::INTERNATIONAL_TRACKED_AND_SIGNED),
        'JM' => array(self::INTERNATIONAL_SIGNED),
        'JP' => array(self::INTERNATIONAL_TRACKED_AND_SIGNED),
        'JO' => array(self::INTERNATIONAL_SIGNED),
        'KZ' => array(self::INTERNATIONAL_SIGNED),
        'KE' => array(self::INTERNATIONAL_SIGNED),
        'KI' => array(self::INTERNATIONAL_SIGNED),
        'KW' => array(self::INTERNATIONAL_SIGNED),
        'KG' => array(self::INTERNATIONAL_SIGNED),
        'LA' => array(self::INTERNATIONAL_SIGNED),
        'LV' => array(self::INTERNATIONAL_TRACKED, self::INTERNATIONAL_SIGNED),
        'LB' => array(self::INTERNATIONAL_SIGNED),
        'LS' => array(self::INTERNATIONAL_SIGNED),
        'LR' => array(self::INTERNATIONAL_SIGNED),
        'LY' => array(self::INTERNATIONAL_SIGNED),
        'LI' => array(self::INTERNATIONAL_TRACKED_AND_SIGNED, self::INTERNATIONAL_TRACKED),
        'LT' => array(self::INTERNATIONAL_TRACKED_AND_SIGNED, self::INTERNATIONAL_TRACKED),
        'LU' => array(self::INTERNATIONAL_TRACKED_AND_SIGNED, self::INTERNATIONAL_TRACKED),
        'MO' => array(self::INTERNATIONAL_SIGNED),
        'MK' => array(self::INTERNATIONAL_SIGNED),
        'MG' => array(self::INTERNATIONAL_SIGNED),
        'YT' => array(self::INTERNATIONAL_SIGNED),
        'MW' => array(self::INTERNATIONAL_SIGNED),
        'MY' => array(self::INTERNATIONAL_TRACKED, self::INTERNATIONAL_SIGNED),
        'MV' => array(self::INTERNATIONAL_SIGNED),
        'ML' => array(self::INTERNATIONAL_SIGNED),
        'MT' => array(self::INTERNATIONAL_TRACKED_AND_SIGNED, self::INTERNATIONAL_TRACKED),
        'MQ' => array(self::INTERNATIONAL_SIGNED),
        'MR' => array(self::INTERNATIONAL_SIGNED),
        'MU' => array(self::INTERNATIONAL_SIGNED),
        'MX' => array(self::INTERNATIONAL_SIGNED),
        'MD' => array(self::INTERNATIONAL_SIGNED),
        'MN' => array(self::INTERNATIONAL_SIGNED),
        'ME' => array(self::INTERNATIONAL_SIGNED),
        'MS' => array(self::INTERNATIONAL_SIGNED),
        'MA' => array(self::INTERNATIONAL_SIGNED),
        'MZ' => array(self::INTERNATIONAL_SIGNED),
        'MM' => array(self::INTERNATIONAL_SIGNED),
        'NA' => array(self::INTERNATIONAL_SIGNED),
        'NR' => array(self::INTERNATIONAL_SIGNED),
        'NP' => array(self::INTERNATIONAL_SIGNED),
        'NL' => array(self::INTERNATIONAL_TRACKED_AND_SIGNED, self::INTERNATIONAL_TRACKED),
        'NC' => array(self::INTERNATIONAL_SIGNED),
        'NZ' => array(self::INTERNATIONAL_TRACKED_AND_SIGNED, self::INTERNATIONAL_TRACKED),
        'NI' => array(self::INTERNATIONAL_SIGNED),
        'NE' => array(self::INTERNATIONAL_SIGNED),
        'NG' => array(self::INTERNATIONAL_SIGNED),
        'NU' => array(self::INTERNATIONAL_SIGNED),
        'KP' => array(),
        'NO' => array(self::INTERNATIONAL_SIGNED),
        'OM' => array(self::INTERNATIONAL_SIGNED),
        'PK' => array(self::INTERNATIONAL_SIGNED),
        'PW' => array(self::INTERNATIONAL_SIGNED),
        'PA' => array(self::INTERNATIONAL_SIGNED),
        'PG' => array(self::INTERNATIONAL_SIGNED),
        'PY' => array(self::INTERNATIONAL_SIGNED),
        'PE' => array(self::INTERNATIONAL_SIGNED),
        'PH' => array(self::INTERNATIONAL_SIGNED),
        'PN' => array(self::INTERNATIONAL_SIGNED),
        'PL' => array(self::INTERNATIONAL_TRACKED_AND_SIGNED, self::INTERNATIONAL_TRACKED),
        'PT' => array(self::INTERNATIONAL_TRACKED_AND_SIGNED, self::INTERNATIONAL_TRACKED),
        'PR' => array(self::INTERNATIONAL_SIGNED),
        'QA' => array(self::INTERNATIONAL_SIGNED),
        'RE' => array(self::INTERNATIONAL_SIGNED),
        'RO' => array(self::INTERNATIONAL_TRACKED_AND_SIGNED),
        'RU' => array(self::INTERNATIONAL_SIGNED),
        'RW' => array(self::INTERNATIONAL_SIGNED),
        'SM' => array(self::INTERNATIONAL_TRACKED_AND_SIGNED),
        'ST' => array(self::INTERNATIONAL_SIGNED),
        'SA' => array(self::INTERNATIONAL_SIGNED),
        'SN' => array(self::INTERNATIONAL_SIGNED),
        'RS' => array(self::INTERNATIONAL_SIGNED),
        'SC' => array(self::INTERNATIONAL_SIGNED),
        'SL' => array(self::INTERNATIONAL_SIGNED),
        'SG' => array(self::INTERNATIONAL_TRACKED_AND_SIGNED, self::INTERNATIONAL_TRACKED),
        'SK' => array(self::INTERNATIONAL_TRACKED_AND_SIGNED),
        'SI' => array(self::INTERNATIONAL_TRACKED_AND_SIGNED),
        'SB' => array(self::INTERNATIONAL_SIGNED),
        'ZA' => array(self::INTERNATIONAL_SIGNED),
        'KR' => array(self::INTERNATIONAL_TRACKED_AND_SIGNED),
        'SS' => array(self::INTERNATIONAL_SIGNED),
        'ES' => array(self::INTERNATIONAL_TRACKED, self::INTERNATIONAL_SIGNED),
        'LK' => array(self::INTERNATIONAL_SIGNED),
        'KN' => array(self::INTERNATIONAL_SIGNED),
        'LC' => array(self::INTERNATIONAL_SIGNED),
        'SX' => array(self::INTERNATIONAL_SIGNED),
        'VC' => array(self::INTERNATIONAL_SIGNED),
        'SD' => array(self::INTERNATIONAL_SIGNED),
        'SR' => array(self::INTERNATIONAL_SIGNED),
        'SZ' => array(self::INTERNATIONAL_SIGNED),
        'SE' => array(self::INTERNATIONAL_TRACKED_AND_SIGNED, self::INTERNATIONAL_TRACKED),
        'CH' => array(self::INTERNATIONAL_TRACKED_AND_SIGNED, self::INTERNATIONAL_TRACKED),
        'SY' => array(self::INTERNATIONAL_SIGNED),
        'TW' => array(self::INTERNATIONAL_SIGNED),
        'TJ' => array(self::INTERNATIONAL_SIGNED),
        'TZ' => array(self::INTERNATIONAL_SIGNED),
        'TH' => array(self::INTERNATIONAL_TRACKED_AND_SIGNED),
        'TL' => array(self::INTERNATIONAL_SIGNED),
        'TG' => array(self::INTERNATIONAL_SIGNED),
        'TK' => array(self::INTERNATIONAL_SIGNED),
        'TO' => array(self::INTERNATIONAL_SIGNED),
        'TT' => array(self::INTERNATIONAL_TRACKED_AND_SIGNED),
        'TN' => array(self::INTERNATIONAL_SIGNED),
        'TR' => array(self::INTERNATIONAL_SIGNED),
        'TM' => array(self::INTERNATIONAL_SIGNED),
        'TC' => array(self::INTERNATIONAL_SIGNED),
        'TV' => array(self::INTERNATIONAL_SIGNED),
        'UG' => array(self::INTERNATIONAL_SIGNED),
        'UA' => array(self::INTERNATIONAL_SIGNED),
        'AE' => array(self::INTERNATIONAL_SIGNED),
        'US' => array(self::INTERNATIONAL_TRACKED_AND_SIGNED, self::INTERNATIONAL_TRACKED),
        'UY' => array(self::INTERNATIONAL_SIGNED),
        'UZ' => array(self::INTERNATIONAL_SIGNED),
        'VU' => array(self::INTERNATIONAL_SIGNED),
        'VA' => array(self::INTERNATIONAL_TRACKED_AND_SIGNED),
        'VE' => array(self::INTERNATIONAL_SIGNED),
        'VN' => array(self::INTERNATIONAL_SIGNED),
        'WF' => array(self::INTERNATIONAL_SIGNED),
        'EH' => array(self::INTERNATIONAL_SIGNED),
        'WS' => array(self::INTERNATIONAL_SIGNED),
        'YE' => array(self::INTERNATIONAL_SIGNED),
        'ZM' => array(self::INTERNATIONAL_SIGNED),
        'ZW' => array(self::INTERNATIONAL_SIGNED)
    );

    protected function _isCountryAvailableForMethod($countryCode, $method) {
        if (isset(self::$_internationalMethodAvailability[$countryCode])) {
            if (in_array($method, self::$_internationalMethodAvailability[$countryCode])) {
                return true;
            }
        }
        return false;
    }

    public function isCountryAvailableForInternationalTrackedAndSigned($countryCode) {
        return $this->_isCountryAvailableForMethod($countryCode, self::INTERNATIONAL_TRACKED_AND_SIGNED);
    }

    public function isCountryAvailableForInternationalTracked($countryCode) {
        return $this->_isCountryAvailableForMethod($countryCode, self::INTERNATIONAL_TRACKED);
    }

    public function isCountryAvailableForInternationalSigned($countryCode) {
        return $this->_isCountryAvailableForMethod($countryCode, self::INTERNATIONAL_SIGNED);
    }

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
