<?php
session_start();
require_once("Model/database.php");
require_once("Controller/c_order.php");

// Kiểm tra đăng nhập
if (!isset($_SESSION['Customer_ID'])) {
    header('Location: signin.php');
    exit();
}

$db = new Database();
$pdo = $db->conn;

// Lấy thông tin từ form
$customerID = $_SESSION['Customer_ID'];
$shipAddress = $_POST['shipping_address'];

// Lấy thông tin giỏ hàng
$query = "SELECT c.*, p.Price 
          FROM cart c 
          JOIN Product p ON c.Product_ID = p.Product_ID 
          WHERE c.Customer_ID = ?";
$stmt = $pdo->prepare($query);
$stmt->execute([$customerID]);
$cartItems = [];

while ($row = $stmt->fetch()) {
    $cartItems[] = [
        'productID' => $row['Product_ID'],
        'quantity' => $row['Quantity']
    ];
}

if (empty($cartItems)) {
    header('Location: watch_cart.php');
    exit();
}

// Tạo đơn hàng
$orderController = new OrderController();
try {
    $orderController->createOrder($customerID, $shipAddress, $cartItems);
    
    // Xóa giỏ hàng sau khi đặt hàng thành công
    $deleteQuery = "DELETE FROM cart WHERE Customer_ID = ?";
    $stmt = $pdo->prepare($deleteQuery);
    $stmt->execute([$customerID]);
    
    // Chuyển hướng đến trang xác nhận
    header('Location: confirmation.php');
    exit();
} catch (Exception $e) {
    $_SESSION['error'] = $e->getMessage();
    header('Location: watch_cart.php');
    exit();
}
?> 