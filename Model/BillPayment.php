<?php
require_once '../Model/database.php';
require_once '../Model/db_config.php';
// require_once '../Model/Notification.php';

class BillPayment extends mysqladpter  {
    private $table1 = 'bank_account';  
    private $source_account_id;
    private $amount;

    public function __construct() {
        global $config;
        parent::__construct($config);
    }


    public function insertData($Amount, $From) {
        $this->source_account_id = $From;
        $this->Amount = $Amount;

        $arr = array(
            'FromAccount' => $this->source_account_id,
            'Amount' => $this->Amount
        );

        $validation = $this->validateBillPayment();
        if (!$validation['success']) {
            return $validation;
        }
        $this->updateBalance();

        return ['success' => true, 'message' => 'Bill payment completed successfully'];
    }

    private function validateBillPayment() {
        if (!$this->check_row($this->table1, "ID = '{$this->source_account_id}'")) {
            return ['success' => false, 'message' => 'Sender account not found'];
        }
        if ($this->Amount <= 0) {
            return ['success' => false, 'message' => 'Amount must be positive'];
        }

        $balance = $this->getAccountBalance($this->source_account_id);
        if ($balance < $this->Amount) {
            return ['success' => false, 'message' => 'Insufficient balance'];
        }

        return ['success' => true];
    }
    public function getAccountBalance($accountId) {
        $this->query("SELECT balance FROM {$this->table1} WHERE ID = '$accountId'");
        $row = $this->fetch();
        return (float)$row['balance'];
    }

    
    public function updateBalance() {
        $this->query("UPDATE {$this->table1} SET balance = balance - {$this->Amount} WHERE ID = '{$this->source_account_id}'");
    }


    }


?>
