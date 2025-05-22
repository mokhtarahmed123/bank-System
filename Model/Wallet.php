<?php
    require_once 'database.php';
    require_once 'db_config.php';
class Wallet extends mysqladpter {
      private $_table='wallet';
    private $userId;
    private $balance;
    private $cards = [];

     public function __construct(){
                   global $config  ;
                   parent::__construct($config);
               }

    
    public function getBalance() {
        return $this->balance;
    }

    public function deposit($amount) {
        if ($amount <= 0) {
            throw new InvalidArgumentException("Deposit amount must be positive");
        }
        $this->balance += $amount;
        $this->addTransaction('Deposit', $amount);
        return $this->balance;
    }

    public function withdraw($amount) {
        if ($amount <= 0) {
            throw new InvalidArgumentException("Withdrawal amount must be positive");
        }
        if ($amount > $this->balance) {
            throw new RuntimeException("Insufficient funds");
        }
        $this->balance -= $amount;
        $this->addTransaction('Withdrawal', -$amount);
        return $this->balance;
    }


    public function addCard($type, $lastFourDigits, $expiry, $cardHolderName) {
        $card = [
            'type' => strtoupper($type),
            'number' => $this->maskCardNumber($lastFourDigits),
            'expiry' => $expiry,
            'cardholder' => $cardHolderName,
            'added_date' => date('Y-m-d H:i:s')
        ];
        $this->cards[] = $card;
        return $card;
    }

    public function getCards() {
        return $this->cards;
    }

    private function maskCardNumber($lastFour) {
        return '**** **** **** ' . $lastFour;
    }


    public function addTransaction($merchant, $description, $amount = null) {
        $transaction = [
            'date' => date('Y-m-d H:i:s'),
            'merchant' => $merchant,
            'description' => $description,
            'amount' => $amount
        ];
        array_unshift($this->transactions, $transaction);
        return $transaction;
    }

    public function getRecentTransactions($limit = 5) {
        return array_slice($this->transactions, 0, $limit);
    }

    public function getUserId() {
        return $this->userId;
    }

    public function getFormattedBalance() {
        return '$' . number_format($this->balance, 2);
    }
}


?>