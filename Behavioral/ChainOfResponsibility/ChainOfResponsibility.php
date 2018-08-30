<?php

class Account
{
    protected $next;
    protected $balance;

    public function setNext(Account $acc) {
        $this->next = $acc;
    }

    public function pay($money) {
        if ($this->canPay($money)) {
            $class = get_called_class();
            echo "Payed with $class";
        } elseif ($this->next) {
            $class = get_called_class();
            echo "Can not pay with $class";
            $this->next->pay($money);
        } else {
            echo "No one can pay";
        }
    }

    public function canPay($money) {
        return $this->balance >= $money;
    }
}

class Bank extends Account
{
    protected $balance;

    public function __construct(float $balance)
    {
        $this->balance = $balance;
    }
}

class PayPal extends Account
{
    protected $balance;

    public function __construct(float $balance)
    {
        $this->balance = $balance;
    }
}

class Qiwi extends Account
{
    protected $balance;

    public function __construct(float $balance)
    {
        $this->balance = $balance;
    }
}

$bank = new Bank(100);
$paypal = new PayPal(200);
$qiwi = new Qiwi(300);

$bank->setNext($paypal);
$paypal->setNext($qiwi);

$bank->pay(150);
/**
 * Can not pay with Bank
 * Payed with PayPal
 */
?>