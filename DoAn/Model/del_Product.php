<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style_product.css">
    <title>XÓA DANH MỤC</title>
</head>
<body>
    <!-- Form thêm danh mục mới -->
     <h1><center>XÓA SẢN PHẨM </center></h1>
<form method="POST">
    <label for="ProductName">Tên sản phẩm:</label>
    <input type="text" name="ProductName" required><br>
    <br>

    <button type="submit">Xóa sản phẩm</button>
</form>



<?php
require_once("database.php");
global $conn;
$db = new database();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $ProductName = $_POST['ProductName'];
    if (!empty($ProductName)) {
        $sql = "DELETE FROM Product WHERE Product_Name = '$ProductName'";
        $db->set_query($sql);
        $db->execute_query();
    }

    $db->Close();
}
?>
</body>
</html>




