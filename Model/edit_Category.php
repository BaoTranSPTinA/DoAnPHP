<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cập nhật danh mục</title>
</head>
<body>
<h2>Chỉnh sửa danh mục</h2>
    <form method="post">
        <label for="CategoryName">Tên danh mục:</label>
        <input type="text" id="CategoryName" name="CategoryName" value="<?php echo htmlspecialchars($row['CategoryName']); ?>" required>
        <br><br>
        <input type="submit" value="Cập nhật">
    </form>
    <br>
    <a href="view_danhmuc.php">Quay lại danh sách danh mục</a>

<?php
require('database.php');
global $conn;
$db = new database();

// Kiểm tra xem ID có được cung cấp và hợp lệ không
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = intval($_GET['id']);
} else {
    echo "ID danh mục không được cung cấp hoặc không hợp lệ.";
    exit;
}

// Xử lý form khi được gửi
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $CategoryName = $_POST['CategoryName'];
    
    // Cập nhật danh mục mà không sử dụng prepared statements
    $sql = "UPDATE DanhMuc SET CategoryName = '$CategoryName' WHERE CategoryID = $id";
    
    if ($conn->query($sql) === TRUE) {
        // Sau khi cập nhật thành công, chuyển hướng về trang hiển thị danh mục
        header("Location: view_danhmuc.php");
        exit();
    } else {
        echo "Lỗi: " . $conn->error;
    }
}

// Lấy thông tin danh mục hiện tại mà không sử dụng prepared statements
$sql = "SELECT * FROM DanhMuc WHERE CategoryID = $id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
} else {
    echo "Không tìm thấy danh mục.";
    exit;
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Chỉnh sửa danh mục</title>
</head>
<body>
    
</body>
</html>

<?php
$conn->close();
?>

</body>
</html>