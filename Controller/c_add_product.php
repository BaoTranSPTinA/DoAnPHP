<?php
        require('../model/m_product.php');

        session_start();
        $ProductName = $_POST['ProductName'];
        $CategoryID = $_POST['CategoryID'];
        $description = $_POST['Description'];
        $price = $_POST['Price'];
        $StockQuantity = $_POST['StockQuantity'];

        $new_building = new Product();
        $new_building->create_1_product($ProductName, $CategoryID, $description, $price, $StockQuantity);
?>

<script>
        window.close();
</script>