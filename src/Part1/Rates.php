<?php
class Rates {

    private $list = array();

    /**
     * レートの追加
     * @param String $from
     * @param String $to
     * @param integer $rate
     */
    public function put($from, $to, $rate) {
        $this->list[$from][$to] = $rate;
    }

    /**
     * レートの取得
     * @param String $from
     * @param String $to
     */
    public function get($from, $to) {
        return ($from === $to) ? 1 : $this->list[$from][$to];
    }
}