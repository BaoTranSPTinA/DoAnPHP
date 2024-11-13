<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style_user.css">
    <title>XÓA TÀI KHOẢN</title>
</head>
<body>
<h1><center>XÓA TÀI KHOẢN KHÁCH HÀNG</center></h1><br>
<form method="POST">
    <label for="CustomerName">Họ tên khách hàng: </label>
    <input type="text" name="CustomerName" required><br>
    <br>
    <button type="submit">XÓA</button>

</form>

<?php
    require_once("database.php");
    $db = new database();
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $CustomerName = $_POST['CustomerName'];
        if (!empty($CustomerName) ) {
            $sql = "DELETE FROM User WHERE Customer_Name = '$CustomerName'";
            $db->set_query($sql);
            $db->execute_query();
        }
    
        $db->Close();
    }


?>



</body>
</html>