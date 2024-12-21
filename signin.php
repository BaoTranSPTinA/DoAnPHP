<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Model/style_user.css">
    <title>ĐĂNG NHẬP TÀI KHOẢN</title>
</head>
<body>
<h1><center>ĐĂNG NHẬP TÀI KHOẢN</center></h1><br>
<form method="POST" action="Controller/c_signin.php">
    <label for="UserName">Tên Username:  </label>
    <input type="text" name="UserName" required><br>

    <label for="Password">Mật khẩu:  </label> 
    <input type="password" name="Password" required><br>
    <br>

    <button type="submit">Đăng nhập</button>
</form>
</body>
</html>