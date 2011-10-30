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
  public function reduce($to) {
      $amount = $this->augend->amount() + $this->addend->amount();
      return new Money($amount, $to);
  }
}