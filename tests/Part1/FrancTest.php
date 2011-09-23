<?php

require_once '/src/Part1/Franc.php';

class FrancTest extends PHPUnit_Framework_TestCase {

    /**
     *
     * 1口当たりの価格に口数を掛けたときの金額(フラン)
     */
    public function testMultiplication() {
        $fives = Money::franc(5);

        $this->assertEquals(Money::franc(10), $fives->times(2), '金額が期待通り(10フラン)でない');
        $this->assertEquals(Money::franc(15), $fives->times(3), '金額が期待通り(15フラン)でない');
    }

    public function testEquality() {
        $franc = Money::franc(5);

        $this->assertTrue($franc->equals(Money::franc(5)),  '等しくない(フラン)');
        $this->assertFalse($franc->equals(Money::franc(6)), '等しい(フラン)');
    }

    /**
     *
     * 通貨の種類
     */
    public function testCurrency() {
        $this->assertEquals('CHF', Money::franc(1)->currency());
    }
}
