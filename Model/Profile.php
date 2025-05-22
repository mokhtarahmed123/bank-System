<?php
class UserAccount {
    private $id;
    private $name;
    private $phoneNumber;
    private $nationalId;
    private $bankName;
    private $bankNumber;
    private $username;
    private $isAccountLocked;
    private $createdTime;

    public function __construct(
        $name,
        $phoneNumber,
        $nationalId,
        $bankName,
        $bankNumber,
        $username,
        $password,
  
    ) {
        $this->name = $this->validateName($name);
        $this->phoneNumber = $this->validatePhone($phoneNumber);
        $this->nationalId = $this->validateNationalId($nationalId);
        $this->bankName = $bankName;
        $this->bankNumber = $this->maskBankNumber($bankNumber);
        $this->username = $this->validateEmail($username);
        $this->password = $this->encryptPassword($password);

        $this->createdTime = date('Y-m-d H:i:s');
    }

    private function validateName($name) {
        if (strlen(trim($name)) < 5) {
            throw new InvalidArgumentException("Error");
        }
        return htmlspecialchars($name);
    }

    private function validatePhone($phone) {
        if (!preg_match('/^[0-9]{10,15}$/', $phone)) {
            throw new InvalidArgumentException("Error");
        }
        return $phone;
    }

    private function validateNationalId($id) {
        if (!preg_match('/^[0-9]{10,14}$/', $id)) {
            throw new InvalidArgumentException("   Error");
        }
        return $id;
    }

    private function validateEmail($email) {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            throw new InvalidArgumentException("  Error ");
        }
        return $email;
    }

    private function encryptPassword($password) {
        if (strlen($password) < 6) {
            throw new InvalidArgumentException("   Error ");
        }
        return password_hash($password, PASSWORD_BCRYPT);
    }

    private function maskBankNumber($number) {
        return '**** **** **** ' . substr($number, -4);
    }

    public function getBankNumber($masked = true) {
        return $masked ? $this->bankNumber : $this->unmaskedBankNumber;
    }

    public function getName() {
        return $this->name;
    }

    public function getPhone() {
        return $this->phoneNumber;
    }



    public function verifyPassword($inputPassword) {
        return password_verify($inputPassword, $this->password);
    }

    public function toArray() {
        return [
            'name' => $this->name,
            'phone' => $this->phoneNumber,
            'national_id' => $this->nationalId,
            'bank_name' => $this->bankName,
            'bank_number' => $this->bankNumber,
            'username' => $this->username,
            'is_locked' => $this->isAccountLocked,
            'created_at' => $this->createdTime
        ];
    }
}

