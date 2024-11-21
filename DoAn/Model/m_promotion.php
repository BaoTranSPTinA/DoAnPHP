<?php
    require_once("database.php");
   class Promotion extends Database
   {
    public function create_1_promotion($PromotionCode, $percent, $start, $end , $productid)
    {
        $sql = "INSERT INTO Promotion (Promotion_Code, Percent_Discount, Date_Start, Date_End, Product_ID)  
                VALUES ('$PromotionCode', $percent, '$start', '$end' , $productid)";
        $this->set_query($sql);
        $this->execute_query();
        $this->close();

    }

    public function delete_1_promotion($id)
    {
        $sql = "DELETE FROM Promotion WHERE Promotion_ID = '$id'";
        $this->set_query($sql);
        $this->execute_query();
        $this->close();
    }

    public function update_1_promotion($id, $PromotionCode, $percent, $start, $end , $productid)
    {
        $sql = "UPDATE Promotion SET Promotion_Code = '$PromotionCode', 
                                     Percent_Discount = '$percent' , 
                                     Date_Start = '$start', 
                                     Date_End = '$end' , 
                                     Product_ID = '$productid'
                where Promotion_ID = '$id'" ;
        $this->set_query($sql);
        $this->execute_query();
        $this->close();
    }

   }
?>