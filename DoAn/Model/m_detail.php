<?php
    require_once("database.php");
   class Detail extends Database
   {
    public function create_1_Detail( $OrderID, $ProductID, $Quantity)
    {
        $sql = "INSERT INTO detail ( Order_ID, Product_ID, Quantity)  
                VALUES ( $OrderID, $ProductID, $Quantity)";
        $this->set_query($sql);
        $this->execute_query();
        $this->close();

    }

    public function delete_1_detail($id)
    {
        $sql = "DELETE FROM detail WHERE Cart_ID = '$id'";
        $this->set_query($sql);
        $this->execute_query();
        $this->close();
    }

    public function update_1_detail($id, $OrderID, $ProductID, $Quantity)
    {
        $sql = "UPDATE detail SET Order_ID = $OrderID ,
                                Product_ID = $ProductID, 
                                Quantity = $Quantity
                where Cart_ID = $id ";
        $this->set_query($sql);
        $this->execute_query();
        $this->close();
    }

   }
?>