<?php

require_once '/src/Part1/Dollar.php';
require_once '/src/Part1/Franc.php';

class FrancTest extends PHPUnit_Framework_TestCase {

    /**
     *
     * 1口当たりの価格に口数を掛けたときの金額(フラン)
     */
    public function testMultiplication() {
        $fives = new Franc(5);

        $this->assertEquals(new Franc(10), $fives->times(2), "金額が期待通り(10フラン)でない");
        $this->assertEquals(new Franc(15), $fives->times(3), "金額が期待通り(15フラン)でない");
    }

    public function testEquality() {
        $franc = new Franc(5);

        $this->assertTrue($franc->equals(new Franc(5)),  "等しくない(フラン)");
        $this->assertFalse($franc->equals(new Franc(6)), "等しい(フラン)");
    }

}
