<?php
include "../Model/database.php";  // Kết nối cơ sở dữ liệu

// Kiểm tra nếu form được gửi
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Nhận các giá trị từ form và kiểm tra nếu chúng tồn tại và không trống
    $Customer_Name = isset($_POST['Customer_Name']) ? $_POST['Customer_Name'] : '';
    $username = isset($_POST['username']) ? $_POST['username'] : '';
    $Password = isset($_POST['Password']) ? $_POST['Password'] : '';
    $Email = isset($_POST['Email']) ? $_POST['Email'] : '';
    $Phone_Number = isset($_POST['Phone_Number']) ? $_POST['Phone_Number'] : '';
    $Address = isset($_POST['Address']) ? $_POST['Address'] : '';
    $DateOfBirth = isset($_POST['DateOfBirth']) ? $_POST['DateOfBirth'] : '';
    $Gender = isset($_POST['Gender']) ? $_POST['Gender'] : '';
    $Role = isset($_POST['Role']) ? $_POST['Role'] : '';

    // Kiểm tra nếu các trường bắt buộc không bị bỏ trống
    if (empty($Customer_Name) || empty($username) || empty($Password) || empty($Email) || empty($Phone_Number) || empty($Address) || empty($DateOfBirth) || empty($Gender) || empty($Role)) {
        echo "Vui lòng điền đầy đủ thông tin.";
        exit();
    }

    // Mã hóa mật khẩu
    $hashedPassword = password_hash($Password, PASSWORD_DEFAULT);

    // Kết nối cơ sở dữ liệu
    $db = new Database();
    
    // Chèn dữ liệu vào bảng User
    $sql = "INSERT INTO User (Customer_Name, username, Password, Email, Phone_Number, Address, Role) 
            VALUES (?, ?, ?, ?, ?, ?, ?)";
    
    $stmt = $db->conn->prepare($sql);
    if ($stmt === false) {
        die("Lỗi khi chuẩn bị câu lệnh SQL: " . $db->conn->error);
    }

    $stmt->bind_param("ssssssi", $Customer_Name, $username, $hashedPassword, $Email, $Phone_Number, $Address, $Role);
    
    if (!$stmt->execute()) {
        echo "Lỗi khi thực thi câu lệnh SQL: " . $stmt->error;
        exit();
    }

    // Lấy Customer_ID vừa đăng ký
    $Customer_ID = $stmt->insert_id;

    // Chèn dữ liệu vào bảng UserInformation
    $sqlInfo = "INSERT INTO UserInformation (Customer_ID, Address, DateOfBirth, Gender) 
                VALUES (?, ?, ?, ?)";
    
    $stmtInfo = $db->conn->prepare($sqlInfo);
    if ($stmtInfo === false) {
        die("Lỗi khi chuẩn bị câu lệnh SQL: " . $db->conn->error);
    }

    $stmtInfo->bind_param("isss", $Customer_ID, $Address, $DateOfBirth, $Gender);
    
    if (!$stmtInfo->execute()) {
        echo "Lỗi khi thực thi câu lệnh SQL: " . $stmtInfo->error;
        exit();
    }

    // Đóng kết nối
    $stmt->close();
    $stmtInfo->close();
    $db->close();

    // Chuyển hướng đến trang đăng nhập
    header("Location: ../signin.php");
    exit();
}
?>
