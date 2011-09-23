<?php
abstract class Money {

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
            && get_class($this) === get_class($money);
    }

    /**
     *
     * 総額の倍変更
     */
    abstract public function times($multiplier);

    /**
     *
     * 通貨の種類を取得する
     */
    public function currency() {
        return $this->currency;
    }

    /**
     *
     * ドルオブジェクトの生成
     * @param int $amount 総額
     * @return Dollar
     */
    public static function dollar($amount) {
        return new Dollar($amount, 'USD');
    }

    /**
     *
     * フランオブジェクトの生成
     * @param int $amount 総額
     * @return Franc
     */
    public static function franc($amount) {
        return new Franc($amount, 'CHF');
    }
}