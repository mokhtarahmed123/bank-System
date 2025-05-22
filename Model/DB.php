<?php
class DBController1 {
    public $dbHost = "localhost";
    public $dbUser = "root";
    public $dbPassword = "";
    public $dbName = "signup";
    public $connection;

    public function openConnection() {
        $this->connection = new mysqli($this->dbHost, $this->dbUser, $this->dbPassword, $this->dbName);
        if ($this->connection->connect_error) {
            echo "Error in Connection: " . $this->connection->connect_error;
            return false;
        }
        return true;
    }

    public function closeConnection() {
        if ($this->connection) {
            $this->connection->close();
        } else {
            echo "Connection is not opened";
        }
    }

    public function select($qry) {
        $result = $this->connection->query($qry);
        if (!$result) {
            echo "Error: " . mysqli_error($this->connection);
            return false;
        }
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function insert($table, $data) {
        $fields = implode(", ", array_keys($data));
        $values = implode(", ", array_map(function ($value) {
            return "'" . addslashes($value) . "'";
        }, array_values($data)));

        $qry = "INSERT INTO $table ($fields) VALUES ($values)";
        $this->connection->query($qry);
        return $this->connection->insert_id;  
    }

    public function update($qry) {
        return $this->connection->query($qry);
    }

    public function delete($qry) {
        return $this->connection->query($qry);
    }
    public function check_row($table, $condition) {
    $this->query("SELECT COUNT(*) as count FROM {$table} WHERE {$condition}");
    $row = $this->fetch();
    return $row['count'] > 0;
}

public function fetch() {
    return mysqli_fetch_assoc($this->result);
}

}
?>
