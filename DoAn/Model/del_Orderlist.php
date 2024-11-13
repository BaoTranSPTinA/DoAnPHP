<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style_product.css">
    <title>XÓA ĐƠN HÀNG</title>
</head>
<body>
    <!-- Form thêm danh mục mới -->
     <h1><center>XÓA ĐƠN HÀNG </center></h1>
<form method="POST">
    <label for="OrderlistID">Mã dơn hàng:</label>
    <input type="text" name="OrderlistID" required><br>
    <br>

    <button type="submit">Xóa đơn hàng</button>
</form>



<?php
require_once("database.php");
global $conn;
$db = new database();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $OrderID = $_POST['OrderlistID'];
    if (!empty($OrderID)) {
        $sql = "DELETE FROM Orderlist WHERE Order_ID = '$OrderID'";
        $db->set_query($sql);
        $db->execute_query();
    }

    $db->Close();
}
?>
</body>
</html>




