<?php
        require('../model/m_user.php');

        session_start();
        $CustomerName = $_POST['CustomerName'];
        $Username = $_POST['UserName'];
        $Password = $_POST['Password'];
        $Email = $_POST['Email'];
        $PhoneNumber = $_POST['PhoneNumber'];
        $Address = $_POST['Address'];


        $new_building = new User();
        $new_building->create_1_User($CustomerName, $Username, $Password, $Email, $PhoneNumber, $Address);
?>