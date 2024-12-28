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

.no-orders {
    text-align: center;
    padding: 20px;
    color: #7f8c8d;
    font-size: 1.1em;
}
</style>
