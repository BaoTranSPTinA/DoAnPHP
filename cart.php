<?php
require_once("Model/database.php");

$db = new Database();
$pdo = $db->conn;

if (isset($_POST['add_to_cart'])) {
    $customer_id = $_POST['user_id'];
    $product_id = $_POST['product_id'];
    $quantity = $_POST['quantity'];

    // Kiểm tra xem sản phẩm đã có trong giỏ hàng của user chưa
    $query = "SELECT * FROM cart WHERE Customer_ID = ? AND Product_ID = ?";
    $stmt = $pdo->prepare($query);
    $stmt->execute([$customer_id, $product_id]);
    $cartItem = $stmt->fetch();

    if ($cartItem) {
        // Nếu sản phẩm đã có trong giỏ hàng, tăng số lượng
        $new_quantity = $cartItem['Quantity'] + $quantity;
        $update_query = "UPDATE cart SET Quantity = ? WHERE Customer_ID = ? AND Product_ID = ?";
        $stmt = $pdo->prepare($update_query);
        $stmt->execute([$new_quantity, $customer_id, $product_id]);
    } else {
        // Nếu sản phẩm chưa có, thêm mới vào giỏ hàng
        $insert_query = "INSERT INTO cart (Customer_ID, Product_ID, Quantity) VALUES (?, ?, ?)";
        $stmt = $pdo->prepare($insert_query);
        $stmt->execute([$customer_id, $product_id, $quantity]);
    }

    // Điều hướng người dùng về trang giỏ hàng hoặc thông báo thành công
    header('Location: cart.php');
    exit();
}
?>
