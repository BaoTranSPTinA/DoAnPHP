<?php
        require('../model/m_product.php');

        session_start();
        $id = $_POST['id'];
        $ProductName = $_POST['ProductName'];
        $CategoryID = $_POST['CategoryID'];
        $description = $_POST['Description'];
        $price = $_POST['Price'];
        $StockQuantity = $_POST['StockQuantity'];

    
        $new_building = new Product();
        $new_building->update_1_product($id, $ProductName, $CategoryID, $description, $price, $StockQuantity);
?>