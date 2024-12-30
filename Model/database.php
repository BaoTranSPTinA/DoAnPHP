<?php
class Database
{
    public $CONFIG_servername = "localhost";
    public $CONFIG_username = "root";
    public $CONFIG_password = "";
    public $CONFIG_dbname = "do_an";

    public $conn;
    public $query = null;
    public $stmt = null;

    public function __construct()
    {
        $this->conn = new mysqli($this->CONFIG_servername, $this->CONFIG_username, $this->CONFIG_password, $this->CONFIG_dbname);

        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
    }

    
    public function set_query($sql)
    {
        $this->query = $sql;
        if ($this->conn && !$this->conn->connect_error) {
            $this->stmt = $this->conn->prepare($sql);
            if (!$this->stmt) {
                throw new Exception("Prepare failed: " . $this->conn->error);
            }
        } else {
            throw new Exception("Database connection is closed or invalid");
        }
    }

    
    public function bind_params($types, ...$params)
    {
        if ($this->stmt) {
            $this->stmt->bind_param($types, ...$params);
        }
    }

   
    public function execute_query()
    {
        if ($this->stmt) {
            return $this->stmt->execute();
        }
        return false;
    }

    
    public function fetch_row()
    {
        if ($this->stmt) {
            $result = $this->stmt->get_result();
            return $result->fetch_assoc();
        }
        return null;
    }
    public function fetch_all_rows()
    {
        if ($this->stmt) {
            $result = $this->stmt->get_result();
            return $result->fetch_all(MYSQLI_ASSOC);
        }
        return [];
    }

    
    public function get_last_insert_id()
    {
        return $this->conn->insert_id;
    }


    public function get_last_error()
    {
        if ($this->stmt) {
            return $this->stmt->error;
        }
        return $this->conn->error;
    }

    
    public function begin_transaction()
    {
        $this->conn->begin_transaction();
    }

   
    public function commit_transaction()
    {
        $this->conn->commit();
    }

    
    public function rollback_transaction()
    {
        $this->conn->rollback();
    }

    public function __destruct() 
    {
        if ($this->stmt) {
            $this->stmt->close();
        }
        if ($this->conn) {
            $this->conn->close();
        }
    }
}
?>