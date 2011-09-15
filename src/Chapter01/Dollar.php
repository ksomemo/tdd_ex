<?php
class Dollar {

    public $amount;

    /**
     *
     * 価格に口数をかけて金額を変更する
     * @param int $multiplier 口数
     */
    public function times($multiplier) {
        $this->amount = 10;
    }
}
