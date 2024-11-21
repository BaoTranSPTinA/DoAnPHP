<?php
    require_once("database.php");
   class User extends Database
   {
    public function create_1_User($CustomerName, $Username, $Password, $Email, $PhoneNumber, $Address)
    {
        $sql = "INSERT INTO User ( Customer_Name, username, Password, Email, Phone_Number, Address) VALUES
         ( '$CustomerName', '$Username', '$Password', '$Email', '$PhoneNumber', '$Address')";
        $this->set_query($sql);
        $this->execute_query();
        $this->close();

    }

    public function delete_1_User($CustomerName)
    {
        $sql = "DELETE FROM User WHERE Customer_Name = '$CustomerName'";
        $this->set_query($sql);
        $this->execute_query();
        $this->close();
    }

    public function update_1_user($id, $CustomerName, $Username, $Password, $Email, $PhoneNumber, $Address)
    {
        $sql = "UPDATE User SET Customer_Name = '$CustomerName' , 
                                username = '$Username', 
                                Password = '$Password', 
                                Email = '$Email', 
                                Phone_Number = '$PhoneNumber', 
                                Address = '$Address' 
                where Customer_id = '$id'";
        $this->set_query($sql);
        $this->execute_query();
        $this->close();
    }

   }
?>