<?php

require_once '/src/Chapter01/Dollar.php';

class DollarTest extends PHPUnit_Framework_TestCase {

    /**
     *
     * 1口当たりの価格に口数を掛けたときの金額
     */
    public function testMultiplication() {
        $fives = new Dollar(5);

        $this->assertEquals(new Dollar(10), $fives->times(2), "金額が期待通り(10)でない");
        $this->assertEquals(new Dollar(15), $fives->times(3), "金額が期待通り(15)でない");
    }

    public function testEquality() {
        $dollar = new Dollar(5);

        $this->assertTrue($dollar->equals(new Dollar(5)),  "等しくない");
        $this->assertFalse($dollar->equals(new Dollar(6)), "等しい");
    }

}
