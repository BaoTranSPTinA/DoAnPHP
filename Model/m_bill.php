<?php
    require_once("database.php");
   class Bill extends Database
   {
    public function create_1_Bill($CustomerID,  $total, $address, $status)
    {
        $sql = "INSERT INTO bill (Customer_ID, Total_Amount, Ship_Address, Order_Status)  
                VALUES ('$CustomerID',  '$total', '$address', '$status')";
        $this->set_query($sql);
        $this->execute_query();
        $this->close();

    }

    public function delete_1_Bill($id)
    {
        $sql = "DELETE FROM Bill WHERE Order_ID = '$id'";
        $this->set_query($sql);
        $this->execute_query();
        $this->close();
    }

    public function update_1_Bill($id,$CustomerID,  $total, $address, $status)
    {
        $sql = "UPDATE Bill SET Customer_ID = '$CustomerID', 
                                Total_Amount = '$total', 
                                Ship_Address = '$address',
                                Order_Status = '$status'
                where Order_ID = '$id' ";
        $this->set_query($sql);
        $this->execute_query();
        $this->close();
    }
    public function list_all_bill()
    {
        $sql = "SELECT * FROM bill";
        $this->set_query($sql);
        $result = $this->execute_query();
        $list_bill = array();

        if($result->num_rows > 0){
            while($row = $result->fetch_assoc()){
                $list_bill[] = $row;
            }
        }

        return $list_bill;
    }

   }
?>