<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style_product.css">

    <title>THÊM ĐƠN HÀNG</title>
</head>
<body>
<h2><center>Thêm đơn hàng</center></h2>
<form method="post">
    <label for="CustomerID">Mã Khách hàng:</label>
    <input type="number" name="CustomerID" required><br>

    <label for="Orderdate">Ngày đặt hàng:</label>
    <input type="datetime-local" id="Orderdate" name="Orderdate"><br>

    <label for="Total">Tổng tiền:</label>
    <input type="number" name="Total" step="1000" required><br>

    <label for="ShipAdd">Địa chỉ nhận hàng:</label>
    <input type="text" name="ShipAdd" required><br>

    <label for="status">Trạng thái:</label>
    <input type="text" name="status" required><br>

        <br>

        <button type="submit">Thêm đơn hàng</button>
</form>


<?php
require 'database.php';



    $db = new database();
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $CustomerID = $_POST['CustomerID'];
        $Orderdate = $_POST['Orderdate'];
        $total = $_POST['Total'];
        $address = $_POST['ShipAdd'];
        $status = $_POST['status'];

        $sql = "INSERT INTO orderlist (Customer_ID, Date_Order, Total_Amount, Ship_Address, Order_Status)  
                VALUES ('$CustomerID', '$Orderdate', '$total', '$address', '$status')";
                $db->set_query($sql);
                $db->execute_query();

    
}




?>
</body>
</html>