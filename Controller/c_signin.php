<?php
session_start();
require_once('../Model/database.php');  // Kết nối cơ sở dữ liệu

// Khởi tạo đối tượng Database để sử dụng kết nối
$db = new Database();  // Khởi tạo đối tượng Database

// Lấy dữ liệu từ form
$username = $_POST['UserName'];
$password = $_POST['Password'];

// Kiểm tra kết nối cơ sở dữ liệu
if ($db->conn->connect_error) {
    die("Connection failed: " . $db->conn->connect_error);
}

// Kiểm tra thông tin đăng nhập (ví dụ: truy vấn cơ sở dữ liệu)
$sql = "SELECT * FROM User WHERE username = ?";  // Chỉ cần kiểm tra username
$stmt = $db->conn->prepare($sql);  // Sử dụng kết nối từ đối tượng Database
$stmt->bind_param("s", $username);
$stmt->execute();
$result = $stmt->get_result();

// Kiểm tra giá trị trả về từ cơ sở dữ liệu
if ($result->num_rows > 0) {
    echo "User found.";  // Debugging: Kiểm tra nếu user tồn tại trong cơ sở dữ liệu

    $row = $result->fetch_assoc();

    // So sánh mật khẩu trực tiếp (không sử dụng password_verify)
    if ($password == $row['Password']) {
        // Nếu mật khẩu đúng, lưu thông tin vào session
        $_SESSION['username'] = $row['username'];  // Lưu tên đăng nhập
        $_SESSION['Customer_name'] = $row['Customer_Name'];  // Lưu tên đầy đủ của người dùng
        $_SESSION['Customer_ID'] = $row['Customer_ID'];  // Lưu ID khách hàng
        $_SESSION['Role'] = $row['Role'];  // Lưu vai trò người dùng

        // Kiểm tra session
        echo "Session set: " . $_SESSION['username'];  // In session ra để kiểm tra

        // Chuyển hướng đến trang index.php
        header("Location: ../index.php");
        exit();
    } else {
        // Nếu mật khẩu sai
        header("Location: ../signin.php?error=Sai tên đăng nhập hoặc mật khẩu");
        exit();
    }
} else {
    // Nếu không tìm thấy tài khoản
    echo "No user found.";  // Debugging: Kiểm tra nếu không tìm thấy user
}

// Đóng kết nối
$stmt->close();
$db->conn->close();
?>
