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

    public function list_all_user()
    {
        $sql = "SELECT * FROM user";
        $this->set_query($sql);
        $result = $this->execute_query();
        $list_user = array();

        if($result->num_rows > 0){
            while($row = $result->fetch_assoc()){
                $list_user[] = $row;
            }
        }

        return $list_user;
    }

   }
?>