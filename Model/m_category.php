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

   }
?>