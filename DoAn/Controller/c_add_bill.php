<?php
        require('../model/m_bill.php');

        session_start();
        $CustomerID = $_POST['CustomerID'];
        $total = $_POST['Total'];
        $address = $_POST['ShipAdd'];
        $status = $_POST['status'];
        


        $new_building = new Bill();
        $new_building->create_1_Bill($CustomerID,  $total, $address, $status);
?>