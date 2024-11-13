<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style_user.css">
    <title>ĐĂNG NHẬP TÀI KHOẢN</title>
</head>
<body>
<h1><center>ĐĂNG NHẬP TÀI KHOẢN</center></h1><br>
<form method="POST">
    <label for="UserName">Tên Username:  </label>
    <input type="text" name="UserName" required><br>

    <label for="Password">Mật khẩu:  </label>
    <input type="password" name="Password" required><br>
    <br>

    <button type="submit">Đăng nhập</button>
</form>

<?php
    require_once("database.php");
    $db = new database();
    $result;
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $Username = $_POST['UserName'];
        $Password = $_POST['Password'];
        if (!empty($Username) && !empty($Password) ) {
            $sql = "SELECT * FROM User WHERE username = '$Username' AND Password = '$Password' limit 1" ;
            $db->set_query($sql);
            $result = $db->execute_query();
        }

        if($result->num_rows > 0){
            $_SESSION['username'] = $Username;
            echo ("Đăng nhập thành công");
        }
        else{
            echo ("Tài khoản không tồn tại");
        }
    
        $db->Close();
    }
?>

</body>
</html>