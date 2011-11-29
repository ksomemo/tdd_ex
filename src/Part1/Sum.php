<?php
/**
 * 通貨の合計式
 *
 */
class Sum implements Expression {
  private $augend;
  private $addend;


  public function __construct($augend, $addend) {
      $this->augend = $augend;
      $this->addend = $addend;
  }

  /**
   * (non-PHPdoc)
   * @see Expression::reduce()
   */
  public function reduce(Bank $bank, $to) {

      $amount = $this->augend->reduce($bank, $to)->amount()
              + $this->addend->reduce($bank, $to)->amount();

      return new Money($amount, $to);
  }

    /**
    * (non-PHPdoc)
    * @see Expression::plus()
    */
    public function plus(Expression $addend) {
        return new Sum($this, $addend);
    }

    /**
     * (non-PHPdoc)
     * @see Expression::times()
     */
    public function times($multiplier) {
        return new Sum($this->augend->times($multiplier), $this->addend->times($multiplier));
    }
}