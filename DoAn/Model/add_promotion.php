<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style_product.css">
    <title>THÊM KHUYẾN MÃI</title>
</head>
<body>
    <h2><center>THÊM KHUYẾN MÃI </center></h2>
<form method="POST">
    <label for="promotionCode">Mã khuyến mãi: </label>
    <input type="text" name="promotionCode" required><br>

    <label for="percent">Phần trăm khuyến mãi:  </label>
    <input type="number" name="percent"  required><br>

    <label for="Startdate">Ngày bắt đầu:  </label>
    <input type="datetime-local" id="Startdate" name="Startdate"><br>

    <label for="Enddate">Ngày kết thúc:  </label>
    <input type="datetime-local" id="Enddate" name="Enddate"><br>

    <label for="ProductID">Mã sản phẩm:</label>
    <input type="number" name="ProductID" required><br>

    <br>

    <button type="submit">Thêm khuyến mãi</button>
</form>


<?php
require 'database.php';



    $db = new database();
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $PromotionCode = $_POST['promotionCode'];
        $percent = $_POST['percent'];
        $start = $_POST['Startdate'];
        $end = $_POST['Enddate'];
        $productid = $_POST['ProductID'];

        $sql = "INSERT INTO Promotion (Promotion_Code, Percent_Discount, Date_Start, Date_End, Product_ID)  
                VALUES ('$PromotionCode', $percent, '$start', '$end' , $productid)";
                $db->set_query($sql);
                $db->execute_query();

    
}




?>
    
</body>
</html>