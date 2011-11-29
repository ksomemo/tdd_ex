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
}