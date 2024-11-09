<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm Sản phẩm</title>
</head>
<body>

<h2>Thêm sản phẩm mới</h2>

<?php
require 'database.php';

$db = new Database();

// Fetch categories for the dropdown
$sql1 = "SELECT Category_ID, Category_Name FROM Category";
$db->set_query($sql1);
$result = $db->conn->query($sql1);

// Initialize variables for potential error messages or success confirmation
$message = "";

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $ProductName = $_POST['ProductName'];
    $CategoryID = $_POST['CategoryID'];
    $description = $_POST['Description'];
    $price = $_POST['Price'];
    $StockQuantity = $_POST['StockQuantity'];

    // Insert product into database
    $sql = "INSERT INTO Product (Product_Name, Category_ID, Description, Price, Stock_Quantity) 
            VALUES ('$ProductName', $CategoryID, '$description', $price, $StockQuantity)";
    $db->set_query($sql);

    if ($db->execute_query()) {
        $message = "Sản phẩm đã được thêm thành công!";
    } else {
        $message = "Lỗi: Không thể thêm sản phẩm. Vui lòng thử lại.";
    }
}

// Close the database connection
$db->close();
?>

<!-- Display success or error message -->
<p><?php echo $message; ?></p>

<!-- Product Form -->
<form method="post">
    <label for="ProductName">Tên sản phẩm:</label>
    <input type="text" name="ProductName" required><br>

    <label for="Description">Mô tả:</label>
    <textarea name="Description" required></textarea><br>

    <label for="Price">Giá:</label>
    <input type="number" name="Price" step="1000" required><br>

    <label for="StockQuantity">Số lượng kho:</label>
    <input type="number" name="StockQuantity" required><br>

    <label for="CategoryID">Chọn danh mục:</label>
    <select name="CategoryID" required>
        <option value="">-- Chọn danh mục --</option>
        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<option value='" . $row['Category_ID'] . "'>" . $row['Category_Name'] . "</option>";
            }
        }
        ?>
    </select>
    <br>

    <button type="submit">Thêm sản phẩm</button>
</form>

<a href="view_sanpham.php">Quay lại danh sách sản phẩm</a>

</body>
</html>
