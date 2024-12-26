<?php
session_start();
require_once("../Model/database.php");

if (!isset($_SESSION['Customer_ID']) || !isset($_POST['cart_id'])) {
    header('Location: ../watch_cart.php');
    exit();
}

$db = new Database();
$pdo = $db->conn;

$cart_id = $_POST['cart_id'];
$customer_id = $_SESSION['Customer_ID'];

// Xóa sản phẩm từ giỏ hàng với điều kiện cart_id và customer_id để đảm bảo an toàn
$query = "DELETE FROM cart WHERE Cart_ID = ? AND Customer_ID = ?";
$stmt = $pdo->prepare($query);
$stmt->execute([$cart_id, $customer_id]);

// Chuyển hướng về trang giỏ hàng
header('Location: ../watch_cart.php');
exit();
?>