<?php
        require('../model/m_bill.php');

        session_start();
        $id = $_POST['id'];
        $CustomerID = $_POST['CustomerID'];
        $total = $_POST['Total'];
        $address = $_POST['ShipAdd'];
        $status = $_POST['status'];
        


        $bill = new Bill();
        $bill->update_1_Bill($id, $CustomerID,  $total, $address, $status);
?>

<script>
        window.close();
</script>