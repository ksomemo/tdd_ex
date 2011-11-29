<?php

require_once '/src/Part1/Money.php';
require_once '/src/Part1/Bank.php';
require_once '/src/Part1/Pair.php';

class MoneyTest extends PHPUnit_Framework_TestCase {

    /**
     *
     * 1口当たりの価格に口数を掛けたときの金額
     */
    public function testMultiplication() {
        $fives = Money::dollar(5);
        $this->assertEquals(Money::dollar(10), $fives->times(2), '金額が期待通り(10)でない');
        $this->assertEquals(Money::dollar(15), $fives->times(3), '金額が期待通り(15)でない');

        $fives = Money::franc(5);
        $this->assertEquals(Money::franc(10), $fives->times(2), '金額が期待通り(10フラン)でない');
        $this->assertEquals(Money::franc(15), $fives->times(3), '金額が期待通り(15フラン)でない');
    }

    /**
     *
     * 等価性のテスト
     */
    public function testEquality() {
        $dollar = Money::dollar(5);

        $this->assertTrue($dollar->equals(Money::dollar(5)),  '等しくない');
        $this->assertFalse($dollar->equals(Money::dollar(6)), '等しい');
        $this->assertFalse($dollar->equals(Money::franc(5)),  '５ドルと５フランが等しい');
        $this->assertFalse($dollar->equals(Money::franc(6)),  '５ドルと６フランが等しい');
    }

    /**
     *
     * 通貨の種類
     */
    public function testCurrency() {
        $this->assertEquals('USD', Money::dollar(1)->currency());
        $this->assertEquals('CHF', Money::franc(1)->currency());
    }

    /**
     *
     * 単純な加法のテスト
     */
    public function testSimpleAddition() {
        $five =Money::dollar(5);
        $sum = $five->plus($five);
        $bank = new Bank();
        $reduce = $bank->reduce($sum, 'USD');
        $this->assertEquals(Money::dollar(10), $reduce, '合計が10ドルでない');
    }

    /**
     *
     * 加法後の式(Sum)の被加数と加数のテスト
     */
    public function testPlusReturnsSum() {
        $five = Money::dollar(5);
        $result = $five->plus($five);
        $sum = $result;
        $this->assertAttributeEquals($five, 'augend', $sum, '被加数が5ドルでない');
        $this->assertAttributeEquals($five, 'addend', $sum, '被加数が5ドルでない');
    }

    /**
     *
     * 式SumのMoneyへの変換
     */
    public function testReduceSum() {
        $sum = new Sum(Money::dollar(3), Money::dollar(4));
        $bank = new Bank();
        $result = $bank->reduce($sum, 'USD');
        $this->assertEquals(Money::dollar(7), $result);
    }

    /**
     *
     * 式としてのMoneyをMoneyへ変換
     */
    function testReduceMoney() {
        $bank = new Bank();
        $result = $bank->reduce(Money::dollar(1), 'USD');
        $this->assertEquals(Money::dollar(1), $result);
    }

    /**
     * amountのgetterテスト
     */
    public function testAmountGetter() {
        $five = Money::dollar(5);
        $this->assertEquals(5, $five->amount());
    }

    /**
     *
     * 2フランを1ドルに換金する
     */
    public function testReduceMoneyDifferentCurrency() {
        $bank = new Bank();
        $bank->addRate('CHF', 'USD', 2);
        $result = $bank->reduce(Money::franc(2), 'USD');
        $this->assertEquals(Money::dollar(1), $result, '1ドルでない');
    }

    /**
     * ペアのテスト(オブジェクトの比較テスト用)
     */
    public function testPairEquals() {
        $p1 = new Pair('USD', 'CHF');
        $p2 = new Pair('USD', 'CHF');

        $this->assertEquals($p1, $p2);
        $this->assertTrue($p1 == $p2);
        $this->assertTrue($p1 === $p1);
        $this->assertFalse($p1 === $p2);

        $p3 = new Pair('CHF', 'USD');
        $this->assertNotEquals($p1, $p3);
    }

    /**
     * SplObjectStorageのテスト
     */
    public function testStorageEquals() {
        $storage = new SplObjectStorage();
        $pair = new Pair('USD', 'CHF');
        $storage->offsetSet($pair, 1);

        $this->assertTrue($storage->offsetExists($pair));
        $this->assertFalse($storage->offsetExists(new Pair('USD', 'CHF')));

        $this->assertEquals(1, $storage->offsetGet($pair));

        foreach ($storage as $key => $value) {
            $this->assertEquals(new Pair('USD', 'CHF'), $value);
        }
    }

    /**
     * 同じ通貨に換金したときのレートが1であるか
     */
    public function testIdentyRate() {
        $bank = new Bank();
        $this->assertEquals(1, $bank->rate('USD', 'USD'));
    }
}
