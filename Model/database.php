<?php

class mysqladpter {
    protected $config = array();
    protected $link;
    protected $result;

    public function __construct(array $config) {
        if (count($config) !== 4) {
            throw new InvalidArgumentException('Invalid number of connection parameters');
        }
        $this->config = $config;
    }

    public function connect() {
        if ($this->link === null) {
            list($host, $user, $password, $database) = $this->config;
            $this->link = @mysqli_connect($host, $user, $password, $database);
            if (!$this->link) {
                throw new RuntimeException('Error connecting to the server: ' . mysqli_connect_error());
            }
        }
        return $this->link;
    }

    public function query($query) {
        if (!is_string($query) || empty($query)) {
            throw new InvalidArgumentException('Query is not valid');
        }
        $this->connect();
        $this->result = mysqli_query($this->link, $query);
        if (!$this->result) {
            throw new RuntimeException('Query failed: ' . mysqli_error($this->link));
        }
        return $this->result;
    }

    public function select($table_name, $where = '', $fields = '*', $order = '', $limit = null, $offset = null) {
        $query = 'SELECT ' . $fields . ' FROM ' . $table_name .
            ($where ? ' WHERE ' . $where : '') .
            ($order ? ' ORDER BY ' . $order : '') .
            ($limit ? ' LIMIT ' . (int)$limit : '') .
            ($offset ? ' OFFSET ' . (int)$offset : '');
          $this->query($query);
         return $this->countRows();
    }

    public function insert($table_name, array $data) {
        $fields = implode(',', array_keys($data));
        $values = implode(',', array_map(function ($value) {
            return "'" . addslashes($value) . "'";
        }, array_values($data)));

        $query = "INSERT INTO $table_name ($fields) VALUES ($values)";
        return $this->query($query); // return boolean true => if valid,false=>not valid
    }

    public function update($table_name, array $data, $where) { // return boolean 
        if (empty($where)) {
            throw new InvalidArgumentException('WHERE clause is required for UPDATE.');
        }

        $set = array();
        foreach ($data as $key => $value) {
            $set[] = "$key = '" . addslashes($value) . "'";
        }
        $set_clause = implode(', ', $set);

        $query = "UPDATE $table_name SET $set_clause WHERE $where";
        return $this->query($query);
    }

    public function delete($table_name, $where) {
        if (empty($where)) {
            throw new InvalidArgumentException('WHERE clause is required for DELETE.');
        }

        $query = "DELETE FROM $table_name WHERE $where";
        return $this->query($query);
    }

    public function fetchAll() {
        $rows = [];
        while ($row = mysqli_fetch_assoc($this->result)) {
            $rows[] = $row;
        }
        return $rows;
    }
    public function fetch() {
        return mysqli_fetch_assoc($this->result);
    }
    

    public function countRows() {
        return mysqli_num_rows($this->result);
    }
    public function check_row ($table_name, $where = '', $fields = '*', $order = '', $limit = null, $offset = null) {
        $query = 'SELECT ' . $fields . ' FROM ' . $table_name .
            ($where ? ' WHERE ' . $where : '') .
            ($order ? ' ORDER BY ' . $order : '') .
            ($limit ? ' LIMIT ' . (int)$limit : '') .
            ($offset ? ' OFFSET ' . (int)$offset : '');
         $this->query($query);
         return ($result && mysqli_num_rows($result) > 0);
         
    }
}

?>
 