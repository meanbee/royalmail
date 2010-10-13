<?php
require_once "Base.php";

class AirmailTest extends Base {
	protected function _loadMethod() {
		return Mage::getModel('royalmail/shipping_carrier_royalmail_airmail');
	}
	
    public function testNoUk() {
        $this->assertNull($this->_test($this->_country["uk"], 10));
    }

    // Auto generated (region: eu, weight: 9g, price: 1.21) by ./tsv_to_tests Sun Mar 28 20:04:07 2010
    public function testEu9g() {
        $this->assertEquals((int) 1.21 * 100, (int) $this->_test($this->_country["eu"], 9) * 100);
    }

    // Auto generated (region: rw, weight: 9g, price: 1.68) by ./tsv_to_tests Sun Mar 28 20:04:07 2010
    public function testRw9g() {
        $this->assertEquals((int) 1.68 * 100, (int) $this->_test($this->_country["rw"], 9) * 100);
    }

    // Auto generated (region: eu, weight: 19g, price: 1.21) by ./tsv_to_tests Sun Mar 28 20:04:07 2010
    public function testEu19g() {
        $this->assertEquals((int) 1.21 * 100, (int) $this->_test($this->_country["eu"], 19) * 100);
    }

    // Auto generated (region: rw, weight: 19g, price: 1.68) by ./tsv_to_tests Sun Mar 28 20:04:07 2010
    public function testRw19g() {
        $this->assertEquals((int) 1.68 * 100, (int) $this->_test($this->_country["rw"], 19) * 100);
    }

    // Auto generated (region: eu, weight: 39g, price: 1.21) by ./tsv_to_tests Sun Mar 28 20:04:07 2010
    public function testEu39g() {
        $this->assertEquals((int) 1.21 * 100, (int) $this->_test($this->_country["eu"], 39) * 100);
    }

    // Auto generated (region: rw, weight: 39g, price: 1.68) by ./tsv_to_tests Sun Mar 28 20:04:07 2010
    public function testRw39g() {
        $this->assertEquals((int) 1.68 * 100, (int) $this->_test($this->_country["rw"], 39) * 100);
    }

    // Auto generated (region: eu, weight: 59g, price: 1.21) by ./tsv_to_tests Sun Mar 28 20:04:07 2010
    public function testEu59g() {
        $this->assertEquals((int) 1.21 * 100, (int) $this->_test($this->_country["eu"], 59) * 100);
    }

    // Auto generated (region: rw, weight: 59g, price: 1.68) by ./tsv_to_tests Sun Mar 28 20:04:07 2010
    public function testRw59g() {
        $this->assertEquals((int) 1.68 * 100, (int) $this->_test($this->_country["rw"], 59) * 100);
    }

    // Auto generated (region: eu, weight: 79g, price: 1.21) by ./tsv_to_tests Sun Mar 28 20:04:07 2010
    public function testEu79g() {
        $this->assertEquals((int) 1.21 * 100, (int) $this->_test($this->_country["eu"], 79) * 100);
    }

    // Auto generated (region: rw, weight: 79g, price: 1.68) by ./tsv_to_tests Sun Mar 28 20:04:07 2010
    public function testRw79g() {
        $this->assertEquals((int) 1.68 * 100, (int) $this->_test($this->_country["rw"], 79) * 100);
    }

    // Auto generated (region: eu, weight: 99g, price: 1.21) by ./tsv_to_tests Sun Mar 28 20:04:07 2010
    public function testEu99g() {
        $this->assertEquals((int) 1.21 * 100, (int) $this->_test($this->_country["eu"], 99) * 100);
    }

    // Auto generated (region: rw, weight: 99g, price: 1.68) by ./tsv_to_tests Sun Mar 28 20:04:07 2010
    public function testRw99g() {
        $this->assertEquals((int) 1.68 * 100, (int) $this->_test($this->_country["rw"], 99) * 100);
    }

    // Auto generated (region: eu, weight: 119g, price: 1.31) by ./tsv_to_tests Sun Mar 28 20:04:07 2010
    public function testEu119g() {
        $this->assertEquals((int) 1.31 * 100, (int) $this->_test($this->_country["eu"], 119) * 100);
    }

    // Auto generated (region: rw, weight: 119g, price: 1.93) by ./tsv_to_tests Sun Mar 28 20:04:07 2010
    public function testRw119g() {
        $this->assertEquals((int) 1.93 * 100, (int) $this->_test($this->_country["rw"], 119) * 100);
    }

    // Auto generated (region: eu, weight: 139g, price: 1.45) by ./tsv_to_tests Sun Mar 28 20:04:07 2010
    public function testEu139g() {
        $this->assertEquals((int) 1.45 * 100, (int) $this->_test($this->_country["eu"], 139) * 100);
    }

    // Auto generated (region: rw, weight: 139g, price: 2.19) by ./tsv_to_tests Sun Mar 28 20:04:07 2010
    public function testRw139g() {
        $this->assertEquals((int) 2.19 * 100, (int) $this->_test($this->_country["rw"], 139) * 100);
    }

    // Auto generated (region: eu, weight: 159g, price: 1.57) by ./tsv_to_tests Sun Mar 28 20:04:07 2010
    public function testEu159g() {
        $this->assertEquals((int) 1.57 * 100, (int) $this->_test($this->_country["eu"], 159) * 100);
    }

    // Auto generated (region: rw, weight: 159g, price: 2.44) by ./tsv_to_tests Sun Mar 28 20:04:07 2010
    public function testRw159g() {
        $this->assertEquals((int) 2.44 * 100, (int) $this->_test($this->_country["rw"], 159) * 100);
    }

    // Auto generated (region: eu, weight: 179g, price: 1.70) by ./tsv_to_tests Sun Mar 28 20:04:07 2010
    public function testEu179g() {
        $this->assertEquals((int) 1.70 * 100, (int) $this->_test($this->_country["eu"], 179) * 100);
    }

    // Auto generated (region: rw, weight: 179g, price: 2.70) by ./tsv_to_tests Sun Mar 28 20:04:07 2010
    public function testRw179g() {
        $this->assertEquals((int) 2.70 * 100, (int) $this->_test($this->_country["rw"], 179) * 100);
    }

    // Auto generated (region: eu, weight: 199g, price: 1.82) by ./tsv_to_tests Sun Mar 28 20:04:07 2010
    public function testEu199g() {
        $this->assertEquals((int) 1.82 * 100, (int) $this->_test($this->_country["eu"], 199) * 100);
    }

    // Auto generated (region: rw, weight: 199g, price: 2.94) by ./tsv_to_tests Sun Mar 28 20:04:07 2010
    public function testRw199g() {
        $this->assertEquals((int) 2.94 * 100, (int) $this->_test($this->_country["rw"], 199) * 100);
    }

    // Auto generated (region: eu, weight: 219g, price: 1.95) by ./tsv_to_tests Sun Mar 28 20:04:07 2010
    public function testEu219g() {
        $this->assertEquals((int) 1.95 * 100, (int) $this->_test($this->_country["eu"], 219) * 100);
    }

    // Auto generated (region: rw, weight: 219g, price: 3.18) by ./tsv_to_tests Sun Mar 28 20:04:07 2010
    public function testRw219g() {
        $this->assertEquals((int) 3.18 * 100, (int) $this->_test($this->_country["rw"], 219) * 100);
    }

    // Auto generated (region: eu, weight: 239g, price: 2.06) by ./tsv_to_tests Sun Mar 28 20:04:07 2010
    public function testEu239g() {
        $this->assertEquals((int) 2.06 * 100, (int) $this->_test($this->_country["eu"], 239) * 100);
    }

    // Auto generated (region: rw, weight: 239g, price: 3.41) by ./tsv_to_tests Sun Mar 28 20:04:07 2010
    public function testRw239g() {
        $this->assertEquals((int) 3.41 * 100, (int) $this->_test($this->_country["rw"], 239) * 100);
    }

    // Auto generated (region: eu, weight: 259g, price: 2.18) by ./tsv_to_tests Sun Mar 28 20:04:07 2010
    public function testEu259g() {
        $this->assertEquals((int) 2.18 * 100, (int) $this->_test($this->_country["eu"], 259) * 100);
    }

    // Auto generated (region: rw, weight: 259g, price: 3.64) by ./tsv_to_tests Sun Mar 28 20:04:07 2010
    public function testRw259g() {
        $this->assertEquals((int) 3.64 * 100, (int) $this->_test($this->_country["rw"], 259) * 100);
    }

    // Auto generated (region: eu, weight: 279g, price: 2.31) by ./tsv_to_tests Sun Mar 28 20:04:07 2010
    public function testEu279g() {
        $this->assertEquals((int) 2.31 * 100, (int) $this->_test($this->_country["eu"], 279) * 100);
    }

    // Auto generated (region: rw, weight: 279g, price: 3.88) by ./tsv_to_tests Sun Mar 28 20:04:07 2010
    public function testRw279g() {
        $this->assertEquals((int) 3.88 * 100, (int) $this->_test($this->_country["rw"], 279) * 100);
    }

    // Auto generated (region: eu, weight: 299g, price: 2.44) by ./tsv_to_tests Sun Mar 28 20:04:07 2010
    public function testEu299g() {
        $this->assertEquals((int) 2.44 * 100, (int) $this->_test($this->_country["eu"], 299) * 100);
    }

    // Auto generated (region: rw, weight: 299g, price: 4.11) by ./tsv_to_tests Sun Mar 28 20:04:07 2010
    public function testRw299g() {
        $this->assertEquals((int) 4.11 * 100, (int) $this->_test($this->_country["rw"], 299) * 100);
    }

    // Auto generated (region: eu, weight: 319g, price: 2.55) by ./tsv_to_tests Sun Mar 28 20:04:07 2010
    public function testEu319g() {
        $this->assertEquals((int) 2.55 * 100, (int) $this->_test($this->_country["eu"], 319) * 100);
    }

    // Auto generated (region: rw, weight: 319g, price: 4.35) by ./tsv_to_tests Sun Mar 28 20:04:07 2010
    public function testRw319g() {
        $this->assertEquals((int) 4.35 * 100, (int) $this->_test($this->_country["rw"], 319) * 100);
    }

    // Auto generated (region: eu, weight: 339g, price: 2.66) by ./tsv_to_tests Sun Mar 28 20:04:07 2010
    public function testEu339g() {
        $this->assertEquals((int) 2.66 * 100, (int) $this->_test($this->_country["eu"], 339) * 100);
    }

    // Auto generated (region: rw, weight: 339g, price: 4.59) by ./tsv_to_tests Sun Mar 28 20:04:07 2010
    public function testRw339g() {
        $this->assertEquals((int) 4.59 * 100, (int) $this->_test($this->_country["rw"], 339) * 100);
    }

    // Auto generated (region: eu, weight: 359g, price: 2.77) by ./tsv_to_tests Sun Mar 28 20:04:07 2010
    public function testEu359g() {
        $this->assertEquals((int) 2.77 * 100, (int) $this->_test($this->_country["eu"], 359) * 100);
    }

    // Auto generated (region: rw, weight: 359g, price: 4.83) by ./tsv_to_tests Sun Mar 28 20:04:07 2010
    public function testRw359g() {
        $this->assertEquals((int) 4.83 * 100, (int) $this->_test($this->_country["rw"], 359) * 100);
    }

    // Auto generated (region: eu, weight: 379g, price: 2.88) by ./tsv_to_tests Sun Mar 28 20:04:07 2010
    public function testEu379g() {
        $this->assertEquals((int) 2.88 * 100, (int) $this->_test($this->_country["eu"], 379) * 100);
    }

    // Auto generated (region: rw, weight: 379g, price: 5.07) by ./tsv_to_tests Sun Mar 28 20:04:07 2010
    public function testRw379g() {
        $this->assertEquals((int) 5.07 * 100, (int) $this->_test($this->_country["rw"], 379) * 100);
    }

    // Auto generated (region: eu, weight: 399g, price: 2.99) by ./tsv_to_tests Sun Mar 28 20:04:07 2010
    public function testEu399g() {
        $this->assertEquals((int) 2.99 * 100, (int) $this->_test($this->_country["eu"], 399) * 100);
    }

    // Auto generated (region: rw, weight: 399g, price: 5.31) by ./tsv_to_tests Sun Mar 28 20:04:07 2010
    public function testRw399g() {
        $this->assertEquals((int) 5.31 * 100, (int) $this->_test($this->_country["rw"], 399) * 100);
    }

    // Auto generated (region: eu, weight: 419g, price: 3.10) by ./tsv_to_tests Sun Mar 28 20:04:07 2010
    public function testEu419g() {
        $this->assertEquals((int) 3.10 * 100, (int) $this->_test($this->_country["eu"], 419) * 100);
    }

    // Auto generated (region: rw, weight: 419g, price: 5.55) by ./tsv_to_tests Sun Mar 28 20:04:07 2010
    public function testRw419g() {
        $this->assertEquals((int) 5.55 * 100, (int) $this->_test($this->_country["rw"], 419) * 100);
    }

    // Auto generated (region: eu, weight: 439g, price: 3.21) by ./tsv_to_tests Sun Mar 28 20:04:07 2010
    public function testEu439g() {
        $this->assertEquals((int) 3.21 * 100, (int) $this->_test($this->_country["eu"], 439) * 100);
    }

    // Auto generated (region: rw, weight: 439g, price: 5.79) by ./tsv_to_tests Sun Mar 28 20:04:07 2010
    public function testRw439g() {
        $this->assertEquals((int) 5.79 * 100, (int) $this->_test($this->_country["rw"], 439) * 100);
    }

    // Auto generated (region: eu, weight: 459g, price: 3.32) by ./tsv_to_tests Sun Mar 28 20:04:07 2010
    public function testEu459g() {
        $this->assertEquals((int) 3.32 * 100, (int) $this->_test($this->_country["eu"], 459) * 100);
    }

    // Auto generated (region: rw, weight: 459g, price: 6.03) by ./tsv_to_tests Sun Mar 28 20:04:07 2010
    public function testRw459g() {
        $this->assertEquals((int) 6.03 * 100, (int) $this->_test($this->_country["rw"], 459) * 100);
    }

    // Auto generated (region: eu, weight: 479g, price: 3.43) by ./tsv_to_tests Sun Mar 28 20:04:07 2010
    public function testEu479g() {
        $this->assertEquals((int) 3.43 * 100, (int) $this->_test($this->_country["eu"], 479) * 100);
    }

    // Auto generated (region: rw, weight: 479g, price: 6.27) by ./tsv_to_tests Sun Mar 28 20:04:07 2010
    public function testRw479g() {
        $this->assertEquals((int) 6.27 * 100, (int) $this->_test($this->_country["rw"], 479) * 100);
    }

    // Auto generated (region: eu, weight: 499g, price: 3.54) by ./tsv_to_tests Sun Mar 28 20:04:07 2010
    public function testEu499g() {
        $this->assertEquals((int) 3.54 * 100, (int) $this->_test($this->_country["eu"], 499) * 100);
    }

    // Auto generated (region: rw, weight: 499g, price: 6.51) by ./tsv_to_tests Sun Mar 28 20:04:07 2010
    public function testRw499g() {
        $this->assertEquals((int) 6.51 * 100, (int) $this->_test($this->_country["rw"], 499) * 100);
    }

    // Auto generated (region: eu, weight: 519g, price: 3.65) by ./tsv_to_tests Sun Mar 28 20:04:07 2010
    public function testEu519g() {
        $this->assertEquals((int) 3.65 * 100, (int) $this->_test($this->_country["eu"], 519) * 100);
    }

    // Auto generated (region: rw, weight: 519g, price: 6.74) by ./tsv_to_tests Sun Mar 28 20:04:07 2010
    public function testRw519g() {
        $this->assertEquals((int) 6.74 * 100, (int) $this->_test($this->_country["rw"], 519) * 100);
    }

    // Auto generated (region: eu, weight: 539g, price: 3.76) by ./tsv_to_tests Sun Mar 28 20:04:07 2010
    public function testEu539g() {
        $this->assertEquals((int) 3.76 * 100, (int) $this->_test($this->_country["eu"], 539) * 100);
    }

    // Auto generated (region: rw, weight: 539g, price: 6.97) by ./tsv_to_tests Sun Mar 28 20:04:07 2010
    public function testRw539g() {
        $this->assertEquals((int) 6.97 * 100, (int) $this->_test($this->_country["rw"], 539) * 100);
    }

    // Auto generated (region: eu, weight: 559g, price: 3.87) by ./tsv_to_tests Sun Mar 28 20:04:07 2010
    public function testEu559g() {
        $this->assertEquals((int) 3.87 * 100, (int) $this->_test($this->_country["eu"], 559) * 100);
    }

    // Auto generated (region: rw, weight: 559g, price: 7.20) by ./tsv_to_tests Sun Mar 28 20:04:07 2010
    public function testRw559g() {
        $this->assertEquals((int) 7.20 * 100, (int) $this->_test($this->_country["rw"], 559) * 100);
    }

    // Auto generated (region: eu, weight: 579g, price: 3.98) by ./tsv_to_tests Sun Mar 28 20:04:07 2010
    public function testEu579g() {
        $this->assertEquals((int) 3.98 * 100, (int) $this->_test($this->_country["eu"], 579) * 100);
    }

    // Auto generated (region: rw, weight: 579g, price: 7.43) by ./tsv_to_tests Sun Mar 28 20:04:07 2010
    public function testRw579g() {
        $this->assertEquals((int) 7.43 * 100, (int) $this->_test($this->_country["rw"], 579) * 100);
    }

    // Auto generated (region: eu, weight: 599g, price: 4.09) by ./tsv_to_tests Sun Mar 28 20:04:07 2010
    public function testEu599g() {
        $this->assertEquals((int) 4.09 * 100, (int) $this->_test($this->_country["eu"], 599) * 100);
    }

    // Auto generated (region: rw, weight: 599g, price: 7.66) by ./tsv_to_tests Sun Mar 28 20:04:07 2010
    public function testRw599g() {
        $this->assertEquals((int) 7.66 * 100, (int) $this->_test($this->_country["rw"], 599) * 100);
    }

    // Auto generated (region: eu, weight: 619g, price: 4.20) by ./tsv_to_tests Sun Mar 28 20:04:07 2010
    public function testEu619g() {
        $this->assertEquals((int) 4.20 * 100, (int) $this->_test($this->_country["eu"], 619) * 100);
    }

    // Auto generated (region: rw, weight: 619g, price: 7.89) by ./tsv_to_tests Sun Mar 28 20:04:07 2010
    public function testRw619g() {
        $this->assertEquals((int) 7.89 * 100, (int) $this->_test($this->_country["rw"], 619) * 100);
    }

    // Auto generated (region: eu, weight: 639g, price: 4.31) by ./tsv_to_tests Sun Mar 28 20:04:07 2010
    public function testEu639g() {
        $this->assertEquals((int) 4.31 * 100, (int) $this->_test($this->_country["eu"], 639) * 100);
    }

    // Auto generated (region: rw, weight: 639g, price: 8.12) by ./tsv_to_tests Sun Mar 28 20:04:07 2010
    public function testRw639g() {
        $this->assertEquals((int) 8.12 * 100, (int) $this->_test($this->_country["rw"], 639) * 100);
    }

    // Auto generated (region: eu, weight: 659g, price: 4.42) by ./tsv_to_tests Sun Mar 28 20:04:07 2010
    public function testEu659g() {
        $this->assertEquals((int) 4.42 * 100, (int) $this->_test($this->_country["eu"], 659) * 100);
    }

    // Auto generated (region: rw, weight: 659g, price: 8.35) by ./tsv_to_tests Sun Mar 28 20:04:07 2010
    public function testRw659g() {
        $this->assertEquals((int) 8.35 * 100, (int) $this->_test($this->_country["rw"], 659) * 100);
    }

    // Auto generated (region: eu, weight: 679g, price: 4.53) by ./tsv_to_tests Sun Mar 28 20:04:07 2010
    public function testEu679g() {
        $this->assertEquals((int) 4.53 * 100, (int) $this->_test($this->_country["eu"], 679) * 100);
    }

    // Auto generated (region: rw, weight: 679g, price: 8.58) by ./tsv_to_tests Sun Mar 28 20:04:07 2010
    public function testRw679g() {
        $this->assertEquals((int) 8.58 * 100, (int) $this->_test($this->_country["rw"], 679) * 100);
    }

    // Auto generated (region: eu, weight: 699g, price: 4.64) by ./tsv_to_tests Sun Mar 28 20:04:07 2010
    public function testEu699g() {
        $this->assertEquals((int) 4.64 * 100, (int) $this->_test($this->_country["eu"], 699) * 100);
    }

    // Auto generated (region: rw, weight: 699g, price: 8.81) by ./tsv_to_tests Sun Mar 28 20:04:07 2010
    public function testRw699g() {
        $this->assertEquals((int) 8.81 * 100, (int) $this->_test($this->_country["rw"], 699) * 100);
    }

    // Auto generated (region: eu, weight: 719g, price: 4.75) by ./tsv_to_tests Sun Mar 28 20:04:07 2010
    public function testEu719g() {
        $this->assertEquals((int) 4.75 * 100, (int) $this->_test($this->_country["eu"], 719) * 100);
    }

    // Auto generated (region: rw, weight: 719g, price: 9.04) by ./tsv_to_tests Sun Mar 28 20:04:07 2010
    public function testRw719g() {
        $this->assertEquals((int) 9.04 * 100, (int) $this->_test($this->_country["rw"], 719) * 100);
    }

    // Auto generated (region: eu, weight: 739g, price: 4.86) by ./tsv_to_tests Sun Mar 28 20:04:07 2010
    public function testEu739g() {
        $this->assertEquals((int) 4.86 * 100, (int) $this->_test($this->_country["eu"], 739) * 100);
    }

    // Auto generated (region: rw, weight: 739g, price: 9.27) by ./tsv_to_tests Sun Mar 28 20:04:07 2010
    public function testRw739g() {
        $this->assertEquals((int) 9.27 * 100, (int) $this->_test($this->_country["rw"], 739) * 100);
    }

    // Auto generated (region: eu, weight: 759g, price: 4.97) by ./tsv_to_tests Sun Mar 28 20:04:07 2010
    public function testEu759g() {
        $this->assertEquals((int) 4.97 * 100, (int) $this->_test($this->_country["eu"], 759) * 100);
    }

    // Auto generated (region: rw, weight: 759g, price: 9.50) by ./tsv_to_tests Sun Mar 28 20:04:07 2010
    public function testRw759g() {
        $this->assertEquals((int) 9.50 * 100, (int) $this->_test($this->_country["rw"], 759) * 100);
    }

    // Auto generated (region: eu, weight: 779g, price: 5.08) by ./tsv_to_tests Sun Mar 28 20:04:07 2010
    public function testEu779g() {
        $this->assertEquals((int) 5.08 * 100, (int) $this->_test($this->_country["eu"], 779) * 100);
    }

    // Auto generated (region: rw, weight: 779g, price: 9.73) by ./tsv_to_tests Sun Mar 28 20:04:07 2010
    public function testRw779g() {
        $this->assertEquals((int) 9.73 * 100, (int) $this->_test($this->_country["rw"], 779) * 100);
    }

    // Auto generated (region: eu, weight: 799g, price: 5.19) by ./tsv_to_tests Sun Mar 28 20:04:07 2010
    public function testEu799g() {
        $this->assertEquals((int) 5.19 * 100, (int) $this->_test($this->_country["eu"], 799) * 100);
    }

    // Auto generated (region: rw, weight: 799g, price: 9.96) by ./tsv_to_tests Sun Mar 28 20:04:07 2010
    public function testRw799g() {
        $this->assertEquals((int) 9.96 * 100, (int) $this->_test($this->_country["rw"], 799) * 100);
    }

    // Auto generated (region: eu, weight: 819g, price: 5.30) by ./tsv_to_tests Sun Mar 28 20:04:07 2010
    public function testEu819g() {
        $this->assertEquals((int) 5.30 * 100, (int) $this->_test($this->_country["eu"], 819) * 100);
    }

    // Auto generated (region: rw, weight: 819g, price: 10.19) by ./tsv_to_tests Sun Mar 28 20:04:07 2010
    public function testRw819g() {
        $this->assertEquals((int) 10.19 * 100, (int) $this->_test($this->_country["rw"], 819) * 100);
    }

    // Auto generated (region: eu, weight: 839g, price: 5.41) by ./tsv_to_tests Sun Mar 28 20:04:07 2010
    public function testEu839g() {
        $this->assertEquals((int) 5.41 * 100, (int) $this->_test($this->_country["eu"], 839) * 100);
    }

    // Auto generated (region: rw, weight: 839g, price: 10.42) by ./tsv_to_tests Sun Mar 28 20:04:07 2010
    public function testRw839g() {
        $this->assertEquals((int) 10.42 * 100, (int) $this->_test($this->_country["rw"], 839) * 100);
    }

    // Auto generated (region: eu, weight: 859g, price: 5.52) by ./tsv_to_tests Sun Mar 28 20:04:07 2010
    public function testEu859g() {
        $this->assertEquals((int) 5.52 * 100, (int) $this->_test($this->_country["eu"], 859) * 100);
    }

    // Auto generated (region: rw, weight: 859g, price: 10.65) by ./tsv_to_tests Sun Mar 28 20:04:07 2010
    public function testRw859g() {
        $this->assertEquals((int) 10.65 * 100, (int) $this->_test($this->_country["rw"], 859) * 100);
    }

    // Auto generated (region: eu, weight: 879g, price: 5.63) by ./tsv_to_tests Sun Mar 28 20:04:07 2010
    public function testEu879g() {
        $this->assertEquals((int) 5.63 * 100, (int) $this->_test($this->_country["eu"], 879) * 100);
    }

    // Auto generated (region: rw, weight: 879g, price: 10.88) by ./tsv_to_tests Sun Mar 28 20:04:07 2010
    public function testRw879g() {
        $this->assertEquals((int) 10.88 * 100, (int) $this->_test($this->_country["rw"], 879) * 100);
    }

    // Auto generated (region: eu, weight: 899g, price: 5.74) by ./tsv_to_tests Sun Mar 28 20:04:07 2010
    public function testEu899g() {
        $this->assertEquals((int) 5.74 * 100, (int) $this->_test($this->_country["eu"], 899) * 100);
    }

    // Auto generated (region: rw, weight: 899g, price: 11.11) by ./tsv_to_tests Sun Mar 28 20:04:07 2010
    public function testRw899g() {
        $this->assertEquals((int) 11.11 * 100, (int) $this->_test($this->_country["rw"], 899) * 100);
    }

    // Auto generated (region: eu, weight: 919g, price: 5.85) by ./tsv_to_tests Sun Mar 28 20:04:07 2010
    public function testEu919g() {
        $this->assertEquals((int) 5.85 * 100, (int) $this->_test($this->_country["eu"], 919) * 100);
    }

    // Auto generated (region: rw, weight: 919g, price: 11.34) by ./tsv_to_tests Sun Mar 28 20:04:07 2010
    public function testRw919g() {
        $this->assertEquals((int) 11.34 * 100, (int) $this->_test($this->_country["rw"], 919) * 100);
    }

    // Auto generated (region: eu, weight: 939g, price: 5.96) by ./tsv_to_tests Sun Mar 28 20:04:07 2010
    public function testEu939g() {
        $this->assertEquals((int) 5.96 * 100, (int) $this->_test($this->_country["eu"], 939) * 100);
    }

    // Auto generated (region: rw, weight: 939g, price: 11.57) by ./tsv_to_tests Sun Mar 28 20:04:07 2010
    public function testRw939g() {
        $this->assertEquals((int) 11.57 * 100, (int) $this->_test($this->_country["rw"], 939) * 100);
    }

    // Auto generated (region: eu, weight: 959g, price: 6.07) by ./tsv_to_tests Sun Mar 28 20:04:07 2010
    public function testEu959g() {
        $this->assertEquals((int) 6.07 * 100, (int) $this->_test($this->_country["eu"], 959) * 100);
    }

    // Auto generated (region: rw, weight: 959g, price: 11.80) by ./tsv_to_tests Sun Mar 28 20:04:07 2010
    public function testRw959g() {
        $this->assertEquals((int) 11.80 * 100, (int) $this->_test($this->_country["rw"], 959) * 100);
    }

    // Auto generated (region: eu, weight: 979g, price: 6.18) by ./tsv_to_tests Sun Mar 28 20:04:07 2010
    public function testEu979g() {
        $this->assertEquals((int) 6.18 * 100, (int) $this->_test($this->_country["eu"], 979) * 100);
    }

    // Auto generated (region: rw, weight: 979g, price: 12.03) by ./tsv_to_tests Sun Mar 28 20:04:07 2010
    public function testRw979g() {
        $this->assertEquals((int) 12.03 * 100, (int) $this->_test($this->_country["rw"], 979) * 100);
    }

    // Auto generated (region: eu, weight: 999g, price: 6.29) by ./tsv_to_tests Sun Mar 28 20:04:07 2010
    public function testEu999g() {
        $this->assertEquals((int) 6.29 * 100, (int) $this->_test($this->_country["eu"], 999) * 100);
    }

    // Auto generated (region: rw, weight: 999g, price: 12.26) by ./tsv_to_tests Sun Mar 28 20:04:07 2010
    public function testRw999g() {
        $this->assertEquals((int) 12.26 * 100, (int) $this->_test($this->_country["rw"], 999) * 100);
    }

    // Auto generated (region: eu, weight: 1019g, price: 6.39) by ./tsv_to_tests Sun Mar 28 20:04:07 2010
    public function testEu1019g() {
        $this->assertEquals((int) 6.39 * 100, (int) $this->_test($this->_country["eu"], 1019) * 100);
    }

    // Auto generated (region: rw, weight: 1019g, price: 12.48) by ./tsv_to_tests Sun Mar 28 20:04:07 2010
    public function testRw1019g() {
        $this->assertEquals((int) 12.48 * 100, (int) $this->_test($this->_country["rw"], 1019) * 100);
    }

    // Auto generated (region: eu, weight: 1039g, price: 6.49) by ./tsv_to_tests Sun Mar 28 20:04:07 2010
    public function testEu1039g() {
        $this->assertEquals((int) 6.49 * 100, (int) $this->_test($this->_country["eu"], 1039) * 100);
    }

    // Auto generated (region: rw, weight: 1039g, price: 12.70) by ./tsv_to_tests Sun Mar 28 20:04:07 2010
    public function testRw1039g() {
        $this->assertEquals((int) 12.70 * 100, (int) $this->_test($this->_country["rw"], 1039) * 100);
    }

    // Auto generated (region: eu, weight: 1059g, price: 6.59) by ./tsv_to_tests Sun Mar 28 20:04:07 2010
    public function testEu1059g() {
        $this->assertEquals((int) 6.59 * 100, (int) $this->_test($this->_country["eu"], 1059) * 100);
    }

    // Auto generated (region: rw, weight: 1059g, price: 12.92) by ./tsv_to_tests Sun Mar 28 20:04:07 2010
    public function testRw1059g() {
        $this->assertEquals((int) 12.92 * 100, (int) $this->_test($this->_country["rw"], 1059) * 100);
    }

    // Auto generated (region: eu, weight: 1079g, price: 6.69) by ./tsv_to_tests Sun Mar 28 20:04:07 2010
    public function testEu1079g() {
        $this->assertEquals((int) 6.69 * 100, (int) $this->_test($this->_country["eu"], 1079) * 100);
    }

    // Auto generated (region: rw, weight: 1079g, price: 13.14) by ./tsv_to_tests Sun Mar 28 20:04:07 2010
    public function testRw1079g() {
        $this->assertEquals((int) 13.14 * 100, (int) $this->_test($this->_country["rw"], 1079) * 100);
    }

    // Auto generated (region: eu, weight: 1099g, price: 6.79) by ./tsv_to_tests Sun Mar 28 20:04:07 2010
    public function testEu1099g() {
        $this->assertEquals((int) 6.79 * 100, (int) $this->_test($this->_country["eu"], 1099) * 100);
    }

    // Auto generated (region: rw, weight: 1099g, price: 13.36) by ./tsv_to_tests Sun Mar 28 20:04:07 2010
    public function testRw1099g() {
        $this->assertEquals((int) 13.36 * 100, (int) $this->_test($this->_country["rw"], 1099) * 100);
    }

    // Auto generated (region: eu, weight: 1119g, price: 6.89) by ./tsv_to_tests Sun Mar 28 20:04:07 2010
    public function testEu1119g() {
        $this->assertEquals((int) 6.89 * 100, (int) $this->_test($this->_country["eu"], 1119) * 100);
    }

    // Auto generated (region: rw, weight: 1119g, price: 13.58) by ./tsv_to_tests Sun Mar 28 20:04:07 2010
    public function testRw1119g() {
        $this->assertEquals((int) 13.58 * 100, (int) $this->_test($this->_country["rw"], 1119) * 100);
    }

    // Auto generated (region: eu, weight: 1139g, price: 6.99) by ./tsv_to_tests Sun Mar 28 20:04:07 2010
    public function testEu1139g() {
        $this->assertEquals((int) 6.99 * 100, (int) $this->_test($this->_country["eu"], 1139) * 100);
    }

    // Auto generated (region: rw, weight: 1139g, price: 13.80) by ./tsv_to_tests Sun Mar 28 20:04:07 2010
    public function testRw1139g() {
        $this->assertEquals((int) 13.80 * 100, (int) $this->_test($this->_country["rw"], 1139) * 100);
    }

    // Auto generated (region: eu, weight: 1159g, price: 7.09) by ./tsv_to_tests Sun Mar 28 20:04:07 2010
    public function testEu1159g() {
        $this->assertEquals((int) 7.09 * 100, (int) $this->_test($this->_country["eu"], 1159) * 100);
    }

    // Auto generated (region: rw, weight: 1159g, price: 14.02) by ./tsv_to_tests Sun Mar 28 20:04:07 2010
    public function testRw1159g() {
        $this->assertEquals((int) 14.02 * 100, (int) $this->_test($this->_country["rw"], 1159) * 100);
    }

    // Auto generated (region: eu, weight: 1179g, price: 7.19) by ./tsv_to_tests Sun Mar 28 20:04:07 2010
    public function testEu1179g() {
        $this->assertEquals((int) 7.19 * 100, (int) $this->_test($this->_country["eu"], 1179) * 100);
    }

    // Auto generated (region: rw, weight: 1179g, price: 14.24) by ./tsv_to_tests Sun Mar 28 20:04:07 2010
    public function testRw1179g() {
        $this->assertEquals((int) 14.24 * 100, (int) $this->_test($this->_country["rw"], 1179) * 100);
    }

    // Auto generated (region: eu, weight: 1199g, price: 7.29) by ./tsv_to_tests Sun Mar 28 20:04:07 2010
    public function testEu1199g() {
        $this->assertEquals((int) 7.29 * 100, (int) $this->_test($this->_country["eu"], 1199) * 100);
    }

    // Auto generated (region: rw, weight: 1199g, price: 14.46) by ./tsv_to_tests Sun Mar 28 20:04:07 2010
    public function testRw1199g() {
        $this->assertEquals((int) 14.46 * 100, (int) $this->_test($this->_country["rw"], 1199) * 100);
    }

    // Auto generated (region: eu, weight: 1219g, price: 7.39) by ./tsv_to_tests Sun Mar 28 20:04:07 2010
    public function testEu1219g() {
        $this->assertEquals((int) 7.39 * 100, (int) $this->_test($this->_country["eu"], 1219) * 100);
    }

    // Auto generated (region: rw, weight: 1219g, price: 14.68) by ./tsv_to_tests Sun Mar 28 20:04:07 2010
    public function testRw1219g() {
        $this->assertEquals((int) 14.68 * 100, (int) $this->_test($this->_country["rw"], 1219) * 100);
    }

    // Auto generated (region: eu, weight: 1239g, price: 7.49) by ./tsv_to_tests Sun Mar 28 20:04:07 2010
    public function testEu1239g() {
        $this->assertEquals((int) 7.49 * 100, (int) $this->_test($this->_country["eu"], 1239) * 100);
    }

    // Auto generated (region: rw, weight: 1239g, price: 14.90) by ./tsv_to_tests Sun Mar 28 20:04:07 2010
    public function testRw1239g() {
        $this->assertEquals((int) 14.90 * 100, (int) $this->_test($this->_country["rw"], 1239) * 100);
    }

    // Auto generated (region: eu, weight: 1259g, price: 7.59) by ./tsv_to_tests Sun Mar 28 20:04:07 2010
    public function testEu1259g() {
        $this->assertEquals((int) 7.59 * 100, (int) $this->_test($this->_country["eu"], 1259) * 100);
    }

    // Auto generated (region: rw, weight: 1259g, price: 15.12) by ./tsv_to_tests Sun Mar 28 20:04:07 2010
    public function testRw1259g() {
        $this->assertEquals((int) 15.12 * 100, (int) $this->_test($this->_country["rw"], 1259) * 100);
    }

    // Auto generated (region: eu, weight: 1279g, price: 7.69) by ./tsv_to_tests Sun Mar 28 20:04:07 2010
    public function testEu1279g() {
        $this->assertEquals((int) 7.69 * 100, (int) $this->_test($this->_country["eu"], 1279) * 100);
    }

    // Auto generated (region: rw, weight: 1279g, price: 15.34) by ./tsv_to_tests Sun Mar 28 20:04:07 2010
    public function testRw1279g() {
        $this->assertEquals((int) 15.34 * 100, (int) $this->_test($this->_country["rw"], 1279) * 100);
    }

    // Auto generated (region: eu, weight: 1299g, price: 7.79) by ./tsv_to_tests Sun Mar 28 20:04:07 2010
    public function testEu1299g() {
        $this->assertEquals((int) 7.79 * 100, (int) $this->_test($this->_country["eu"], 1299) * 100);
    }

    // Auto generated (region: rw, weight: 1299g, price: 15.56) by ./tsv_to_tests Sun Mar 28 20:04:07 2010
    public function testRw1299g() {
        $this->assertEquals((int) 15.56 * 100, (int) $this->_test($this->_country["rw"], 1299) * 100);
    }

    // Auto generated (region: eu, weight: 1319g, price: 7.89) by ./tsv_to_tests Sun Mar 28 20:04:07 2010
    public function testEu1319g() {
        $this->assertEquals((int) 7.89 * 100, (int) $this->_test($this->_country["eu"], 1319) * 100);
    }

    // Auto generated (region: rw, weight: 1319g, price: 15.78) by ./tsv_to_tests Sun Mar 28 20:04:07 2010
    public function testRw1319g() {
        $this->assertEquals((int) 15.78 * 100, (int) $this->_test($this->_country["rw"], 1319) * 100);
    }

    // Auto generated (region: eu, weight: 1339g, price: 7.99) by ./tsv_to_tests Sun Mar 28 20:04:07 2010
    public function testEu1339g() {
        $this->assertEquals((int) 7.99 * 100, (int) $this->_test($this->_country["eu"], 1339) * 100);
    }

    // Auto generated (region: rw, weight: 1339g, price: 16.00) by ./tsv_to_tests Sun Mar 28 20:04:07 2010
    public function testRw1339g() {
        $this->assertEquals((int) 16.00 * 100, (int) $this->_test($this->_country["rw"], 1339) * 100);
    }

    // Auto generated (region: eu, weight: 1359g, price: 8.09) by ./tsv_to_tests Sun Mar 28 20:04:07 2010
    public function testEu1359g() {
        $this->assertEquals((int) 8.09 * 100, (int) $this->_test($this->_country["eu"], 1359) * 100);
    }

    // Auto generated (region: rw, weight: 1359g, price: 16.22) by ./tsv_to_tests Sun Mar 28 20:04:07 2010
    public function testRw1359g() {
        $this->assertEquals((int) 16.22 * 100, (int) $this->_test($this->_country["rw"], 1359) * 100);
    }

    // Auto generated (region: eu, weight: 1379g, price: 8.19) by ./tsv_to_tests Sun Mar 28 20:04:07 2010
    public function testEu1379g() {
        $this->assertEquals((int) 8.19 * 100, (int) $this->_test($this->_country["eu"], 1379) * 100);
    }

    // Auto generated (region: rw, weight: 1379g, price: 16.44) by ./tsv_to_tests Sun Mar 28 20:04:07 2010
    public function testRw1379g() {
        $this->assertEquals((int) 16.44 * 100, (int) $this->_test($this->_country["rw"], 1379) * 100);
    }

    // Auto generated (region: eu, weight: 1399g, price: 8.29) by ./tsv_to_tests Sun Mar 28 20:04:07 2010
    public function testEu1399g() {
        $this->assertEquals((int) 8.29 * 100, (int) $this->_test($this->_country["eu"], 1399) * 100);
    }

    // Auto generated (region: rw, weight: 1399g, price: 16.66) by ./tsv_to_tests Sun Mar 28 20:04:07 2010
    public function testRw1399g() {
        $this->assertEquals((int) 16.66 * 100, (int) $this->_test($this->_country["rw"], 1399) * 100);
    }

    // Auto generated (region: eu, weight: 1419g, price: 8.39) by ./tsv_to_tests Sun Mar 28 20:04:07 2010
    public function testEu1419g() {
        $this->assertEquals((int) 8.39 * 100, (int) $this->_test($this->_country["eu"], 1419) * 100);
    }

    // Auto generated (region: rw, weight: 1419g, price: 16.88) by ./tsv_to_tests Sun Mar 28 20:04:07 2010
    public function testRw1419g() {
        $this->assertEquals((int) 16.88 * 100, (int) $this->_test($this->_country["rw"], 1419) * 100);
    }

    // Auto generated (region: eu, weight: 1439g, price: 8.49) by ./tsv_to_tests Sun Mar 28 20:04:07 2010
    public function testEu1439g() {
        $this->assertEquals((int) 8.49 * 100, (int) $this->_test($this->_country["eu"], 1439) * 100);
    }

    // Auto generated (region: rw, weight: 1439g, price: 17.10) by ./tsv_to_tests Sun Mar 28 20:04:07 2010
    public function testRw1439g() {
        $this->assertEquals((int) 17.10 * 100, (int) $this->_test($this->_country["rw"], 1439) * 100);
    }

    // Auto generated (region: eu, weight: 1459g, price: 8.59) by ./tsv_to_tests Sun Mar 28 20:04:07 2010
    public function testEu1459g() {
        $this->assertEquals((int) 8.59 * 100, (int) $this->_test($this->_country["eu"], 1459) * 100);
    }

    // Auto generated (region: rw, weight: 1459g, price: 17.32) by ./tsv_to_tests Sun Mar 28 20:04:07 2010
    public function testRw1459g() {
        $this->assertEquals((int) 17.32 * 100, (int) $this->_test($this->_country["rw"], 1459) * 100);
    }

    // Auto generated (region: eu, weight: 1479g, price: 8.69) by ./tsv_to_tests Sun Mar 28 20:04:07 2010
    public function testEu1479g() {
        $this->assertEquals((int) 8.69 * 100, (int) $this->_test($this->_country["eu"], 1479) * 100);
    }

    // Auto generated (region: rw, weight: 1479g, price: 17.54) by ./tsv_to_tests Sun Mar 28 20:04:07 2010
    public function testRw1479g() {
        $this->assertEquals((int) 17.54 * 100, (int) $this->_test($this->_country["rw"], 1479) * 100);
    }

    // Auto generated (region: eu, weight: 1499g, price: 8.79) by ./tsv_to_tests Sun Mar 28 20:04:07 2010
    public function testEu1499g() {
        $this->assertEquals((int) 8.79 * 100, (int) $this->_test($this->_country["eu"], 1499) * 100);
    }

    // Auto generated (region: rw, weight: 1499g, price: 17.76) by ./tsv_to_tests Sun Mar 28 20:04:07 2010
    public function testRw1499g() {
        $this->assertEquals((int) 17.76 * 100, (int) $this->_test($this->_country["rw"], 1499) * 100);
    }

    // Auto generated (region: eu, weight: 1519g, price: 8.89) by ./tsv_to_tests Sun Mar 28 20:04:07 2010
    public function testEu1519g() {
        $this->assertEquals((int) 8.89 * 100, (int) $this->_test($this->_country["eu"], 1519) * 100);
    }

    // Auto generated (region: rw, weight: 1519g, price: 17.98) by ./tsv_to_tests Sun Mar 28 20:04:07 2010
    public function testRw1519g() {
        $this->assertEquals((int) 17.98 * 100, (int) $this->_test($this->_country["rw"], 1519) * 100);
    }

    // Auto generated (region: eu, weight: 1539g, price: 8.99) by ./tsv_to_tests Sun Mar 28 20:04:07 2010
    public function testEu1539g() {
        $this->assertEquals((int) 8.99 * 100, (int) $this->_test($this->_country["eu"], 1539) * 100);
    }

    // Auto generated (region: rw, weight: 1539g, price: 18.20) by ./tsv_to_tests Sun Mar 28 20:04:07 2010
    public function testRw1539g() {
        $this->assertEquals((int) 18.20 * 100, (int) $this->_test($this->_country["rw"], 1539) * 100);
    }

    // Auto generated (region: eu, weight: 1559g, price: 9.09) by ./tsv_to_tests Sun Mar 28 20:04:07 2010
    public function testEu1559g() {
        $this->assertEquals((int) 9.09 * 100, (int) $this->_test($this->_country["eu"], 1559) * 100);
    }

    // Auto generated (region: rw, weight: 1559g, price: 18.42) by ./tsv_to_tests Sun Mar 28 20:04:07 2010
    public function testRw1559g() {
        $this->assertEquals((int) 18.42 * 100, (int) $this->_test($this->_country["rw"], 1559) * 100);
    }

    // Auto generated (region: eu, weight: 1579g, price: 9.19) by ./tsv_to_tests Sun Mar 28 20:04:07 2010
    public function testEu1579g() {
        $this->assertEquals((int) 9.19 * 100, (int) $this->_test($this->_country["eu"], 1579) * 100);
    }

    // Auto generated (region: rw, weight: 1579g, price: 18.64) by ./tsv_to_tests Sun Mar 28 20:04:07 2010
    public function testRw1579g() {
        $this->assertEquals((int) 18.64 * 100, (int) $this->_test($this->_country["rw"], 1579) * 100);
    }

    // Auto generated (region: eu, weight: 1599g, price: 9.29) by ./tsv_to_tests Sun Mar 28 20:04:07 2010
    public function testEu1599g() {
        $this->assertEquals((int) 9.29 * 100, (int) $this->_test($this->_country["eu"], 1599) * 100);
    }

    // Auto generated (region: rw, weight: 1599g, price: 18.86) by ./tsv_to_tests Sun Mar 28 20:04:07 2010
    public function testRw1599g() {
        $this->assertEquals((int) 18.86 * 100, (int) $this->_test($this->_country["rw"], 1599) * 100);
    }

    // Auto generated (region: eu, weight: 1619g, price: 9.39) by ./tsv_to_tests Sun Mar 28 20:04:07 2010
    public function testEu1619g() {
        $this->assertEquals((int) 9.39 * 100, (int) $this->_test($this->_country["eu"], 1619) * 100);
    }

    // Auto generated (region: rw, weight: 1619g, price: 19.08) by ./tsv_to_tests Sun Mar 28 20:04:07 2010
    public function testRw1619g() {
        $this->assertEquals((int) 19.08 * 100, (int) $this->_test($this->_country["rw"], 1619) * 100);
    }

    // Auto generated (region: eu, weight: 1639g, price: 9.49) by ./tsv_to_tests Sun Mar 28 20:04:07 2010
    public function testEu1639g() {
        $this->assertEquals((int) 9.49 * 100, (int) $this->_test($this->_country["eu"], 1639) * 100);
    }

    // Auto generated (region: rw, weight: 1639g, price: 19.30) by ./tsv_to_tests Sun Mar 28 20:04:07 2010
    public function testRw1639g() {
        $this->assertEquals((int) 19.30 * 100, (int) $this->_test($this->_country["rw"], 1639) * 100);
    }

    // Auto generated (region: eu, weight: 1659g, price: 9.59) by ./tsv_to_tests Sun Mar 28 20:04:07 2010
    public function testEu1659g() {
        $this->assertEquals((int) 9.59 * 100, (int) $this->_test($this->_country["eu"], 1659) * 100);
    }

    // Auto generated (region: rw, weight: 1659g, price: 19.52) by ./tsv_to_tests Sun Mar 28 20:04:07 2010
    public function testRw1659g() {
        $this->assertEquals((int) 19.52 * 100, (int) $this->_test($this->_country["rw"], 1659) * 100);
    }

    // Auto generated (region: eu, weight: 1679g, price: 9.69) by ./tsv_to_tests Sun Mar 28 20:04:07 2010
    public function testEu1679g() {
        $this->assertEquals((int) 9.69 * 100, (int) $this->_test($this->_country["eu"], 1679) * 100);
    }

    // Auto generated (region: rw, weight: 1679g, price: 19.74) by ./tsv_to_tests Sun Mar 28 20:04:07 2010
    public function testRw1679g() {
        $this->assertEquals((int) 19.74 * 100, (int) $this->_test($this->_country["rw"], 1679) * 100);
    }

    // Auto generated (region: eu, weight: 1699g, price: 9.79) by ./tsv_to_tests Sun Mar 28 20:04:07 2010
    public function testEu1699g() {
        $this->assertEquals((int) 9.79 * 100, (int) $this->_test($this->_country["eu"], 1699) * 100);
    }

    // Auto generated (region: rw, weight: 1699g, price: 19.96) by ./tsv_to_tests Sun Mar 28 20:04:07 2010
    public function testRw1699g() {
        $this->assertEquals((int) 19.96 * 100, (int) $this->_test($this->_country["rw"], 1699) * 100);
    }

    // Auto generated (region: eu, weight: 1719g, price: 9.89) by ./tsv_to_tests Sun Mar 28 20:04:07 2010
    public function testEu1719g() {
        $this->assertEquals((int) 9.89 * 100, (int) $this->_test($this->_country["eu"], 1719) * 100);
    }

    // Auto generated (region: rw, weight: 1719g, price: 20.18) by ./tsv_to_tests Sun Mar 28 20:04:07 2010
    public function testRw1719g() {
        $this->assertEquals((int) 20.18 * 100, (int) $this->_test($this->_country["rw"], 1719) * 100);
    }

    // Auto generated (region: eu, weight: 1739g, price: 9.99) by ./tsv_to_tests Sun Mar 28 20:04:07 2010
    public function testEu1739g() {
        $this->assertEquals((int) 9.99 * 100, (int) $this->_test($this->_country["eu"], 1739) * 100);
    }

    // Auto generated (region: rw, weight: 1739g, price: 20.40) by ./tsv_to_tests Sun Mar 28 20:04:07 2010
    public function testRw1739g() {
        $this->assertEquals((int) 20.40 * 100, (int) $this->_test($this->_country["rw"], 1739) * 100);
    }

    // Auto generated (region: eu, weight: 1759g, price: 10.09) by ./tsv_to_tests Sun Mar 28 20:04:07 2010
    public function testEu1759g() {
        $this->assertEquals((int) 10.09 * 100, (int) $this->_test($this->_country["eu"], 1759) * 100);
    }

    // Auto generated (region: rw, weight: 1759g, price: 20.62) by ./tsv_to_tests Sun Mar 28 20:04:07 2010
    public function testRw1759g() {
        $this->assertEquals((int) 20.62 * 100, (int) $this->_test($this->_country["rw"], 1759) * 100);
    }

    // Auto generated (region: eu, weight: 1779g, price: 10.19) by ./tsv_to_tests Sun Mar 28 20:04:07 2010
    public function testEu1779g() {
        $this->assertEquals((int) 10.19 * 100, (int) $this->_test($this->_country["eu"], 1779) * 100);
    }

    // Auto generated (region: rw, weight: 1779g, price: 20.84) by ./tsv_to_tests Sun Mar 28 20:04:07 2010
    public function testRw1779g() {
        $this->assertEquals((int) 20.84 * 100, (int) $this->_test($this->_country["rw"], 1779) * 100);
    }

    // Auto generated (region: eu, weight: 1799g, price: 10.29) by ./tsv_to_tests Sun Mar 28 20:04:07 2010
    public function testEu1799g() {
        $this->assertEquals((int) 10.29 * 100, (int) $this->_test($this->_country["eu"], 1799) * 100);
    }

    // Auto generated (region: rw, weight: 1799g, price: 21.06) by ./tsv_to_tests Sun Mar 28 20:04:07 2010
    public function testRw1799g() {
        $this->assertEquals((int) 21.06 * 100, (int) $this->_test($this->_country["rw"], 1799) * 100);
    }

    // Auto generated (region: eu, weight: 1819g, price: 10.39) by ./tsv_to_tests Sun Mar 28 20:04:07 2010
    public function testEu1819g() {
        $this->assertEquals((int) 10.39 * 100, (int) $this->_test($this->_country["eu"], 1819) * 100);
    }

    // Auto generated (region: rw, weight: 1819g, price: 21.28) by ./tsv_to_tests Sun Mar 28 20:04:07 2010
    public function testRw1819g() {
        $this->assertEquals((int) 21.28 * 100, (int) $this->_test($this->_country["rw"], 1819) * 100);
    }

    // Auto generated (region: eu, weight: 1839g, price: 10.49) by ./tsv_to_tests Sun Mar 28 20:04:07 2010
    public function testEu1839g() {
        $this->assertEquals((int) 10.49 * 100, (int) $this->_test($this->_country["eu"], 1839) * 100);
    }

    // Auto generated (region: rw, weight: 1839g, price: 21.50) by ./tsv_to_tests Sun Mar 28 20:04:07 2010
    public function testRw1839g() {
        $this->assertEquals((int) 21.50 * 100, (int) $this->_test($this->_country["rw"], 1839) * 100);
    }

    // Auto generated (region: eu, weight: 1859g, price: 10.59) by ./tsv_to_tests Sun Mar 28 20:04:07 2010
    public function testEu1859g() {
        $this->assertEquals((int) 10.59 * 100, (int) $this->_test($this->_country["eu"], 1859) * 100);
    }

    // Auto generated (region: rw, weight: 1859g, price: 21.72) by ./tsv_to_tests Sun Mar 28 20:04:07 2010
    public function testRw1859g() {
        $this->assertEquals((int) 21.72 * 100, (int) $this->_test($this->_country["rw"], 1859) * 100);
    }

    // Auto generated (region: eu, weight: 1879g, price: 10.69) by ./tsv_to_tests Sun Mar 28 20:04:07 2010
    public function testEu1879g() {
        $this->assertEquals((int) 10.69 * 100, (int) $this->_test($this->_country["eu"], 1879) * 100);
    }

    // Auto generated (region: rw, weight: 1879g, price: 21.94) by ./tsv_to_tests Sun Mar 28 20:04:07 2010
    public function testRw1879g() {
        $this->assertEquals((int) 21.94 * 100, (int) $this->_test($this->_country["rw"], 1879) * 100);
    }

    // Auto generated (region: eu, weight: 1899g, price: 10.79) by ./tsv_to_tests Sun Mar 28 20:04:07 2010
    public function testEu1899g() {
        $this->assertEquals((int) 10.79 * 100, (int) $this->_test($this->_country["eu"], 1899) * 100);
    }

    // Auto generated (region: rw, weight: 1899g, price: 22.16) by ./tsv_to_tests Sun Mar 28 20:04:07 2010
    public function testRw1899g() {
        $this->assertEquals((int) 22.16 * 100, (int) $this->_test($this->_country["rw"], 1899) * 100);
    }

    // Auto generated (region: eu, weight: 1919g, price: 10.89) by ./tsv_to_tests Sun Mar 28 20:04:07 2010
    public function testEu1919g() {
        $this->assertEquals((int) 10.89 * 100, (int) $this->_test($this->_country["eu"], 1919) * 100);
    }

    // Auto generated (region: rw, weight: 1919g, price: 22.38) by ./tsv_to_tests Sun Mar 28 20:04:07 2010
    public function testRw1919g() {
        $this->assertEquals((int) 22.38 * 100, (int) $this->_test($this->_country["rw"], 1919) * 100);
    }

    // Auto generated (region: eu, weight: 1939g, price: 10.99) by ./tsv_to_tests Sun Mar 28 20:04:07 2010
    public function testEu1939g() {
        $this->assertEquals((int) 10.99 * 100, (int) $this->_test($this->_country["eu"], 1939) * 100);
    }

    // Auto generated (region: rw, weight: 1939g, price: 22.60) by ./tsv_to_tests Sun Mar 28 20:04:07 2010
    public function testRw1939g() {
        $this->assertEquals((int) 22.60 * 100, (int) $this->_test($this->_country["rw"], 1939) * 100);
    }

    // Auto generated (region: eu, weight: 1959g, price: 11.09) by ./tsv_to_tests Sun Mar 28 20:04:07 2010
    public function testEu1959g() {
        $this->assertEquals((int) 11.09 * 100, (int) $this->_test($this->_country["eu"], 1959) * 100);
    }

    // Auto generated (region: rw, weight: 1959g, price: 22.82) by ./tsv_to_tests Sun Mar 28 20:04:07 2010
    public function testRw1959g() {
        $this->assertEquals((int) 22.82 * 100, (int) $this->_test($this->_country["rw"], 1959) * 100);
    }

    // Auto generated (region: eu, weight: 1979g, price: 11.19) by ./tsv_to_tests Sun Mar 28 20:04:07 2010
    public function testEu1979g() {
        $this->assertEquals((int) 11.19 * 100, (int) $this->_test($this->_country["eu"], 1979) * 100);
    }

    // Auto generated (region: rw, weight: 1979g, price: 23.04) by ./tsv_to_tests Sun Mar 28 20:04:07 2010
    public function testRw1979g() {
        $this->assertEquals((int) 23.04 * 100, (int) $this->_test($this->_country["rw"], 1979) * 100);
    }

    // Auto generated (region: eu, weight: 1999g, price: 11.29) by ./tsv_to_tests Sun Mar 28 20:04:07 2010
    public function testEu1999g() {
        $this->assertEquals((int) 11.29 * 100, (int) $this->_test($this->_country["eu"], 1999) * 100);
    }

    // Auto generated (region: rw, weight: 1999g, price: 23.26) by ./tsv_to_tests Sun Mar 28 20:04:07 2010
    public function testRw1999g() {
        $this->assertEquals((int) 23.26 * 100, (int) $this->_test($this->_country["rw"], 1999) * 100);
    }
}
