<?php
session_start();
require_once('Controller/c_list_product_home.php');

// Kiểm tra id sản phẩm trong GET request
if(isset($_GET['id'])) {
    $id = intval($_GET['id']);  // Chuyển đổi giá trị id sang kiểu số nguyên để tăng cường bảo mật
    $product = new Product();
    $product_detail = $product->get_product_by_id($id);
    
    if(!$product_detail) {
        header('Location: index.php');
        exit();
    }
} else {
    header('Location: index.php');
    exit();
}

include 'head.php';

// Kiểm tra role và hiển thị header phù hợp
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

<body>
    <style>
        body {
            font-family: Poppins, sans-serif;
            background-color: #b43f11;
        }

        .product-detail-container {
            max-width: 1200px;
            margin: 70px auto 2rem;
            padding: 0 1rem;
            background: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
        }

        .product-detail-wrapper {
            display: flex;
            gap: 2rem;
            background: #fff;
            padding: 2rem;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }

        .product-image {
            flex: 1;
            max-width: 300px;
        }

        .product-image img {
            width: 100%;
            height: auto;
            border-radius: 10px;
            object-fit: cover;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        .product-info {
            flex: 1 1 55%;
        }

        .product-title {
            font-size: 2.2rem;
            color: #333;
            margin-bottom: 1rem;
        }

        .product-price {
            font-size: 1.8rem;
            color: #d35400;
            font-weight: bold;
            margin-bottom: 1.5rem;
        }

        .product-description {
            font-size: 1.2rem;
            line-height: 1.8;
            color: #555;
            margin-bottom: 2rem;
        }

        .product-actions {
            display: flex;
            gap: 1rem;
            align-items: center;
        }

        .quantity-selector {
            display: flex;
            align-items: center;
            border: 1px solid #ddd;
            border-radius: 5px;
            overflow: hidden;
        }

        .qty-btn {
            padding: 0.7rem 1.2rem;
            background: #f0f0f0;
            border: none;
            cursor: pointer;
            font-size: 1.2rem;
            font-weight: bold;
            transition: background-color 0.3s;
        }

        .qty-btn:hover {
            background-color: #ddd;
        }

        .qty-input {
            width: 50px;
            text-align: center;
            border: none;
            font-size: 1.1rem;
        }

        .add-to-cart-form button {
            padding: 0.8rem 2rem;
            background-color: #833517;
            color: #fff;
            border: none;
            border-radius: 5px;
            font-size: 1.2rem;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .add-to-cart-form button:hover {
            background-color: #5e320e;
        }

        .login-notice {
            font-size: 1.1rem;
            color: #666;
            margin-top: 1.5rem;
        }

        .login-notice a {
            color: #d35400;
            text-decoration: none;
        }

        .login-notice a:hover {
            text-decoration: underline;
        }

        @media (max-width: 768px) {
            .product-detail-wrapper {
                flex-direction: column;
                align-items: center;
            }

            .product-image,
            .product-info {
                max-width: 100%;
            }

            .add-to-cart-form button {
                width: 100%;
            }
        }
    </style>

    <div class="product-detail-container">
        <div class="product-detail-wrapper">
            <div class="product-image">
                <img src="<?php echo substr($product_detail['avatar'], 3); ?>" alt="<?php echo htmlspecialchars($product_detail['Product_Name'], ENT_QUOTES, 'UTF-8'); ?>">
            </div>
            <div class="product-info">
                <h1 class="product-title"><?php echo htmlspecialchars($product_detail['Product_Name'], ENT_QUOTES, 'UTF-8'); ?></h1>
                <div class="product-price"><?php echo number_format($product_detail['Price'], 0, ',', '.'); ?> VND</div>
                <p class="product-description"><?php echo htmlspecialchars($product_detail['Description'], ENT_QUOTES, 'UTF-8'); ?></p>
                
                <?php if (isset($_SESSION['username'])): ?>
                <div class="product-actions">
                    <div class="quantity-selector">
                        <button class="qty-btn minus">-</button>
                        <input type="number" value="1" min="1" class="qty-input" id="Quantity">
                        <button class="qty-btn plus">+</button>
                    </div>
                    <form method="POST" action="cart.php" class="add-to-cart-form">
                        <input type="hidden" name="Customer_ID" value="<?php echo htmlspecialchars($_SESSION['Customer_ID'], ENT_QUOTES, 'UTF-8'); ?>">
                        <input type="hidden" name="Product_ID" value="<?php echo htmlspecialchars($product_detail['Product_ID'], ENT_QUOTES, 'UTF-8'); ?>">
                        <input type="hidden" name="Quantity" id="quantity_input">
                        <button type="submit" name="add_to_cart">Thêm vào giỏ hàng</button>
                    </form>
                </div>
                <?php else: ?>
                <div class="login-notice">
                    <p>Vui lòng <a href="signin.php">đăng nhập</a> để mua hàng</p>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const minusBtn = document.querySelector('.minus');
            const plusBtn = document.querySelector('.plus');
            const qtyInput = document.querySelector('.qty-input');
            
            if (minusBtn && plusBtn && qtyInput) {
                minusBtn.addEventListener('click', () => {
                    let value = parseInt(qtyInput.value);
                    if (value > 1) {
                        qtyInput.value = value - 1;
                    }
                });
                
                plusBtn.addEventListener('click', () => {
                    let value = parseInt(qtyInput.value);
                    qtyInput.value = value + 1;
                });
            }
        });

        document.querySelector('.add-to-cart-form').addEventListener('submit', function(e) {
            document.getElementById('quantity_input').value = document.getElementById('Quantity').value;
        });
    </script>

    <?php include 'footer.php'; ?>
</body>
</html>
