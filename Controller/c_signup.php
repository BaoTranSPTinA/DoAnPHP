<?php
include "../Model/database.php";  // Kết nối cơ sở dữ liệu

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $Customer_Name = isset($_POST['Customer_Name']) ? $_POST['Customer_Name'] : '';
    $username = isset($_POST['username']) ? $_POST['username'] : '';
    $Password = isset($_POST['Password']) ? $_POST['Password'] : '';
    $Email = isset($_POST['Email']) ? $_POST['Email'] : '';
    $Phone_Number = isset($_POST['Phone_Number']) ? $_POST['Phone_Number'] : '';
    $Address = isset($_POST['Address']) ? $_POST['Address'] : '';
    $DateOfBirth = isset($_POST['DateOfBirth']) ? $_POST['DateOfBirth'] : '';
    $Gender = isset($_POST['Gender']) ? $_POST['Gender'] : '';

    $Role = 0; // Đặt mặc định vai trò là User

    if (empty($Customer_Name) || empty($username) || empty($Password) || empty($Email) || empty($Phone_Number) || empty($Address) || empty($DateOfBirth) || empty($Gender)) {
        echo "Vui lòng điền đầy đủ thông tin.";
        exit();
    }

    $db = new Database();

    // Chèn dữ liệu vào bảng User
    $sql = "INSERT INTO User (Customer_Name, username, Password, Email, Phone_Number, Address, Role) 
            VALUES ('$Customer_Name', '$username', '$Password', '$Email', '$Phone_Number', '$Address', $Role)";
    if (!$db->conn->query($sql)) {
        die("Lỗi khi thực thi câu lệnh SQL: " . $db->conn->error);
    }

    $Customer_ID = $db->conn->insert_id;

    // Chèn dữ liệu vào bảng UserInformation
    $sqlInfo = "INSERT INTO UserInformation (Customer_ID, Address, DateOfBirth, Gender) 
                VALUES ($Customer_ID, '$Address', '$DateOfBirth', '$Gender')";
    if (!$db->conn->query($sqlInfo)) {
        die("Lỗi khi thực thi câu lệnh SQL: " . $db->conn->error);
    }

    $db->close();

    header("Location: ../signin.php");
    exit();
}
?>
