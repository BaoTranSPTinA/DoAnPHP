<?php
session_start();
require_once("Model/database.php");
require_once("Model/m_bill.php");
require_once("Model/m_detail.php");
require_once("Model/m_product.php");

if (!isset($_SESSION['Customer_ID'])) {
    echo "Vui lòng đăng nhập để xem đơn hàng";
    exit();
}

$CustomerID = $_SESSION['Customer_ID'];
$bill = new Bill();
$detail = new Detail();
$product = new Product();

// Lấy danh sách đơn hàng của khách hàng
$orders = $bill->get_bills_by_customer($CustomerID);

if (empty($orders)) {
    echo "<p class='no-orders'>Bạn chưa có đơn hàng nào</p>";
    exit();
}

// HTML cho danh sách đơn hàng
echo "<div class='orders-list'>";
foreach ($orders as $order) {
    echo "<div class='order-item'>";
    echo "<div class='order-header'>";
    echo "<h3>Đơn hàng #" . $order['Order_ID'] . "</h3>";
    echo "<p>Ngày đặt: " . $order['create_time'] . "</p>";
    echo "<p>Trạng thái: " . $order['Order_Status'] . "</p>";
    echo "<p>Tổng tiền: " . number_format($order['Total_Amount']) . " VNĐ</p>";
    echo "<p>Địa chỉ giao hàng: " . $order['Ship_Address'] . "</p>";
    echo "</div>";

    // Lấy chi tiết sản phẩm trong đơn hàng
    $orderDetails = $detail->get_details_by_order($order['Order_ID']);
    if (!empty($orderDetails)) {
        echo "<div class='order-products'>";
        echo "<h4>Sản phẩm đã đặt:</h4>";
        foreach ($orderDetails as $item) {
            $productInfo = $product->getProductData($item['Product_ID']);
            if ($productInfo) {
                echo "<div class='product-item'>";
                echo "<img src='" . substr($productInfo['avatar'], 3) . "' alt='" . $productInfo['Product_Name'] . "'>";
                echo "<div class='product-info'>";
                echo "<p class='product-name'>" . $productInfo['Product_Name'] . "</p>";
                echo "<p class='product-quantity'>Số lượng: " . $item['Quantity'] . "</p>";
                echo "<p class='product-price'>Giá: " . number_format($productInfo['Price']) . " VNĐ</p>";
                echo "</div>";
                echo "</div>";
            }
        }
        echo "</div>";
    }
    
    echo "</div>";
}
echo "</div>";
?>

<style>
.orders-list {
    margin-top: 20px;
    padding: 20px;
}

.order-item {
    background: white;
    border-radius: 8px;
    padding: 15px;
    margin-bottom: 15px;
    box-shadow: 0 2px 4px rgba(0,0,0,0.1);
}

.order-header {
    border-bottom: 1px solid #eee;
    padding-bottom: 10px;
}

.order-header h3 {
    color: #2c3e50;
    margin: 0 0 10px 0;
    font-size: 1.2em;
}

.order-header p {
    color: #7f8c8d;
    margin: 5px 0;
    font-size: 0.9em;
}

.order-products {
    padding-top: 15px;
}

.order-products h4 {
    color: #2c3e50;
    margin-bottom: 10px;
}

.product-item {
    display: flex;
    align-items: center;
    padding: 10px;
    border-bottom: 1px solid #eee;
}

.product-item img {
    width: 80px;
    height: 80px;
    object-fit: cover;
    border-radius: 4px;
    margin-right: 15px;
}

.product-info {
    flex: 1;
}

.product-name {
    font-weight: bold;
    color: #2c3e50;
    margin-bottom: 5px;
}

.product-quantity, .product-price {
    color: #7f8c8d;
    font-size: 0.9em;
    margin: 2px 0;
}

.no-orders {
    text-align: center;
    padding: 20px;
    color: #7f8c8d;
    font-size: 1.1em;
}
</style>
