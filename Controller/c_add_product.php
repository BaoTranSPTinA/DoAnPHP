<?php
require('../model/m_product.php');
session_start();

// Kiểm tra các trường dữ liệu đầu vào
if (isset($_POST['ProductName'], $_POST['CategoryID'], $_POST['Description'], $_POST['Price'], $_POST['StockQuantity'])) {
    $ProductName = $_POST['ProductName'];
    $CategoryID = $_POST['CategoryID'];
    $description = $_POST['Description'];
    $price = $_POST['Price'];
    $StockQuantity = $_POST['StockQuantity'];

    // Kiểm tra ảnh đại diện và tải lên
    if (isset($_FILES['avatar']) && $_FILES['avatar']['error'] == 0) {
        $avatar_tmp = $_FILES['avatar']['tmp_name'];
        $avatar_name = basename($_FILES['avatar']['name']);
        $avatar_path = "../Uploads/" . $avatar_name; // Đường dẫn ảnh cần phải đúng

        if (move_uploaded_file($avatar_tmp, $avatar_path)) {
            $message = "Tải lên ảnh đại diện thành công.";
        } else {
            $message = "Lỗi khi tải lên ảnh đại diện.";
            $avatar_path = NULL; // Nếu tải ảnh không thành công, gán giá trị NULL
        }
    } else {
        $avatar_path = NULL; // Nếu không có ảnh, gán giá trị NULL
    }

    // Tạo sản phẩm mới
    $new_product = new Product();
    $new_product->create_1_product($ProductName, $CategoryID, $description, $price, $StockQuantity, $avatar_path);
} else {
    $message = "Dữ liệu không hợp lệ.";
}
?>

<script>
    window.close();
</script>
