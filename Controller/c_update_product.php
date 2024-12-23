<?php
    require('../model/m_product.php');

    session_start();

    // Kiểm tra dữ liệu đã được gửi đi hay chưa
    if (isset($_POST['id'], $_POST['ProductName'], $_POST['CategoryID'], $_POST['Description'], $_POST['Price'], $_POST['StockQuantity'])) {
        $id = $_POST['id'];
        $ProductName = $_POST['ProductName'];
        $CategoryID = $_POST['CategoryID'];
        $description = $_POST['Description'];
        $price = $_POST['Price'];
        $StockQuantity = $_POST['StockQuantity'];

        // Kiểm tra nếu có file hình ảnh mới
        if (isset($_FILES['avatar']) && $_FILES['avatar']['error'] == 0) {
            $avatar_tmp = $_FILES['avatar']['tmp_name'];
            $avatar_name = basename($_FILES['avatar']['name']);
            $avatar_path = "../Uploads/" . $avatar_name; // Đường dẫn ảnh mới

            // Di chuyển file từ thư mục tạm vào thư mục chứa ảnh
            if (move_uploaded_file($avatar_tmp, $avatar_path)) {
                $message = "Tải lên ảnh đại diện thành công.";
            } else {
                $message = "Lỗi khi tải lên ảnh đại diện.";
                $avatar_path = NULL; // Nếu tải ảnh không thành công, gán giá trị NULL
            }
        } else {
            $avatar_path = NULL; // Nếu không có ảnh, giữ nguyên giá trị NULL
        }

        // Khởi tạo đối tượng Product và cập nhật sản phẩm
        $product = new Product();
        $product->update_1_product($id, $ProductName, $CategoryID, $description, $price, $StockQuantity, $avatar_path);

        // Thông báo hoặc thực hiện hành động sau khi cập nhật thành công (nếu cần)
        $_SESSION['message'] = "Sản phẩm đã được cập nhật thành công.";

    } else {
        $_SESSION['message'] = "Dữ liệu không hợp lệ.";
    }
?>

<script>
    window.close();
</script>
