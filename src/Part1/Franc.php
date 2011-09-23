<?php

require_once 'Money.php';

class Franc extends Money {

    public function __construct($amount, $currency) {
        parent::__construct($amount, $currency);
    }

    /**
     *
     * 価格に口数をかけて金額を変更する
     * @param int $multiplier 口数
     */
    public function times($multiplier) {
        return new Franc($this->amount * $multiplier, $this->currency);
    }

}
