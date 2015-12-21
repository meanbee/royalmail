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
class Meanbee_Royalmail_Helper_Data extends Mage_Core_Helper_Abstract
{

    protected $_country = '';
    protected $_weight = 0;
    protected $_weight_unit = '';
    protected $_cart_total = 0;
    protected $_negative_weight = 0; // Weight to take off in the case of free shipping

    /**
     * Some methods should only be enabled after above a certain
     * cart subtotal.
     */
    protected function _getMinimumCartTotal()
    {
        return null;
    }

    protected function _getMaximumCartTotal()
    {
        return null;
    }

    protected function _setCountry($data)
    {
        $this->_country = $data;
    }

    protected function _getCountry()
    {
        return $this->_country;
    }

    public function setWeightUnit($unit)
    {
        $this->_weight_unit = $unit;
    }

    public function getWeightUnit()
    {
        return $this->_weight_unit;
    }

    public function _setWeight($data)
    {
        $this->_weight = $data;
    }

    // Return the weight in grammes
    public function _getWeight()
    {
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

    protected function _setCartTotal($value)
    {
        $this->_cart_total = $value;
    }

    public function getCartTotal()
    {
        return $this->_cart_total;
    }

    public function setNegativeWeight($value)
    {
        $this->_negative_weight = $value;
    }

    public function getNegativeWeight()
    {
        return $this->_negative_weight;
    }
}