<?php
session_start();
require_once("../Model/database.php");
require_once("../Model/m_product.php");
require_once("../Model/m_bill.php");
require_once("../Model/m_detail.php");
require_once("../Model/m_cart.php");
require_once("../Controller/c_order.php");


// Kiểm tra đăng nhập
if (!isset($_SESSION['Customer_ID'])) {
    header('Location: signin.php');
    exit();
}

// Lấy thông tin từ form
$CustomerID = $_SESSION['Customer_ID'];
$address = $_POST['Ship_Address'];

// Khởi tạo đối tượng Cart
$cart = new Cart();

// Lấy thông tin giỏ hàng
$cart_items = $cart->getCartItems($CustomerID);

if (empty($cart_items)) {
    header('Location: watch_cart.php');
    exit();
}

// Tạo đơn hàng
$orderController = new OrderController();
try {
    $orderController->createOrder($CustomerID, $address, $cart_items);
    
    // Xóa giỏ hàng sau khi đặt hàng thành công
    $cart->clearCart($CustomerID);
    
    // Chuyển hướng đến trang xác nhận
    header('Location: ../confirmation.php');
    exit();
} catch (Exception $e) {
    $_SESSION['error'] = $e->getMessage();
    header('Location: ../watch_cart.php');
    exit();
}
?> 