<?php
        require('../model/m_detail.php');

        session_start();
        $OrderID = $_POST['oid'];
        $ProductID = $_POST['pid'];
        $Quantity = $_POST['Quantity'];
 
        $detail = new Detail();
        $detail->create_1_Detail( $OrderID, $ProductID, $Quantity);