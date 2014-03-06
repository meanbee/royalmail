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

abstract class Meanbee_Royalmail_Model_Shipping_Carrier_Royalmail_Abstract {

    protected $_country = '';
    protected $_weight = 0;
    protected $_weight_unit = '';
    protected $_cart_total = 0;
    protected $_negative_weight = 0; // Weight to take off in the case of free shipping

    /**
     * @return array Array of rates and upper boundaries, e.g.
     */
    abstract protected function getRates();

    /**
     * There may be an algo for calculating the cost of shipping, so
     * if we do not get a match on the rates.. we should call this.
     *
     * @param float Weight of the package
     * @return mixed Null if not found, a cost if it is
     */
    protected function calculateRate($weight) {
        return null;
    }

    /**
     * Some methods should only be enabled after above a certain
     * cart subtotal.
     */
    protected function _getMinimumCartTotal() {
        return null;
    }

    protected function _getMaximumCartTotal() {
        return null;
    }

    protected function _setCountry($data) {
        $this->_country = $data;
    }

    protected function _getCountry() {
        return $this->_country;
    }

    public function setWeightUnit($unit) {
        $this->_weight_unit = $unit;
    }

    public function getWeightUnit() {
        return $this->_weight_unit;
    }

    public function _setWeight($data) {
        $this->_weight = $data;
    }

    // Return the weight in grammes
    public function _getWeight() {
        $unit = $this->getWeightUnit();
        $weight = $this->_weight;

        switch ($unit) {
            case 'kg':
                $weight *= 1000;
                break;
            case 'lb':
                $weight *= 453.59237;
                break;
            default: // case 'g':
                // No need to do anything..
                break;
        }

        return $weight;
    }

    protected function _setCartTotal($value) {
        $this->_cart_total = $value;
    }

    public function getCartTotal() {
        return $this->_cart_total;
    }

    public function setNegativeWeight($value) {
        $this->_negative_weight = $value;
    }

    public function getNegativeWeight() {
        return $this->_negative_weight;
    }

    protected function _calculateCost() {
        $rates = $this->getRates();
        $cost = null;

        $min = $this->_getMinimumCartTotal();
        $max = $this->_getMaximumCartTotal();
        $cart = $this->getCartTotal();

        //echo "Min: $min, Max: $max, Cart: $cart<br />";

        if ($max !== null) {
            if ($max < $cart) {
                return null;
            }
        }

        if ($min !== null) {
            if ($min > $cart) {
                return null;
            }
        }

        $count = count($rates);
        if (($this->_getWeight() - $this->getNegativeWeight()) <= $rates[$count-1]) {
            for($i = 0; $i < $count; $i++) {
                if ($rates[$i]['upper'] >= ($this->_getWeight() - $this->getNegativeWeight())) {
                    $cost = $rates[$i]['cost'];
                    break;
                }
            }
        }

        if ($cost === null) {
            $cost = $this->calculateRate($this->_getWeight());
        }

        return $cost;
    }

    /**
     * Will return the cost associated with sending via the
     * implemented class.
     *
     * @param Mage_Shipping_Model_Rate_Request $request
     * @return float May return null if consignment is too heavy or
     *               not applicable
     */
    public function getCost(Mage_Shipping_Model_Rate_Request $request) {
        $weight = $request->getPackageWeight();
        $country = $request->getDestCountryId();
        $cart_total = $request->getPackageValue();

        $this->_setWeight($weight);
        $this->_setCountry($country);
        $this->_setCartTotal($cart_total);

        return $this->_calculateCost();
    }

    /**
     * Function that allows for easy testing..
     */
    public function test($country, $weight) {
        $this->_setWeight($weight);
        $this->_setCountry($country);
        $this->setWeightUnit("g");

        return $this->_calculateCost();
    }
    
    protected function _loadCsv($file) {
        $filename = Mage::getBaseDir('code') . "/community/Meanbee/Royalmail/data/{$file}.csv";
        $parser = new Varien_File_Csv();

        if (!file_exists($filename)) {
            throw new Exception("Unable to load the Royal Mail price data csv for '$file'.  Ensure that the app/ directory is in your include path.");
        }

        $data = $parser->getData($filename);
        
        $return = array();
        if (count($data)) {
            foreach ($data as $key => $value) {
                list($upper, $cost) = $value;
                
                $return[] = array(
                    "upper" => $upper,
                    "cost" => $cost
                );
            }
        }
        
        return $return;
    }
}
