<?php
    require_once("database.php");
   
    class Category extends Database
    {
        public function create_1_Category($CategoryName)
        {
            $sql = "INSERT INTO Category (Category_Name) VALUES ('$CategoryName')";
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
            $sql = "UPDATE Category SET Category_Name = '$Category_Name' WHERE Category_ID = '$id'";
            $this->set_query($sql);
            $this->execute_query();
            $this->close();
        }

        public function list_all_category()
        {
            $sql = "SELECT * FROM Category";
            $this->set_query($sql);
            
            if ($this->execute_query()) {
                $result = $this->stmt->get_result();
                $list_category = array();
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        $list_category[] = $row;
                    }
                }
                return $list_category;
            } else {
                return [];
            }
        }

        // Get category by ID
        public function get_category_by_id($id)
        {
            $sql = "SELECT * FROM Category WHERE Category_ID = '$id'";
            $this->set_query($sql);
            
            if ($this->execute_query()) {
                $result = $this->stmt->get_result();
                if ($result->num_rows > 0) {
                    return $result->fetch_assoc();
                } else {
                    return null;  // Category not found
                }
            } else {
                return null;
            }
        }

        // Get products by category ID
        public function get_products_by_category($category_id)
        {
            $sql = "SELECT * FROM Product WHERE Category_ID = '$category_id'";
            $this->set_query($sql);
            
            if ($this->execute_query()) {
                $result = $this->stmt->get_result();
                $products = array();
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        $products[] = $row;
                    }
                }
                return $products;
            } else {
                return [];
            }
        }
    }
?>
