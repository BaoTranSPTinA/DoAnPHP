<?php
session_start();
require_once("../Model/database.php"); 
require_once("../Model/m_cart.php");

// Kiểm tra đăng nhập và dữ liệu gửi lên
if (!isset($_SESSION['Customer_ID']) || !isset($_POST['cart_id'])) {
   header('Location: ../watch_cart.php');
   exit();
}

// Khởi tạo đối tượng Cart và lấy thông tin
$cart = new Cart();
$CartID = $_POST['cart_id'];
$CustomerID = $_SESSION['Customer_ID'];

try {
   // Xóa sản phẩm khỏi giỏ hàng
   $cart->removeFromCart($CartID, $CustomerID);
   $_SESSION['success'] = "Đã xóa sản phẩm khỏi giỏ hàng";
   header('Location: ../watch_cart.php');
} catch(Exception $e) {
   // Xử lý lỗi nếu có
   $_SESSION['error'] = "Lỗi khi xóa sản phẩm: " . $e->getMessage();
   header('Location: ../watch_cart.php');
}
exit();
?>