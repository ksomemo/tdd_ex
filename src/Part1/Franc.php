<?php
class Franc {

    private $amount;

    public function __construct($amount) {
        $this->amount = $amount;
    }

    /**
     *
     * 価格に口数をかけて金額を変更する
     * @param int $multiplier 口数
     */
    public function times($multiplier) {
        return new Franc($this->amount * $multiplier);
    }

    public function equals($franc) {
        return $this->amount === $franc->amount;
    }
}