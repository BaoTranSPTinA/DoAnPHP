<?php
require_once("database.php");
class Bill extends Database
{
    public function create_1_Bill($CustomerID, $total, $address, $status)
    {
        $sql = "INSERT INTO bill (Customer_ID, Total_Amount, Ship_Address, Order_Status)  
                VALUES (?, ?, ?, ?)";
        $this->set_query($sql);
        $this->bind_params("idss", $CustomerID, $total, $address, $status); // Kiểm tra kiểu dữ liệu tham số
        $this->execute_query();

        $OrderID = $this->conn->insert_id; // Lấy ID của đơn hàng vừa tạo

        return $OrderID; // Trả về OrderID
    }


    public function delete_1_Bill($id)
    {
        $sql = "DELETE FROM Bill WHERE Order_ID = ?";
        $this->set_query($sql);
        $this->bind_params("i", $id); // Ràng buộc tham số kiểu số nguyên
        $this->execute_query();
   
    }

    public function update_1_Bill($id, $CustomerID, $total, $address, $status)
    {
        $sql = "UPDATE Bill SET Customer_ID = ?, 
                                Total_Amount = ?, 
                                Ship_Address = ?,
                                Order_Status = ?
                WHERE Order_ID = ?";
        $this->set_query($sql);
        $this->bind_params("idssi", $CustomerID, $total, $address, $status, $id); // Ràng buộc tham số đúng loại
        $this->execute_query();
  
    }

    public function list_all_bill()
    {
        $sql = "SELECT * FROM bill";
        $this->set_query($sql);

        if ($this->execute_query()) {
            $result = $this->stmt->get_result(); 
            $list_bill = array();

            while ($row = $result->fetch_assoc()) {
                $list_bill[] = $row;
            }

            return $list_bill; 
        } else {
            die("Lỗi truy vấn: " . $this->get_last_error()); 
        }
    }

    public function get_bills_by_customer($CustomerID) {
        $sql = "SELECT * FROM bill WHERE Customer_ID = ? ORDER BY create_time DESC";
        $this->set_query($sql);
        $this->bind_params("i", $CustomerID);
        
        if ($this->execute_query()) {
            $result = $this->stmt->get_result();
            $bills = array();
            
            while ($row = $result->fetch_assoc()) {
                $bills[] = $row;
            }
            
            return $bills;
        } else {
            return array(); 
        }
    }

    public function get_bill_by_id($id) {
        $sql = "SELECT * FROM bill WHERE Order_ID = ?";
        $this->set_query($sql);
        $this->bind_params("i", $id);
        
        if ($this->execute_query()) {
            $result = $this->stmt->get_result();
            return $result->fetch_assoc();
        }
        return null;
    }

    public function count_customer_orders($CustomerID) {
        $sql = "SELECT COUNT(*) as order_count FROM bill WHERE Customer_ID = ? ORDER BY create_time DESC";
        $this->set_query($sql);
        $this->bind_params("i", $CustomerID);
        
        if ($this->execute_query()) {
            $result = $this->stmt->get_result();
            $row = $result->fetch_assoc();
            return $row['order_count'];
        }
        return 0;
    }
}
?>
