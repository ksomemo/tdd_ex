<?php

require_once '/src/Part1/Dollar.php';
require_once '/src/Part1/Franc.php';

class DollarTest extends PHPUnit_Framework_TestCase {

    /**
     *
     * 1口当たりの価格に口数を掛けたときの金額
     */
    public function testMultiplication() {
        $fives = Money::dollar(5);
        $this->assertEquals(Money::dollar(10), $fives->times(2), '金額が期待通り(10)でない');
        $this->assertEquals(Money::dollar(15), $fives->times(3), '金額が期待通り(15)でない');

        $fives = Money::franc(5);
        $this->assertEquals(Money::franc(10), $fives->times(2), '金額が期待通り(10フラン)でない');
        $this->assertEquals(Money::franc(15), $fives->times(3), '金額が期待通り(15フラン)でない');
    }

    /**
     *
     * 等価性のテスト
     */
    public function testEquality() {
        $dollar = Money::dollar(5);

        $this->assertTrue($dollar->equals(Money::dollar(5)),  '等しくない');
        $this->assertFalse($dollar->equals(Money::dollar(6)), '等しい');
        $this->assertFalse($dollar->equals(Money::franc(5)),  '５ドルと５フランが等しい');
        $this->assertFalse($dollar->equals(Money::franc(6)),  '５ドルと６フランが等しい');
    }

    /**
     *
     * 通貨の種類
     */
    public function testCurrency() {
        $this->assertEquals('USD', Money::dollar(1)->currency());
        $this->assertEquals('CHF', Money::franc(1)->currency());
    }
}
