<?php
session_start();
require_once("Model/database.php");
require_once("Model/m_product.php");
require_once("Model/m_cart.php");

if (isset($_POST['add_to_cart'])) {
    $CustomerID = $_POST['Customer_ID'];
    $productID = $_POST['Product_ID'];
    $Quantity = $_POST['Quantity'];

    // Khởi tạo đối tượng Cart
    $cart = new Cart();

    // Kiểm tra sản phẩm trong giỏ hàng
    $cart_item = $cart->checkCartItem($CustomerID, $productID);

    if ($cart_item) {
        // Cập nhật số lượng nếu sản phẩm đã tồn tại
        $new_quantity = $cart_item['Quantity'] + $Quantity;
        $cart->updateCartQuantity($CustomerID, $productID, $new_quantity);
    } else {
        // Thêm sản phẩm mới vào giỏ hàng
        $cart->addToCart($CustomerID, $productID, $Quantity);
    }

    header('Location: watch_cart.php');
    exit();
}
?>
