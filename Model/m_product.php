<?php
require_once("database.php");

class Product extends Database
{
    public function create_1_product($ProductName, $CategoryID, $description, $price, $StockQuantity, $avatar_path)
    {
        $avatar_path = "../Uploads/" . basename($avatar_path);

        $sql = "INSERT INTO Product (Product_Name, Category_ID, avatar, Description, Price, Stock_Quantity) 
                VALUES ('$ProductName', '$CategoryID', '$avatar_path', '$description', '$price', '$StockQuantity')";
        $this->set_query($sql);
        $this->execute_query();
    }



    public function delete_1_product($ProductName)
    {
        $sql = "DELETE FROM Product WHERE Product_Name = '$ProductName'";
        $this->set_query($sql);
        $this->execute_query();

    }

    public function update_1_product($id, $ProductName, $CategoryID, $description, $price, $StockQuantity, $avatar_path = NULL)
    {
        // Cập nhật thông tin sản phẩm
        $sql = "UPDATE Product SET Product_Name = '$ProductName', 
                                Category_ID = '$CategoryID', 
                                Description = '$description', 
                                Price = '$price', 
                                Stock_Quantity = '$StockQuantity'";

        // Nếu có hình ảnh, thêm phần cập nhật avatar
        if ($avatar_path) {
            $sql .= ", avatar = '$avatar_path'";
        }

        $sql .= " WHERE Product_ID = '$id'";

        $this->set_query($sql);
        $this->execute_query();

    }

    public function getProductData($productID)
    {
        $sql = "SELECT * FROM Product WHERE Product_ID = $productID";    
        $this->set_query($sql);
        
        if ($this->execute_query()) {
            return $this->fetch_row();  
        } else {
            return null;  
        }
    }

    public function get_products_by_category($CategoryID)
    {
        $sql = "SELECT * FROM Product WHERE Category_ID = '$CategoryID'";
        $this->set_query($sql);

        // Kiểm tra xem câu truy vấn có thành công không
        if ($this->execute_query()) {
            $result = $this->stmt->get_result(); // Lấy kết quả truy vấn

            $products = array();
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $products[] = $row;
                }
            }
            return $products;
        } else {
            return []; // Trả về mảng rỗng nếu câu truy vấn thất bại
        }
    }

    public function get_product_by_id($id) {
        $query = "SELECT * FROM Product WHERE Product_ID = $id";
        $result = $this->conn->query($query);
        return $result->fetch_assoc();
    }

    public function list_all_product()
    {
        $sql = "SELECT * FROM Product";
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
    public function search_products($keyword) {
        $keyword = "%{$keyword}%";
        $sql = "SELECT * FROM Product WHERE Product_Name LIKE ?";
        $this->set_query($sql);
        $this->bind_params("s", $keyword);
        
        if ($this->execute_query()) {
            $result = $this->stmt->get_result();
            $products = array();
            while ($row = $result->fetch_assoc()) {
                $products[] = $row;
            }
            return $products;
        }
        return array();
    }
}
?>