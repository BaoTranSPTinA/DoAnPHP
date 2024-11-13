<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style_user.css">
    <title>ĐĂNG KÍ TÀI KHOẢN MỚI</title>
</head>
<body>
<h1><center>ĐĂNG KÍ TÀI KHOẢN NGƯỜI DÙNG MỚI</center></h1><br>
<form method="POST">
    <label for="CustomerName">Họ tên khách hàng: </label>
    <input type="text" name="CustomerName" required><br>

    <label for="UserName">Tên Username:  </label>
    <input type="text" name="UserName" required><br>

    <label for="Password">Mật khẩu:  </label>
    <input type="text" name="Password" required><br>

    <label for="Email">Email: </label>
    <input type="text" name="Email" required><br>

    <label for="PhoneNumber">Số điện thoại: </label>
    <input type="text" name="PhoneNumber" required><br>

    <label for="Address">Địa chỉ: </label>
    <input type="text" name="Address" required><br>
    <br>

    <button type="submit">Đăng kí</button>
</form>

<?php
    require_once("database.php");
    $db = new database();
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $CustomerName = $_POST['CustomerName'];
        $Username = $_POST['UserName'];
        $Password = $_POST['Password'];
        $Email = $_POST['Email'];
        $PhoneNumber = $_POST['PhoneNumber'];
        $Address = $_POST['Address'];

        if (!empty($CustomerName) && !empty($Username) && !empty($Password) && !empty($Email) && !empty($PhoneNumber) && !empty($Address)) {
            $sql = "INSERT INTO User ( Customer_Name, username, Password, Email, Phone_Number, Address) VALUES ( '$CustomerName', '$Username', '$Password', '$Email', '$PhoneNumber', '$Address')";
            $db->set_query($sql);
            $db->execute_query();
        }
    
        $db->Close();
    }
?>

</body>
</html>