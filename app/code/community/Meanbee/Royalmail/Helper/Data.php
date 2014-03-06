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

    public function addAdditionalCharges($rates, $charge, $weight, $chargePer = 250) {
        for($i = 0; $i < count($rates); $i++) {
            if($weight > $rates[$i]['upper']) {
                $additional = ceil(((($weight - $rates[$i]['upper']) / $chargePer) * $charge * 100))/2;
                $rates[$i]['cost'] += $additional;
            }
        }
        return $rates;
    }

    public function addInsuranceCharges($rates, $charge, $cartTotal, $valueOver = 50) {
        if($cartTotal > $valueOver) {
            for($i = 0; $i < count($rates); $i++) {
                $rates[$i]['cost'] += $charge;
            }
        }
        return $rates;
    }

    public function getWorldZone($countryCode) {
        $country = strtoupper($countryCode);
        if ($country != 'GB') {
            switch ($country) {
                /**
                 * Countries defined by Royal Mail, but not by Magento.
                 * - Azores
                 * - Balearic Islands
                 * - Canary Islands
                 * - Corsica
                 * - Kosovo
                 * - Madeira
                 * - Belau
                 * - Norwegian Antarctic Territory
                 *
                 * Notes: Serbia and Montenegro = Serbia = Montenegro
                 * Notes: Cocos Islands = Keeling = COCOS (KEELING) ISLANDS
                 * Notes: MACAU = Macao
                 */
                case 'DK': case 'EE': case 'LV': case 'AT': case 'FI':
                case 'LT': case 'SK': case 'FR': case 'LU': case 'SI':
                case 'ES': case 'DE': case 'SE': case 'GI': case 'MT':
                case 'BE': case 'GR': case 'MC': case 'BG': case 'HU':
                case 'NL': case 'IE': case 'HR': case 'IT': case 'PL':
                case 'CY': case 'PT': case 'CZ': case 'RO':
                    return 'eu';
                case 'SM': case 'AM': case 'FO': case 'LI': case 'RS':
                case 'XK': case 'KZ': case 'VA': case 'NO': case 'UZ':
                case 'UA': case 'ME': case 'TM': case 'IS': case 'TR':
                case 'MD': case 'TJ': case 'BA': case 'GL': case 'CH':
                case 'BY': case 'GE': case 'MK': case 'AZ': case 'KG':
                case 'RU': case 'AD': case 'AL':
                    return 'noneu';
                case 'AU': case 'PW': case 'IO': case 'CX': case 'CC':
                case 'CK': case 'FJ': case 'PF': case 'TF': case 'KI':
                case 'MO': case 'NR': case 'NC': case 'NZ': case 'NU':
                case 'NF': case 'PG': case 'LA': case 'PN': case 'SG':
                case 'SB': case 'TK': case 'TO': case 'TV': case 'AS':
                case 'WS':
                    return 'wz2';
                default:
                    return 'wz1';
            }
        }
        return null;
    }
}
