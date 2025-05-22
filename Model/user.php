<?php
    require_once '../Model/database.php';
    require_once '../Model/db_config.php';
    class user extends  mysqladpter {
        private $_table='usser';
            private $name;
            private $phone;
            private $national_id;
            private $bank_name;
            private $bank_number;
            private $username;
            private $password;

            public function __construct(){
                   global $config  ;
                   parent::__construct($config);

            }
            public function add_user($name, $phone, $id, $ba_name, $ba_numb, $username, $password) {
                $this->name = $name;
                $this->phone = $phone;
                $this->national_id = $id;
                $this->bank_name = $ba_name;
                $this->bank_number = $ba_numb;
                $this->username = $username;
                $this->password = $password;
            
                $data = array(
                    'name' => $this->name,
                    'phone_number' => $this->phone,
                    'National_id' => $this->national_id,
                    'bank_name' => $this->bank_name,
                    'bank_number' => $this->bank_number,
                    'username' => $this->username,
                    'PASWORD' => $this->password
                );
            
                return $this->insert( $this->_table, $data);
            }
            public function get_all_user(){
                $this->select($this->_table);
                return $this->fetchAll();   
            }
            public function get_user_id($id){
                $this->select($this->_table,"National_id ='$id'");
                return $this->fetch();
            }
            public function update_user($new_data,$id){ // return  boolean 
                return $this->update($this->_table,$new_data,"National_id='$id'");

            }
            public function deleteUser($id){// return  boolean 
                return $this->delete($this->_table,"National_id='$id'");

            }
            public function checkuser($id){
               return $this->select($this->_table,"National_id='$id'");

            }

            
   
    }

?>