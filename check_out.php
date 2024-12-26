<?php
session_start();
include 'init.php'; // Kết nối với database

// Lấy user_id từ session
$user_id = $_SESSION['user_id'];

// Lấy giỏ hàng của người dùng
$query = "
    SELECT cart.id AS cart_id, cart.product_id, cart.quantity 
    FROM cart 
    WHERE cart.user_id = ?
";
$stmt = $pdo->prepare($query);
$stmt->execute([$user_id]);
$cartItems = $stmt->fetchAll();

// Lưu thông tin vào bảng `detail`
foreach ($cartItems as $item) {
    $insertDetail = "
        INSERT INTO detail (cart_id, product_id, quantity) 
        VALUES (?, ?, ?)
    ";
    $stmt = $pdo->prepare($insertDetail);
    $stmt->execute([$item['cart_id'], $item['product_id'], $item['quantity']]);
}

// Sau khi lưu chi tiết, xóa giỏ hàng của người dùng
$deleteCart = "DELETE FROM cart WHERE user_id = ?";
$stmt = $pdo->prepare($deleteCart);
$stmt->execute([$user_id]);

// Chuyển hướng đến trang xác nhận thanh toán
header('Location: confirmation.php');
exit();
?>
