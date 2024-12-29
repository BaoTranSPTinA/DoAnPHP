<?php
session_start();
require_once('Controller/c_list_product_home.php');

// Kiểm tra id sản phẩm trong GET request
if(isset($_GET['id'])) {
    $id = intval($_GET['id']);  
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
            padding: 2rem;
            background: #b43f11;
            border-radius: 10px;
        }

        .product-detail-wrapper {
            display: flex;
            gap: 2rem;
            background: #b43f11;
            padding: 2rem;
            border-radius: 8px;
        }

        .product-image {
            position: relative;
            flex: 1;
            max-width: 500px;
        }

        .product-image img {
            width: 100%;
            height: auto;
            border-radius: 10px;
            object-fit: cover;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        .zoom-btn {
            position: absolute;
            right: 10px;
            top: 10px;
            background: rgba(255,255,255,0.8);
            border: none;
            border-radius: 50%;
            width: 40px;
            height: 40px;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .product-info {
            flex: 1;
            padding: 1rem;
        }

        .product-title {
            font-size: 2.2rem;
            color: #fff;
            margin-bottom: 0.5rem;
        }

        

        .product-price {
            font-size: 1.8rem;
            color: #ffc107;
            font-weight: bold;
            margin-bottom: 1.5rem;
        }

        .product-actions {
            display: flex;
            gap: 1rem;
            margin-top: 2rem;
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
            background: rgba(255,255,255,0.2);
            border: none;
            cursor: pointer;
            font-size: 1.2rem;
            transition: background-color 0.3s;
            color: #fff;
        }

        .qty-btn:hover {
            background-color: #ddd;
        }

        .qty-input {
            width: 50px;
            text-align: center;
            border: none;
            font-size: 1.1rem;
            background: #b43f11;
            color: #fff;
        }

        .add-to-cart-form button {
            padding: 0.8rem 2rem;
            background-color: #ffc107;
            color: #000;
            border: none;
            border-radius: 5px;
            font-size: 1.2rem;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .add-to-cart-form button:hover {
            background-color: #e0a800;
        }

        .product-description {
            color: #fff;
            margin-top: 30px;
            padding-top: 20px;
            border-top: 1px solid rgba(255,255,255,0.1);
        }

        .product-description h3 {
            font-size: 1.2rem;
            color: #fff;
            margin-bottom: 15px;
        }

        .product-description p {
            font-size: 1rem;
            line-height: 1.6;
            color: #fff;
        }

        .login-notice {
            margin-top: 2rem;
            padding: 1rem;
            background: rgba(255,255,255,0.1);
            border-radius: 5px;
            text-align: center;
            color: #fff;
        }

        .login-notice a {
            color: #ffc107;
            text-decoration: none;
            font-weight: bold;
        }

        .login-notice a:hover {
            text-decoration: underline;
        }
        .related-products {
            margin-top: 3rem;
            padding: 2rem;
            background: #b43f11;
            border-radius: 10px;
        }

        .related-products h2 {
            color: #fff;
            font-size: 2rem;
            margin-bottom: 2rem;
            text-align: center;
        }

        .products-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 2rem;
        }

        .product-card {
            background: rgba(255,255,255,0.1);
            padding: 1rem;
            border-radius: 8px;
            text-align: center;
            transition: transform 0.3s ease;
            color: #fff;
        }

        .product-card:hover {
            transform: translateY(-5px);
        }

        .product-card img {
            width: 100%;
            height: 200px;
            object-fit: cover;
            border-radius: 5px;
        }

        .product-card h3 {
            font-size: 1.5rem;
            color: #fff;
            margin: 1rem 0;
        }

        .product-card .price {
            color: #ffc107;
            font-size: 1.3rem;
            font-weight: bold;
            margin-bottom: 1rem;
        }

        .product-card .view-detail {
            display: inline-block;
            padding: 0.8rem 1.5rem;
            background: rgba(255,255,255,0.2);
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            transition: background 0.3s ease;
        }

        .product-card .view-detail:hover {
            background: rgba(255,255,255,0.3);
        }

        @media (max-width: 768px) {
            .product-detail-wrapper {
                flex-direction: column;
            }

            .product-image,
            .product-info {
                max-width: 100%;
            }

            .product-actions {
                flex-direction: column;
            }

            .add-to-cart-form button {
                width: 100%;
            }
            .products-grid {
                grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
            }
        }
    </style>

    <div class="product-detail-container">
        <div class="product-detail-wrapper">
            <div class="product-image">
                <img src="<?php echo substr($product_detail['avatar'], 3); ?>" alt="<?php echo htmlspecialchars($product_detail['Product_Name'], ENT_QUOTES, 'UTF-8'); ?>">
                <button class="zoom-btn" onclick="toggleZoom(this)">
                    <i class="fas fa-search-plus"></i>
                </button>
            </div>
            <div class="product-info">
                <h1 class="product-title"><?php echo htmlspecialchars($product_detail['Product_Name'], ENT_QUOTES, 'UTF-8'); ?></h1>
                <div class="product-price"><?php echo number_format($product_detail['Price'], 0, ',', '.'); ?> VND</div>

                <?php if (isset($_SESSION['username'])): ?>
                <div class="product-actions">
                    <div class="quantity-selector">
                        <button type="button" class="qty-btn minus">-</button>
                        <input type="number" value="1" min="1" class="qty-input" id="Quantity">
                        <button type="button" class="qty-btn plus">+</button>
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

                <div class="product-description">
                    <h3>Mô tả sản phẩm</h3>
                    <p><?php echo nl2br(htmlspecialchars($product_detail['Description'], ENT_QUOTES, 'UTF-8')); ?></p>
                </div>
            </div>
        </div>
    </div>
    
    <?php
        $related_products = $product->get_related_products($id, $product_detail['Category_ID']);
        if (!empty($related_products)): 
        ?>
        <div class="related-products">
            <h2>Sản phẩm liên quan</h2>
            <div class="products-grid">
                <?php foreach ($related_products as $related): ?>
                    <div class="product-card">
                        <img src="<?php echo substr($related['avatar'], 3); ?>" alt="<?php echo htmlspecialchars($related['Product_Name']); ?>">
                        <h3><?php echo htmlspecialchars($related['Product_Name']); ?></h3>
                        <p class="price"><?php echo number_format($related['Price'], 0, ',', '.'); ?> VNĐ</p>
                        <a href="product_detail.php?id=<?php echo $related['Product_ID']; ?>" class="view-detail">Xem chi tiết</a>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
        <?php endif; ?>
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

            const addToCartForm = document.querySelector('.add-to-cart-form');
            if (addToCartForm) {
                addToCartForm.addEventListener('submit', function(e) {
                    document.getElementById('quantity_input').value = document.getElementById('Quantity').value;
                });
            }
        });

        function toggleZoom(button) {
            const img = button.parentElement.querySelector('img');
            if (img.classList.contains('zoomed')) {
                img.style.transform = 'scale(1)';
                img.classList.remove('zoomed');
                button.innerHTML = '<i class="fas fa-search-plus"></i>';
            } else {
                img.style.transform = 'scale(1.5)';
                img.classList.add('zoomed');
                button.innerHTML = '<i class="fas fa-search-minus"></i>';
            }
        }
    </script>

    <?php include 'footer.php'; ?>
</body>
</html>