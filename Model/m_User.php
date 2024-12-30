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


    }

    public function delete_1_User($CustomerName)
    {
        // Xóa thông tin từ bảng UserInformation trước
        $sql_info = "DELETE FROM UserInformation WHERE Customer_ID IN (SELECT Customer_ID FROM User WHERE Customer_Name = ?)";
        $this->set_query($sql_info);
        $this->bind_params("s", $CustomerName);
        $this->execute_query();

        // Sau đó xóa từ bảng User
        $sql_user = "DELETE FROM User WHERE Customer_Name = ?";
        $this->set_query($sql_user);
        $this->bind_params("s", $CustomerName);
        $this->execute_query();
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
  
    }

    public function list_all_user()
    {
        $sql = "SELECT * FROM user WHERE Role = 'user'";
        $this->set_query($sql);
        
        if ($this->execute_query()) {
            $result = $this->stmt->get_result(); 

            $list_user = array();
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $list_user[] = $row;
                }
            }
            return $list_user;
        } else {
            return []; 
        }
    }

    public function get_user_by_id($id) {
        $sql = "SELECT Customer_ID, Customer_Name, Email, Phone_Number, Address 
                FROM User 
                WHERE Customer_ID = '$id'";
    
        $this->set_query($sql);
        if ($this->execute_query()) {
            $result = $this->stmt->get_result();
            return $result->fetch_assoc();
        } else {
            return null;
        }
    }
    
    public function update_user_by_id($id, $CustomerName, $Email, $PhoneNumber, $Address) {
        $sql = "UPDATE User 
                SET Customer_Name = '$CustomerName', Email = '$Email', Phone_Number = '$PhoneNumber', Address = '$Address' 
                WHERE Customer_ID = '$id'";
    
        $this->set_query($sql);
        return $this->execute_query();
    }
    
   }
?>