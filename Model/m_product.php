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
                                   Stock_Quantity =  '$StockQuantity'
                where Product_ID = '$id' " ;
        $this->set_query($sql);
        $this->execute_query();
        $this->close();
    }

   }
?>