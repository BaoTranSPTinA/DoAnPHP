<?php
require_once("database.php");

class Product extends Database
{
    public function create_1_product($ProductName, $CategoryID, $description, $price, $StockQuantity)
    {
        $sql = "INSERT INTO Product (Product_Name, Category_ID, Description, Price, Stock_Quantity) 
                VALUES ('$ProductName', $CategoryID, '$description', $price, $StockQuantity)";
        $this->set_query($sql);
        $this->execute_query();
        $this->close();
    }

    public function delete_1_product($ProductName)
    {
        $sql = "DELETE FROM Product WHERE Product_Name = '$ProductName'";
        $this->set_query($sql);
        $this->execute_query();
        $this->close();
    }

    public function update_1_product($id, $ProductName, $CategoryID, $description, $price, $StockQuantity)
    {
        $sql = "UPDATE Product SET Product_Name = '$ProductName', 
                                   Category_ID = '$CategoryID', 
                                   Description = '$description', 
                                   Price = '$price', 
                                   Stock_Quantity = '$StockQuantity'
                WHERE Product_ID = '$id'";
        $this->set_query($sql);
        $this->execute_query();
        $this->close();
    }

    public function getProductData($productID)
    {
        $sql = "SELECT * FROM products WHERE ProductID = $productID";    
        $this->set_query($sql);
        
        if ($this->execute_query()) {
            return $this->fetch_row();  
        } else {
            return null;  
        }
    }

    public function list_all_product()
    {
        $sql = "SELECT * FROM product";
        $this->set_query($sql);
        
        // Kiểm tra xem câu truy vấn có thành công không
        if ($this->execute_query()) {
            $result = $this->stmt->get_result(); // Lấy kết quả truy vấn
            
            $list_product = array();
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $list_product[] = $row;
                }
            }
            return $list_product;
        } else {
            return [];  // Trả về mảng rỗng nếu câu truy vấn thất bại
        }
    }
}
?>
