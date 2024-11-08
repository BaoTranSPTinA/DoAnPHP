<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Category</title>
</head>
<body>
    <!-- Form thêm danh mục mới -->
<form method="POST">
    <label for="CategoryName">Tên danh mục:</label>
    <input type="text" name="CategoryName" required><br>
    

    <button type="submit">Thêm danh mục</button>
</form>
<a href="view_danhmuc.php">Quay lại danh sách danh mục</a>


<?php
require_once("database.php");
global $conn;
$db = new database();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $CategoryName = $_POST['CategoryName'];
    if (!empty($CategoryName)) {
        $sql = "INSERT INTO Category ( Category_Name) VALUES ( '$CategoryName')";
        $db->set_query($sql);
        $db->execute_query();
    }

    $db->Close();
}
?>
</body>
</html>




