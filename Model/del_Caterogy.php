<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Category</title>
</head>
<body>
<form method="POST">
    <label for="CategoryName">Mã danh mục:</label>
    <input type="text" name="CategoryName" required><br>
    

    <button type="submit">Xóa danh mục</button>
</form>

<?php
        require_once("database.php");

        $db = new database;
        global $conn;

        if (isset($_POST['CategoryName'])) {
            $CategoryName = $_POST['CategoryName'];

            // Xóa danh mục
            $sql = "DELETE FROM Category WHERE Category_Name = '$CategoryName'";
            $db->set_query($sql);
            $db->execute_query();
        }

        $db->close();
        ?>

<a href="view_danhmuc.php">Quay lại danh sách danh mục</a>

</body>
</html>


