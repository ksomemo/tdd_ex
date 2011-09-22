<?php

require_once 'Money.php';

class Dollar extends Money {

    public function __construct($amount) {
        $this->amount = $amount;
    }

    /**
     *
     * 価格に口数をかけて金額を変更する
     * @param int $multiplier 口数
     */
    public function times($multiplier) {
        return Money::dollar($this->amount * $multiplier);
    }

}
