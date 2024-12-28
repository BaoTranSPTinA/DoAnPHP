<?php
session_start();
require_once("Model/database.php");
require_once("Model/m_product.php");
require_once("Model/m_cart.php");

if (!isset($_SESSION['Customer_ID'])) {
    header('Location: signin.php');
    exit();
}

$cart = new Cart();
$product = new Product();

$CustomerID = $_SESSION['Customer_ID'];

$cart_items = $cart->getCartItems($CustomerID);

$cart_details = [];
$total = 0;
foreach ($cart_items as $item) {
    $product_info = $product->getProductData($item['Product_ID']);
    if ($product_info) {
        $cart_item = array_merge($item, [
            'Product_Name' => $product_info['Product_Name'],
            'Price' => $product_info['Price'],
            'avatar' => $product_info['avatar']
        ]);
        $cart_details[] = $cart_item;
        $total += $product_info['Price'] * $item['Quantity'];
    }
}

include 'head.php';
if (isset($_SESSION['Role'])) {
    if ($_SESSION['Role'] == 1) {
        include 'header_admin.php';
    } else {
        include 'header.php';
    }
} else {
    include 'header.php';
}
?>

<div class="cart-wrapper">
    <div class="cart-container">
        <h2 class="cart-title">Giỏ hàng của bạn</h2>
        
        <button id="viewOrders" class="view-orders-btn">Xem đơn hàng đã mua</button>
        <div id="orderList"></div>
        
        <?php if (empty($cart_details)): ?>
            <div class="empty-cart">
                <i class="fas fa-shopping-cart"></i>
                <p>Giỏ hàng trống</p>
                <a href="index.php" class="continue-shopping">Tiếp tục mua sắm</a>
            </div>
        <?php else: ?>
            <div class="cart-items">
                <?php foreach ($cart_details as $item): ?>
                    <div class="cart-item">
                        <div class="item-image">
                            <img src="<?php echo substr($item['avatar'], 3); ?>" alt="<?php echo $item['Product_Name']; ?>">
                        </div>
                        <div class="item-details">
                            <h3 class="item-name"><?php echo $item['Product_Name']; ?></h3>
                            <div class="item-price">
                                <span class="price-label">Giá:</span>
                                <span class="price-value"><?php echo number_format($item['Price']); ?> VNĐ</span>
                            </div>
                            <div class="item-quantity">
                                <span class="quantity-label">Số lượng:</span>
                                <span class="quantity-value"><?php echo $item['Quantity']; ?></span>
                            </div>
                            <div class="item-total">
                                <span class="total-label">Tổng:</span>
                                <span class="total-value"><?php echo number_format($item['Price'] * $item['Quantity']); ?> VNĐ</span>
                            </div>
                            <form method="POST" action="Controller/c_del_cart.php" class="remove-form">
                                <input type="hidden" name="cart_id" value="<?php echo $item['Cart_ID']; ?>">
                                <button type="submit" name="remove_item" class="remove-btn">
                                    <i class="fas fa-trash"></i> Xóa
                                </button>
                            </form>
                        </div>
                    </div>
                <?php endforeach; ?>
                
                <div class="cart-summary">
                    <div class="summary-total">
                        <h3>Tổng cộng: <span><?php echo number_format($total); ?> VNĐ</span></h3>
                    </div>
                    <form method="POST" action="Controller/c_checkout.php" class="checkout-form">
                        <div class="form-group">
                            <label for="Ship_Address">Địa chỉ giao hàng:</label>
                            <textarea name="Ship_Address" id="Ship_Address" required></textarea>
                        </div>
                        <button type="submit" name="checkout" class="checkout-btn">
                            <i class="fas fa-shopping-bag"></i> Đặt hàng
                        </button>
                    </form>
                </div>
            </div>
        <?php endif; ?>
    </div>
</div>

<?php include 'footer.php'; ?>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $("#viewOrders").click(function() {
            $.ajax({
                url: "fetch_orders.php",
                method: "GET",
                success: function(data) {
                    $("#orderList").html(data);
                },
                error: function() {
                    alert("Không thể tải danh sách đơn hàng!");
                }
            });
        });
    });
</script>

<style>
.cart-wrapper {
    background-color: #b43f11;
}

.cart-container {
    max-width: 1000px;
    margin: 80px auto 20px;
    padding: 0 20px;
}

.cart-title {
    text-align: center;
    color: #222;
    font-size: 2.5rem;
    margin-bottom: 2rem;
}

.empty-cart {
    text-align: center;
    padding: 3rem;
    background: #b43f11;
}

.empty-cart i {
    font-size: 6rem;
    color: #222;
    margin-bottom: 1rem;
}

.empty-cart p {
    color: #222;
    font-size: 1.7rem;
    margin-bottom: 1.5rem;
}

.continue-shopping {
    display: inline-block;
    padding: 0.8rem 1.5rem;
    background-color: #833517;
    color: white;
    font-size: 1.7rem;
    text-decoration: none;
    border-radius: 5px;
    transition: background-color 0.3s;
}

.continue-shopping:hover {
    background-color: #b43f11;
}

.cart-items {
    display: flex;
    flex-direction: column;
    gap: 1.5rem;
}

.cart-item {
    display: flex;
    background: white;
    border-radius: 10px;
    padding: 1.5rem;
    box-shadow: 0 2px 15px rgba(0,0,0,0.1);
}

.item-image {
    width: 150px;
    height: 150px;
    flex-shrink: 0;
}

.item-image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    border-radius: 8px;
}

.item-details {
    flex: 1;
    margin-left: 2rem;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
}

.item-name {
    font-size: 1.7rem;
    color: #2c3e50;
    margin-bottom: 1rem;
}

.item-price, .item-quantity, .item-total {
    display: flex;
    align-items: center;
    margin-bottom: 0.8rem;
    font-size: 1.7rem;
}

.price-label, .quantity-label, .total-label {
    color: #7f8c8d;
    width: 100px;
}

.price-value, .quantity-value, .total-value {
    color: #2c3e50;
    font-weight: 500;
}

.remove-btn {
    background-color: #e74c3c;
    color: white;
    border: none;
    padding: 0.5rem 1rem;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s;
}

.remove-btn:hover {
    background-color: #c0392b;
}

.cart-summary {
    background: white;
    padding: 2rem;
    border-radius: 10px;
    margin-top: 2rem;
    box-shadow: 0 2px 15px rgba(0,0,0,0.1);
}

.summary-total {
    text-align: right;
    margin-bottom: 2rem;
    padding-bottom: 1rem;
    border-bottom: 2px solid #ecf0f1;
}

.summary-total h3 {
    color: #2c3e50;
    font-size: 1.8rem;
}

.form-group {
    margin-bottom: 1.5rem;
}

.form-group label {
    display: block;
    color: #2c3e50;
    margin-bottom: 0.5rem;
    font-size: 1.1rem;
}

.form-group textarea {
    width: 100%;
    padding: 0.8rem;
    border: 2px solid #ecf0f1;
    border-radius: 5px;
    resize: vertical;
    min-height: 100px;
}

.checkout-btn {
    width: 100%;
    padding: 1rem;
    background-color: #833517;
    color: white;
    border: none;
    border-radius: 5px;
    font-size: 1.7rem;
    cursor: pointer;
    transition: background-color 0.3s;
}

.checkout-btn:hover {
    background-color: #b43f11;
}

@media (max-width: 768px) {
    .cart-item {
        flex-direction: column;
    }
    
    .item-image {
        width: 100%;
        height: 200px;
        margin-bottom: 1rem;
    }
    
    .item-details {
        margin-left: 0;
    }
}

.view-orders-btn {
    background-color: #833517;
    color: white;
    border: none;
    padding: 10px 20px;
    border-radius: 5px;
    cursor: pointer;
    font-size: 1.4rem;
    margin: 20px 0;
    width: 100%;
    transition: background-color 0.3s;
}

.view-orders-btn:hover {
    background-color: #b43f11;
}

#orderList {
    margin-top: 20px;
    background-color: #f9f9f9;
    border-radius: 8px;
    overflow: hidden;
}
</style>
