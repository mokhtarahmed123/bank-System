<?php
require_once 'Model/db_config.php';
require_once 'Notification.php';

class Transfer implements Notification {
    private $_table1 = 'bank_account';
    private $_table2 = 'transaction';
    private $from_account;
    private $to_account;
    private $amount;
    private $date;
    private $db;

    public function __construct() {
        $this->db = new DBController();
        $this->db->openConnection();
    }

    public function Display($amount, $date, $from, $to) {
        return sprintf(
            "Transfer Notification: $%.2f from account %s to %s on %s",
            $amount,
            $from,
            $to,
            $date
        );
    }

    public function addTransfer($from_account, $to_account, $amount) {
        $this->from_account = $from_account;
        $this->to_account = $to_account;
        $this->amount = floatval($amount);
        $this->date = date('Y-m-d H:i:s');

        $validation = $this->validateTransfer();
        if (!$validation['success']) {
            return $validation;
        }

        try {
            // Get sender and receiver account details
            $sender = $this->getAccountDetails($this->from_account);
            $receiver = $this->getAccountDetails($this->to_account);
            
            if (!$sender || !$receiver) {
                throw new Exception('Invalid account details');
            }

            // Update balances
            $qry1 = "UPDATE {$this->_table1} SET balance = balance - {$this->amount} 
                     WHERE ID = {$sender['ID']}";
            $qry2 = "UPDATE {$this->_table1} SET balance = balance + {$this->amount} 
                     WHERE ID = {$receiver['ID']}";
            
            $this->db->insert($qry1);
            $this->db->insert($qry2);

            // Record transaction
            $qry3 = "INSERT INTO {$this->_table2} (source_account_id, destination_account_id, amount, transaction_date) 
                     VALUES ({$sender['ID']}, {$receiver['ID']}, {$this->amount}, '{$this->date}')";
            
            $this->db->insert($qry3);

            return [
                'success' => true,
                'message' => 'Transfer completed successfully',
                'notification' => $this->Display($this->amount, $this->date, $sender['owner_name'], $receiver['owner_name'])
            ];
        } catch (Exception $e) {
            return [
                'success' => false,
                'message' => 'Transfer failed: ' . $e->getMessage()
            ];
        }
    }

    private function getAccountDetails($identifier) {
        $qry = "SELECT * FROM {$this->_table1} 
                WHERE owner_name = '" . mysqli_real_escape_string($this->db->openConnection(), $identifier) . "' 
                OR user_id = '" . mysqli_real_escape_string($this->db->openConnection(), $identifier) . "' 
                LIMIT 1";
        $result = $this->db->select($qry);
        return !empty($result) ? $result[0] : null;
    }

    private function validateTransfer() {
        $sender = $this->getAccountDetails($this->from_account);
        if (!$sender) {
            return ['success' => false, 'message' => 'Sender account not found'];
        }

        $receiver = $this->getAccountDetails($this->to_account);
        if (!$receiver) {
            return ['success' => false, 'message' => 'Recipient account not found'];
        }

        if ($this->amount <= 0) {
            return ['success' => false, 'message' => 'Amount must be positive'];
        }

        if ($sender['balance'] < $this->amount) {
            return ['success' => false, 'message' => 'Insufficient balance'];
        }

        return ['success' => true];
    }

    public function getAllTransfers() {
        $qry = "SELECT t.*, 
                       s.owner_name as sender_name, 
                       r.owner_name as receiver_name 
                FROM {$this->_table2} t
                JOIN {$this->_table1} s ON t.source_account_id = s.ID
                JOIN {$this->_table1} r ON t.destination_account_id = r.ID
                ORDER BY t.transaction_date DESC";
        return $this->db->select($qry);
    }

    public function getTransfersByAccount($account_id) {
        $account = $this->getAccountDetails($account_id);
        if (!$account) {
            return [];
        }

        $qry = "SELECT t.*, 
                       s.owner_name as sender_name, 
                       r.owner_name as receiver_name 
                FROM {$this->_table2} t
                JOIN {$this->_table1} s ON t.source_account_id = s.ID
                JOIN {$this->_table1} r ON t.destination_account_id = r.ID
                WHERE t.source_account_id = {$account['ID']} 
                   OR t.destination_account_id = {$account['ID']}
                ORDER BY t.transaction_date DESC";
        return $this->db->select($qry);
    }

    public function __destruct() {
        $this->db->closeConnection();
    }
}
?> 