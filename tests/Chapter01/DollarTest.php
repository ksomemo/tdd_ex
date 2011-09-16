<?php

require_once '/src/Chapter01/Dollar.php';

class DollarTest extends PHPUnit_Framework_TestCase {

    /**
     *
     * 1口当たりの価格に口数を掛けたときの金額
     */
    public function testMultiplication() {
        $fives = new Dollar(5);
        $product = $fives->times(2);
        $this->assertEquals(10, $product->amount, "1口当たりの価格に口数を掛けたときの金額が期待通りでない");

        $product = $fives->times(3);
        $this->assertEquals(15, $product->amount, "金額が期待通り(15)でない");

    }

}