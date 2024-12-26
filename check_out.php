<?php
session_start();
require_once ('init.php');
require_once ('Model/m_cart.php');
require_once ('Model/m_detail.php'); 

if (!isset($_SESSION['Customer_ID'])) {
    header('Location: signin.php');
    exit();
}

// Lấy user_id từ session
$CustomerID = $_SESSION['Customer_ID'];

// Khởi tạo đối tượng Cart
$cart = new Cart();

// Lấy thông tin giỏ hàng
$cart_items = $cart->getCartItems($CustomerID);

// Khởi tạo đối tượng Detail để lưu chi tiết đơn hàng
$detail = new Detail();

// Lưu thông tin vào bảng detail
foreach ($cart_items as $item) {
    $detail->create_1_Detail($item['Cart_ID'], $item['Product_ID'], $item['Quantity']);
}

// Xóa giỏ hàng sau khi lưu chi tiết
$cart->clearCart($CustomerID);

// Chuyển hướng đến trang xác nhận thanh toán
header('Location: confirmation.php');
exit();
?>