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
        $this->close();
    }

    public function delete_1_Bill($id)
    {
        $sql = "DELETE FROM Bill WHERE Order_ID = ?";
        $this->set_query($sql);
        $this->bind_params("i", $id); // Ràng buộc tham số kiểu số nguyên
        $this->execute_query();
        $this->close();
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
        $this->close();
    }

    public function list_all_bill()
    {
        $sql = "SELECT * FROM bill";
        $this->set_query($sql);

        if ($this->execute_query()) {
            $result = $this->stmt->get_result(); // Sử dụng get_result để lấy kết quả
            $list_bill = array();

            while ($row = $result->fetch_assoc()) {
                $list_bill[] = $row;
            }

            return $list_bill; // Trả về danh sách hóa đơn
        } else {
            die("Lỗi truy vấn: " . $this->get_last_error()); // In ra lỗi nếu có
        }
    }
}
?>
