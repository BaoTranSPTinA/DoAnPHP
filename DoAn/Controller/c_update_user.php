<?php
        require('../model/m_user.php');

        session_start();
        $id = $_POST['id'];
        $CustomerName = $_POST['CustomerName'];
        $Username = $_POST['UserName'];
        $Password = $_POST['Password'];
        $Email = $_POST['Email'];
        $PhoneNumber = $_POST['PhoneNumber'];
        $Address = $_POST['Address'];


        $new_building = new User();
        $new_building->Update_1_User($id, $CustomerName, $Username, $Password, $Email, $PhoneNumber, $Address);
?>