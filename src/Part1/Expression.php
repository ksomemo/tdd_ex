<?php
interface Expression {

    /**
     * 通貨の換金
     *
     * @param String $to 通貨の種類
     */
    public function reduce($to);
}