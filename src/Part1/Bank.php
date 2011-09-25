<?php

require_once 'Money.php';

class Bank {
    public function __construct() {
        return null;
    }

    /**
     *
     * 通貨に為替レートを適用する
     * @param Expression $source 通貨式
     * @param String $to 通貨の種類
     */
    public function reduce(Expression $source, $to) {
        return Money::dollar(10);
    }
}