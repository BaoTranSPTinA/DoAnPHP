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
    echo "<p>Trạng thái: <span class='order-status'>" . $order['Order_Status'] . "</span></p>";
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

// Thêm modal hủy đơn hàng
echo "
<div id='cancelModal' class='modal'>
    <div class='modal-content'>
        <span class='close'>&times;</span>
        <h3>Lý do hủy đơn hàng</h3>
        <form id='cancelForm'>
            <input type='hidden' id='orderIdToCancel' name='orderId'>
            <textarea id='cancelReason' name='reason' required></textarea>
            <button type='submit'>Xác nhận</button>
        </form>
    </div>
</div>";
?>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

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
    font-size: 1.7em;
}

.order-header p {
    color: #7f8c8d;
    margin: 5px 0;
    font-size: 1.3em;
}

.order-products {
    padding-top: 15px;
}

.order-products h4 {
    color: #2c3e50;
    margin-bottom: 10px;
    font-size: 1.5em;
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
}

.cancel-order-btn {
    background-color: #ff4444;
    color: white;
    border: none;
    padding: 8px 15px;
    border-radius: 20px;
    font-size: 14px;
    cursor: pointer;
    transition: all 0.3s ease;
    margin-top: 15px;
    display: flex;
    align-items: center;
    gap: 5px;
    box-shadow: 0 2px 5px rgba(0,0,0,0.2);
}

.cancel-order-btn:hover {
    background-color: #cc0000;
    transform: translateY(-2px);
    box-shadow: 0 4px 8px rgba(0,0,0,0.3);
}

.cancel-order-btn i {
    font-size: 14px;
}

/* Modal styles */
.modal {
    display: none;
    position: fixed;
    z-index: 1000;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0,0,0,0.4);
}

.modal-content {
    background-color: #fefefe;
    margin: 15% auto;
    padding: 20px;
    border: 1px solid #888;
    width: 80%;
    max-width: 500px;
    border-radius: 15px;
    box-shadow: 0 5px 15px rgba(0,0,0,0.3);
}

.close {
    color: #aaa;
    float: right;
    font-size: 28px;
    font-weight: bold;
    cursor: pointer;
}

.close:hover {
    color: black;
}

#cancelReason {
    width: 100%;
    height: 100px;
    margin: 10px 0;
    padding: 10px;
    border: 2px solid #ddd;
    border-radius: 8px;
    transition: border-color 0.3s ease;
}

#cancelReason:focus {
    border-color: #ff4444;
    outline: none;
}

.modal-content button[type="submit"] {
    background-color: #ff4444;
    color: white;
    padding: 10px 20px;
    border: none;
    border-radius: 25px;
    cursor: pointer;
    width: 100%;
    margin-top: 15px;
    font-size: 16px;
    transition: all 0.3s ease;
}

.modal-content button[type="submit"]:hover {
    background-color: #cc0000;
    transform: translateY(-2px);
}

.product-info p {
    margin: 5px 0;
    font-size: 1.3em;
}
</style>

<script>
var modal = document.getElementById('cancelModal');
var span = document.getElementsByClassName('close')[0];

function showCancelModal(orderId) {
    document.getElementById('orderIdToCancel').value = orderId;
    modal.style.display = 'block';
}

span.onclick = function() {
    modal.style.display = 'none';
}

window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = 'none';
    }
}

document.getElementById('cancelForm').onsubmit = function(e) {
    e.preventDefault();
    var orderId = document.getElementById('orderIdToCancel').value;
    var reason = document.getElementById('cancelReason').value;
    
    fetch('Controller/c_cancel_order.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
        },
        body: 'orderId=' + orderId + '&reason=' + encodeURIComponent(reason)
    })
    .then(response => response.text())
    .then(data => {
        alert('Cửa hàng sẽ cập nhật trong thời gian sớm nhất');
        modal.style.display = 'none';
        location.reload();
    });
}
</script>