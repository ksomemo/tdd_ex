<?php
interface Expression {

    /**
     * 通貨の換金
     *
     * @param String $to 通貨の種類
     */
    public function reduce(Bank $bank, $to);

    /**
     * 加法
     *
     * @param Expression $addend 加数
     */
    public function plus(Expression $addend);

    /**
     *
     * 総額の倍変更
     */
    public function times($multiplier);

}