<?php
abstract class Money {

    // 総額
    protected  $amount;

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
     * ドルオブジェクトの生成
     * @param int $amount 総額
     * @return Dollar
     */
    public static function dollar($amount) {
        return new Dollar($amount);
    }

    /**
     *
     * フランオブジェクトの生成
     * @param int $amount 総額
     * @return Franc
     */
    public static function franc($amount) {
        return new Franc($amount);
    }
}