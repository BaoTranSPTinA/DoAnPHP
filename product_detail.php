<?php
session_start();
require_once('Controller/c_list_product_home.php');


if(isset($_GET['id'])) {
    $id = $_GET['id'];
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
        .product-detail-container {
            max-width: 1000px;
            margin: 70px auto 2rem;
            padding: 0 1rem;
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
            border-radius: 8px;
            object-fit: cover;
        }

        .product-info {
            flex: 1;
            padding: 1rem;
        }

        .product-title {
            font-size: 2rem;
            color: #333;
            margin-bottom: 1rem;
        }

        .product-price {
            font-size: 1.8rem;
            color: #e0a800;
            font-weight: bold;
            margin-bottom: 1.5rem;
        }

        .product-description {
            font-size: 1.1rem;
            line-height: 1.6;
            color: #666;
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
            border-radius: 4px;
            background: #fff;
        }

        .qty-btn {
            padding: 0.5rem 1rem;
            background: #f5f5f5;
            border: none;
            cursor: pointer;
            font-size: 1.2rem;
            transition: background 0.3s;
        }

        .qty-btn:hover {
            background: #e0e0e0;
        }

        .qty-input {
            width: 60px;
            text-align: center;
            border: none;
            padding: 0.5rem;
            font-size: 1rem;
        }

        .add-to-cart-btn {
            padding: 0.8rem 2rem;
            background: #4c1d0f;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background 0.3s;
            font-size: 1rem;
        }

        .add-to-cart-btn:hover {
            background: #693115;
        }

        @media (max-width: 768px) {
            .product-detail-wrapper {
                flex-direction: column;
            }
            
            .product-image {
                max-width: 100%;
            }

            .product-actions {
                flex-direction: column;
                gap: 1rem;
            }

            .quantity-selector {
                width: 100%;
                justify-content: center;
            }

            .add-to-cart-btn {
                width: 100%;
            }
        }
    </style>

    <div class="product-detail-container">
        <div class="product-detail-wrapper">
            <div class="product-image">
                <img src="<?php echo substr($product_detail['avatar'], 3); ?>" alt="<?php echo $product_detail['Product_Name']; ?>">
            </div>
            <div class="product-info">
                <h1 class="product-title"><?php echo htmlspecialchars($product_detail['Product_Name']); ?></h1>
                <div class="product-price"><?php echo number_format($product_detail['Price'], 0, ',', '.'); ?> VND</div>
                <p class="product-description"><?php echo htmlspecialchars($product_detail['Description']); ?></p>
                
                <?php if (isset($_SESSION['username'])): ?>
                <div class="product-actions">
                    <div class="quantity-selector">
                        <button class="qty-btn minus">-</button>
                        <input type="number" value="1" min="1" class="qty-input" id="quantity">
                        <button class="qty-btn plus">+</button>
                    </div>
                    <button class="add-to-cart-btn" onclick="addToCart(<?php echo $id; ?>)">Thêm vào giỏ hàng</button>
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

        function addToCart(productId) {
            const quantity = document.getElementById('quantity').value;
            // Thêm xử lý thêm vào giỏ hàng ở đây
            // Có thể sử dụng AJAX để gửi request đến server
            console.log('Thêm vào giỏ hàng:', productId, quantity);
        }
    </script>

    <?php include 'footer.php'; ?>
</body>
</html>