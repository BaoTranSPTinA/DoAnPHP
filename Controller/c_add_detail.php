<?php
        require('../model/m_detail.php');

        session_start();
        $OrderID = $_POST['oid'];
        $ProductID = $_POST['pid'];
        $Quantity = $_POST['quantity'];
 
        $new_building = new Detail();
        $new_building->create_1_Detail( $OrderID, $ProductID, $Quantity);