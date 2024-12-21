<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Model/style_user.css">
    <title>ĐĂNG KÝ TÀI KHOẢN</title>
</head>
<body>
    <h2><center>ĐĂNG KÝ TÀI KHOẢN</center></h2><br>
    <form method="POST" action="Controller/c_signup.php">
        <div>
            <label for="Customer_Name">Họ và tên: </label>
            <input type="text" name="Customer_Name" id="Customer_Name" required><br>
        </div>

        <div>
            <label for="username">Tài khoản: </label>
            <input type="text" name="username" id="username" required><br>
        </div>

        <div>
            <label for="Password">Mật khẩu: </label>
            <input type="password" name="Password" id="Password" required><br>
        </div>

        <div>
            <label for="Email">Email: </label>
            <input type="email" name="Email" id="Email" required><br>
        </div>

        <div>
            <label for="Phone_Number">Số điện thoại: </label>
            <input type="text" name="Phone_Number" id="Phone_Number" required><br>
        </div>

        <div>
            <label for="Address">Địa chỉ: </label>
            <input type="text" name="Address" id="Address" required><br>
        </div>

        <div>
            <label for="DateOfBirth">Ngày sinh: </label>
            <input type="date" name="DateOfBirth" id="DateOfBirth" required><br>
        </div>

        <div>
            <label for="Gender">Giới tính: </label>
            <select name="Gender" id="Gender" required>
                <option value="Male">Nam</option>
                <option value="Female">Nữ</option>
                <option value="Other">Khác</option>
            </select><br>
        </div>

        <div>
            <label for="Role">Vai trò: </label>
            <select name="Role" id="Role" required>
                <option value="0">User</option>
                <option value="1">Admin</option>
            </select><br>
        </div>

        <div>
            <button type="submit">Đăng ký</button>
        </div>
    </form>
</body>
</html>
