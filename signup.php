<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ĐĂNG KÝ TÀI KHOẢN</title>
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
.signup-container{
     background-color: white;
      width: 400px;
      padding: 20px;
      box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
      border-radius: 8px;
    }
.signup-container h1{
     text-align: center;
     color: #A13C1E;
     font-size: 30px;
}

.signup-container input{
    width: 100%;
    padding: 10px;
    margin: 10px 0;
    border: 1px solid #ccc;
    border-radius: 4px;
    font-size: 15px;
    width: 350px;
}

.signup-container select{
    width: 100%;
    padding: 10px;
    margin: 10px 0;
    border: 1px solid #ccc;
    border-radius: 4px;
    font-size: 15px;
    width: 370px;
}
.signup-container input::placeholder{
    color: #888;
}

.signup-container button{
    width: 370px;
    padding: 10px;
    background-color: #A13C1E;
    color: white;
    border: none;
    border-radius: 4px;
    font-size: 16px;
    cursor: pointer;
}

.signup-container button:hover{
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
</head>
<body>
    <div class = "signup-container">
    <h1><center>ĐĂNG KÝ TÀI KHOẢN</center></h1><br>
    <form method="POST" action="Controller/c_signup.php">
        <div>
            <input type="text" name="Customer_Name" placeholder = "Họ và tên" id="Customer_Name" required><br>
        </div>

        <div>
            <input type="text" name="username" placeholder = "Tên đăng nhập" id="username" required><br>
        </div>

        <div>
            <input type="text" name="Password" placeholder = "Mật khẩu" id="Password" required><br>
        </div>

        <div>
            <input type="email" name="Email"placeholder = "Email" id="Email" required><br>
        </div>

        <div>
            <input type="text" name="Phone_Number" placeholder = "Số điện thoại" id="Phone_Number" required><br>
        </div>

        <div>
            <input type="text" name="Address" placeholder = "Địa chỉ" id="Address" required><br>
        </div>

        <div>
            <input type="date" name="DateOfBirth" placeholder = "Ngày sinh" id="DateOfBirth" required><br>
        </div>

        <div>
            <select name="Gender" placeholder = "Giới tính" id="Gender" required>
                <option value="Male">Nam</option>
                <option value="Female">Nữ</option>
                <option value="Other">Khác</option>
            </select><br>
        </div>
        <button type="submit">Đăng ký</button>

</div>

        <!--<div>
            <label for="Role">Vai trò: </label>
            <select name="Role" id="Role" required>
                <option value="0">User</option>
                <option value="1">Admin</option>
            </select><br>
        </div>-->

      
        
    </form>
</body>
</html>
