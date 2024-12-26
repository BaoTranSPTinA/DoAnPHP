<?php
session_start();
require_once("Model/database.php");
require_once("Model/m_product.php");

// Kiểm tra đăng nhập
if (!isset($_SESSION['Customer_ID'])) {
    header('Location: signin.php');
    exit();
}

$db = new Database();
$pdo = $db->conn;

// Lấy danh sách sản phẩm trong giỏ hàng
$customer_id = $_SESSION['Customer_ID'];
$query = "SELECT c.*, p.Product_Name, p.Price, p.avatar 
          FROM cart c 
          JOIN Product p ON c.Product_ID = p.Product_ID 
          WHERE c.Customer_ID = ?";
$stmt = $pdo->prepare($query);
$stmt->execute([$customer_id]);
$result = $stmt->get_result();

$cart_items = [];
while ($row = $result->fetch_assoc()) {
    $cart_items[] = $row;
}

// Tính tổng tiền
$total = 0;
foreach ($cart_items as $item) {
    $total += $item['Price'] * $item['Quantity'];
}

include 'head.php';
include 'header.php';
?>

<div class="cart-container" style="margin-top: 100px; padding: 20px;">
    <h2>Giỏ hàng của bạn</h2>
    
    <?php if (empty($cart_items)): ?>
        <p>Giỏ hàng trống</p>
    <?php else: ?>
        <div class="cart-items">
            <?php foreach ($cart_items as $item): ?>
                <div class="cart-item" style="display: flex; margin-bottom: 20px; padding: 10px; border: 1px solid #ddd;">
                    <img src="<?php echo $item['avatar']; ?>" alt="<?php echo $item['Product_Name']; ?>" style="width: 100px; height: 100px; object-fit: cover;">
                    <div class="item-details" style="margin-left: 20px;">
                        <h3><?php echo $item['Product_Name']; ?></h3>
                        <p>Giá: <?php echo number_format($item['Price']); ?> VNĐ</p>
                        <p>Số lượng: <?php echo $item['Quantity']; ?></p>
                        <p>Tổng: <?php echo number_format($item['Price'] * $item['Quantity']); ?> VNĐ</p>
                        <form method="POST" action="remove_from_cart.php" style="display: inline;">
                            <input type="hidden" name="cart_id" value="<?php echo $item['Cart_ID']; ?>">
                            <button type="submit" name="remove_item" class="btn btn-danger">Xóa</button>
                        </form>
                    </div>
                </div>
            <?php endforeach; ?>
            
            <div class="cart-summary" style="margin-top: 20px; text-align: right;">
                <h3>Tổng cộng: <?php echo number_format($total); ?> VNĐ</h3>
                <form method="POST" action="checkout.php">
    <div class="form-group" style="margin-bottom: 10px;">
        <label for="shipping_address">Địa chỉ giao hàng:</label>
        <textarea name="shipping_address" id="shipping_address" class="form-control" required></textarea>
    </div>
    <button type="submit" name="checkout" class="btn btn-primary">Đặt hàng</button>
</form>
            </div>
        </div>
    <?php endif; ?>
</div>

<?php include 'footer.php'; ?>
