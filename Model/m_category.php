<?php
    require_once("database.php");
   class Category extends Database
   {
    public function create_1_Category($CategoryName)
    {
        $sql = "INSERT INTO Category ( Category_Name) VALUES ( '$CategoryName')";
        $this->set_query($sql);
        $this->execute_query();
        $this->close();

    }

    public function delete_1_category($Category_Name)
    {
        $sql = "DELETE FROM Category WHERE Category_Name = '$Category_Name'";
        $this->set_query($sql);
        $this->execute_query();
        $this->close();
    }

    public function update_1_category($id, $Category_Name)
    {
        $sql = "UPDATE Category SET Category_Name = '$Category_Name' 
                where Category_ID = '$id' ";
        $this->set_query($sql);
        $this->execute_query();
        $this->close();
    }

    public function list_all_category()
    {
        $sql = "SELECT * FROM Category";
        $this->set_query($sql);
        
        // Kiểm tra xem câu truy vấn có thành công không
        if ($this->execute_query()) {
            $result = $this->stmt->get_result(); // Lấy kết quả truy vấn
            
            $list_category = array();
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $list_category[] = $row;
                }
            }
            return $list_category;
        } else {
            return [];  // Trả về mảng rỗng nếu câu truy vấn thất bại
        }
    }

   }
?>