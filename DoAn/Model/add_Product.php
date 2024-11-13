<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style_product.css">
    <title>Thêm Sản phẩm</title>
</head>
<body>



<h2><center>Thêm sản phẩm mới</center></h2>
<form method="post">
    <label for="ProductName">Tên sản phẩm:</label>
    <input type="text" name="ProductName" required><br>

    <label for="Description">Mô tả:</label>
    <input type="text" name="Description" required></input><br>

    <label for="Price">Giá:</label>
    <input type="number" name="Price" step="1000" required><br>

    <label for="StockQuantity">Số lượng kho:</label>
    <input type="number" name="StockQuantity" required><br>

    <label for="CategoryID">Mã danh mục:</label>
    <input type="number" name="CategoryID" required><br>

    

   
        <br>

        <button type="submit">Thêm sản phẩm</button>
</form>






<?php
require 'database.php';

   

    $db = new database();
    global $conn;
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $ProductName = $_POST['ProductName'];
        $CategoryID = $_POST['CategoryID'];
        $description = $_POST['Description'];
        $price = $_POST['Price'];
        $StockQuantity = $_POST['StockQuantity'];

        $sql = "INSERT INTO Product (Product_Name, Category_ID, Description, Price, Stock_Quantity) 
                VALUES ('$ProductName', $CategoryID, '$description', $price, $StockQuantity)";
                $db->set_query($sql);
                $db->execute_query();

    
}




?>



</body>
</html>