<?php
        require('../model/m_detail.php');

        session_start();
        $id = $_POST['id'];
        $OrderID = $_POST['oid'];
        $ProductID = $_POST['pid'];
        $Quantity = $_POST['quantity'];


        $new_building = new Detail();
        $new_building->update_1_detail($id, $OrderID, $ProductID, $Quantity);