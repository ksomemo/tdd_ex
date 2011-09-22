<?php
class Money {

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
}