<?php
    require_once '../Model/database.php';
    require_once '../Model/db_config.php';

class SendMoney extends mysqladpter  {
    private $table1 = 'bank_account'; 
    private $table2 = 'transaction';  
    private $source_account_id;
    private $contact_number;
    private $amount;

    public function __construct() {
        global $config;
        parent::__construct($config);
    }
   

    public function insertData($Amount, $From, $To) {
        $this->source_account_id = $From;
        $this->contact_number = $To;
        $this->Amount = $Amount;

        $arr = array(
            'FromAccount' => $this->source_account_id,
            'ToContact' => $this->contact_number,
            'Amount' => $this->Amount
        );

        
        $validation = $this->validateSendMoney();
        if (!$validation['success']) {
            return $validation;
        }

        $this->insert($this->table2, $arr);
        $this->updateBalance();
        return ['success' => true, 'message' => 'Transaction completed successfully'];
    }

    private function validateSendMoney() {
        if (!$this->check_row($this->table1, "ID = '{$this->source_account_id}'")) {
            return ['success' => false, 'message' => 'Sender account not found'];
        }

        if (!$this->check_contact_exists($this->contact_number)) {
            return ['success' => false, 'message' => 'Recipient contact not found'];
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
    private function check_contact_exists($contact) {
        $this->query("SELECT * FROM contacts WHERE contact_number = '$contact'");
        return $this->countRows() > 0;
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




