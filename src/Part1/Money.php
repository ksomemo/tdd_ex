<?php

require_once 'Expression.php';
require_once 'Sum.php';
/**
 * 通貨
 */
class Money implements Expression {

    // 総額
    protected $amount;

    // 通貨の種類
    protected $currency;

    public function __construct($amount, $currency) {
        $this->amount = $amount;
        $this->currency = $currency;
    }

    /**
     *
     * 総額の等価性判断
     * @param Money $money
     */
    public function equals($money) {
        return $this->amount === $money->amount
            && $this->currency() === $money->currency();
    }

    /**
     *
     * 総額の倍変更
     */
    public function times($multiplier) {
        return new Money($this->amount * $multiplier, $this->currency);
    }

    /**
     *
     * 通貨の種類を取得する
     */
    public function currency() {
        return $this->currency;
    }

    /**
     *
     * 通貨の金額を取得する
     */
    public function amount() {
        return $this->amount;
    }

    /**
     *
     * ドルオブジェクトの生成
     * @param int $amount 総額
     * @return Dollar
     */
    public static function dollar($amount) {
        return new Money($amount, 'USD');
    }

    /**
     *
     * フランオブジェクトの生成
     * @param int $amount 総額
     * @return Franc
     */
    public static function franc($amount) {
        return new Money($amount, 'CHF');
    }

    /**
     *
     * 加法
     * @param Money $addend
     */
    public function plus(Money $addend) {
        return new Sum($this, $addend);
    }

    /**
     * (non-PHPdoc)
     * @see Expression::reduce()
     */
    public function reduce(Bank $bank, $to) {
        $rate = $bank->rate($this->currency, $to);

        return new Money($this->amount / $rate, $to);
    }
}