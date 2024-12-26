<?php
        require('../model/m_detail.php');

        session_start();
        $id = $_POST['id'];
        $OrderID = $_POST['oid'];
        $ProductID = $_POST['pid'];
        $Quantity = $_POST['Quantity'];


        $detail = new Detail();
        $detail->update_1_detail($id, $OrderID, $ProductID, $Quantity);