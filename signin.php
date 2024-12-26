<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ĐĂNG NHẬP TÀI KHOẢN</title>
</head>
<style>
body {
      margin: 0;
      font-family: Arial, sans-serif;
      background-color: #A13C1E;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      background-size: cover;
      background-position: center;
    }
.login-container{
     background-color: white;
      width: 400px;
      padding: 20px;
      box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
      border-radius: 8px;
    }
.login-container h1{
     text-align: center;
     color: #A13C1E;
     font-size: 30px;
}

.login-container input{
    width: 100%;
    padding: 10px;
    margin: 10px 0;
    border: 1px solid #ccc;
    border-radius: 4px;
    font-size: 15px;
    width: 350px;
}

.login-container input::placeholder{
    color: #888;
}

.login-container button{
    width: 370px;
    padding: 10px;
    background-color: #A13C1E;
    color: white;
    border: none;
    border-radius: 4px;
    font-size: 16px;
    cursor: pointer;
}

.login-container button:hover{
    background-color: #FFE4C4;
    color: black;
}

.signup p{
    text-align: center;
    decoration: none;

}

.signup a{
    color: #A13C1E;
}
</style>

<body>
    <div class = "login-container">
<h1><center>ĐĂNG NHẬP TÀI KHOẢN</center></h1><br>
<form method="POST" action="Controller/c_signin.php">
    <input type="text" name="UserName" placeholder = "Tên đăng nhập" required><br>
    <input type="password" name="Password" placeholder = "Mật khẩu" required><br>
    <br>

    <button type="submit">Đăng nhập</button>
    <div class = "signup"> 
    <p class="message">Chưa có tài khoản <a href="signup.php">Đăng kí</a></p>
</div>  
</form>
</div>
</body>
</html>