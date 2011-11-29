<?php

require_once 'Money.php';
require_once 'Rates.php';

class Bank {

    private $rates;

    public function __construct() {
        $this->rates = new Rates();
    }

    /**
     *
     * 通貨に為替レートを適用する
     * @param Expression $source 通貨式
     * @param String $to 通貨の種類
     */
    public function reduce(Expression $source, $to) {
        return $source->reduce($this, $to);
    }

    /**
     *
     * 換金レートを追加する
     * @param String $from
     * @param String $to
     * @param integer $rate
     */
    public function addRate($from, $to, $rate) {
        $this->rates->put($from, $to, $rate);
    }

    /**
     *
     * 換金レートを返す
     * @param String $from
     * @param String $to
     */
    public function rate($from, $to) {
        return $this->rates->get($from, $to);
//        return ('CHF' === $from && 'USD' === $to)
//               ? 2
//               : 1;
    }
}