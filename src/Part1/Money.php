<?php
class Money {

    // 総額
    protected  $amount;

    /**
     *
     * 総額の等価性判断
     * @param unknown_type $dollar
     */
    public function equals($dollar) {
        return $this->amount === $dollar->amount;
    }
}