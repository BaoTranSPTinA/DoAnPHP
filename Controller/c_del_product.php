<?php
        require('../model/m_product.php');

        session_start();
        $ProductName = $_POST['ProductName'];
    
        $new_building = new Product();
        $new_building->delete_1_Product($ProductName);
?>

<script>
        window.close();
</script>