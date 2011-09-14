<?php

require_once '/src/Chapter01/Dollar.php';

class DollarTest extends PHPUnit_Framework_TestCase {

    /**
     *
     * 1口当たりの価格に口数を掛けたときの金額
     */
    public function testMultiplication() {
        $fives = new Dollar(5);
        $fives->times(2);
        assertEquals(10, $fives->amount, "1口当たりの価格に口数を掛けたときの金額が期待通りでない");
    }

}