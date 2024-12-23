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

    // Thiết lập câu lệnh SQL
    public function set_query($sql)
    {
        $this->query = $sql;
        $this->stmt = $this->conn->prepare($sql);
    }

    // Liên kết tham số với câu lệnh SQL
    public function bind_params($types, ...$params)
    {
        if ($this->stmt) {
            $this->stmt->bind_param($types, ...$params);
        }
    }

    // Thực thi câu lệnh SQL
    public function execute_query()
    {
        if ($this->stmt) {
            return $this->stmt->execute();
        }
        return false;
    }

    // Lấy kết quả trả về từ câu lệnh SELECT
    public function fetch_row()
    {
        if ($this->stmt) {
            $result = $this->stmt->get_result();
            return $result->fetch_assoc();
        }
        return null;
    }

    // Lấy ID của bản ghi mới được chèn vào
    public function get_last_insert_id()
    {
        return $this->conn->insert_id;
    }

    // Lấy lỗi cuối cùng trong kết nối hoặc câu lệnh SQL
    public function get_last_error()
    {
        if ($this->stmt) {
            return $this->stmt->error;
        }
        return $this->conn->error;
    }

    // Mở giao dịch (transaction)
    public function begin_transaction()
    {
        $this->conn->begin_transaction();
    }

    // Cam kết giao dịch (commit)
    public function commit_transaction()
    {
        $this->conn->commit();
    }

    // Hủy bỏ giao dịch (rollback)
    public function rollback_transaction()
    {
        $this->conn->rollback();
    }

    // Đóng kết nối
    public function close()
    {
        $this->conn->close();
    }
}
?>
