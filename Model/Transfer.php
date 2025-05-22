<?php
require_once '../Model/database.php';
require_once '../Model/db_config.php';
require_once '../Model/Notification.php';

class Transfer extends mysqladpter implements Notification
{
    private $table1 = 'bank_account';  
    private $table2 = 'transaction';       
    private $FromAccount;
    private $ToAccount;
    private $Amount;

    public function __construct() {
        global $config;
        parent::__construct($config);
    }

    public function Display($Amount, $Date, $From, $To) {
        $this->Amount = $Amount;
        $this->Date = $Date;
        $this->FromAccount = $From;
        $this->ToAccount = $To;

        return sprintf(
            "Transfer Notification: $%.2f from account %s to %s on %s",
            $this->Amount,
            $this->FromAccount,
            $this->ToAccount,
            $this->Date
        );
    }

    public function TransferMoney($Amount, $From, $To) {
        $this->Amount = $Amount;
        $this->FromAccount = $From;
        $this->ToAccount = $To;

        $validation = $this->validateTransfer();
        if (!$validation['success']) {
            return $validation;
        }

        $this->updateBalance();

  $transactionData = array(
    'source_account_id' => $this->FromAccount,
    'destination_account_id' => $this->ToAccount,
    'amount' => $this->Amount,
    'transaction_date' => date('Y-m-d H:i:s')
);
$this->insert('transaction', $transactionData);  

        return ['success' => true, 'message' => 'Transfer successful'];
    }

    private function validateTransfer() {
       
        if (!$this->check_row($this->table1, "ID = '{$this->FromAccount}'")) {
            return ['success' => false, 'message' => 'Sender account not found'];
        }

        if (!$this->check_row($this->table1, "ID = '{$this->ToAccount}'")) {
            return ['success' => false, 'message' => 'Recipient account not found'];
        }

        
        if ($this->Amount <= 0) {
            return ['success' => false, 'message' => 'Amount must be positive'];
        }

        $balance = $this->getAccountBalance($this->FromAccount);
        if ($balance < $this->Amount) {
            return ['success' => false, 'message' => 'Insufficient balance'];
        }

        return ['success' => true];
    }

    public function getAccountBalance($accountNumber) {
        $this->query("SELECT balance FROM {$this->table1} WHERE ID = '$accountNumber'");
        $row = $this->fetch();
        return (float)$row['balance'];
    }

    public function updateBalance() {
        $this->query("UPDATE {$this->table1} SET balance = balance - {$this->Amount} WHERE ID = '{$this->FromAccount}'");
        $this->query("UPDATE {$this->table1} SET balance = balance + {$this->Amount} WHERE ID = '{$this->ToAccount}'");
    }
}
?>
