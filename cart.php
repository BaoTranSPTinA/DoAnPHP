<?php
session_start();
require_once('Model/database.php');
require_once('Model/m_product.php');
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Giỏ hàng</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="Public/CSS/style.css">
</head>
<body>
    <?php include 'header.php'; ?>

    <div class="container" style="margin-top: 100px;">
        <h1 class="text-center">Giỏ hàng của bạn</h1>
        
        <?php if (!isset($_SESSION['cart']) || empty($_SESSION['cart'])): ?>
            <div class="empty-cart">
                <p>Giỏ hàng của bạn đang trống</p>
                <a href="index.php" class="btn">Tiếp tục mua sắm</a>
            </div>
        <?php else: ?>
            <div class="cart-items">
                <table>
                    <thead>
                        <tr>
                            <th>Sản phẩm</th>
                            <th>Giá</th>
                            <th>Số lượng</th>
                            <th>Tổng</th>
                            <th>Xóa</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        $totalAmount = 0;
                        foreach ($_SESSION['cart'] as $productId => $quantity): 
                            $product = new Product();
                            $productData = $product->getProductData($productId);
                            if ($productData):
                                $subtotal = $productData['Price'] * $quantity;
                                $totalAmount += $subtotal;
                        ?>
                            <tr>
                                <td>
                                    <div class="product-info">
                                        <?php if (!empty($productData['avatar'])): ?>
                                            <img src="<?php echo $productData['avatar']; ?>" alt="<?php echo $productData['Product_Name']; ?>" width="50">
                                        <?php endif; ?>
                                        <span><?php echo $productData['Product_Name']; ?></span>
                                    </div>
                                </td>
                                <td><?php echo number_format($productData['Price'], 0, ',', '.'); ?>đ</td>
                                <td>
                                    <div class="quantity-controls">
                                        <button onclick="updateQuantity(<?php echo $productId; ?>, 'decrease')">-</button>
                                        <input type="number" value="<?php echo $quantity; ?>" 
                                               min="1" max="<?php echo $productData['Stock_Quantity']; ?>"
                                               onchange="updateQuantity(<?php echo $productId; ?>, 'input', this.value)">
                                        <button onclick="updateQuantity(<?php echo $productId; ?>, 'increase')">+</button>
                                    </div>
                                </td>
                                <td><?php echo number_format($subtotal, 0, ',', '.'); ?>đ</td>
                                <td>
                                    <button onclick="removeFromCart(<?php echo $productId; ?>)" class="remove-btn">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </td>
                            </tr>
                        <?php 
                            endif;
                        endforeach; 
                        ?>
                    </tbody>
                </table>

                <div class="cart-summary">
                    <div class="total">
                        <span>Tổng cộng:</span>
                        <span><?php echo number_format($totalAmount, 0, ',', '.'); ?>đ</span>
                    </div>
                    <div class="checkout-actions">
                        <a href="index.php" class="btn">Tiếp tục mua sắm</a>
                        <button onclick="proceedToCheckout()" class="btn checkout-btn">Thanh toán</button>
                    </div>
                </div>
            </div>
        <?php endif; ?>
    </div>

    <?php include 'footer.php'; ?>

    <script>
        function updateQuantity(productId, action, value = null) {
            let url = 'Controller/c_update_cart.php';
            let data = {
                product_id: productId,
                action: action
            };
            
            if (value !== null) {
                data.value = value;
            }

            fetch(url, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify(data)
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    location.reload();
                } else {
                    alert(data.message);
                }
            });
        }

        function removeFromCart(productId) {
            if (confirm('Bạn có chắc muốn xóa sản phẩm này khỏi giỏ hàng?')) {
                fetch('Controller/c_update_cart.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify({
                        product_id: productId,
                        action: 'remove'
                    })
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        location.reload();
                    }
                });
            }
        }

        function proceedToCheckout() {
            <?php if (!isset($_SESSION['username'])): ?>
                alert('Vui lòng đăng nhập để tiến hành thanh toán');
                window.location.href = 'signin.php';
            <?php else: ?>
                window.location.href = 'checkout.php';
            <?php endif; ?>
        }
    </script>

    <style>
        .container {
            padding: 20px;
            max-width: 1200px;
            margin: 0 auto;
        }

        .cart-items table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        .cart-items th, .cart-items td {
            padding: 15px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        .product-info {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .quantity-controls {
            display: flex;
            align-items: center;
            gap: 5px;
        }

        .quantity-controls input {
            width: 50px;
            text-align: center;
        }

        .remove-btn {
            background: none;
            border: none;
            color: #ff4444;
            cursor: pointer;
        }

        .cart-summary {
            margin-top: 20px;
            text-align: right;
        }

        .total {
            font-size: 1.2em;
            margin-bottom: 20px;
        }

        .checkout-actions {
            display: flex;
            justify-content: flex-end;
            gap: 10px;
        }

        .btn {
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
            color: white;
        }

        .checkout-btn {
            background-color: #4CAF50;
        }

        .empty-cart {
            text-align: center;
            padding: 50px;
        }

        .empty-cart p {
            margin-bottom: 20px;
            font-size: 1.2em;
        }
    </style>
</body>
</html> 