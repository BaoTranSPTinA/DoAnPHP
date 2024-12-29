<?php
session_start();
require_once('Controller/c_list_product_home.php');
require_once('Model/m_category.php');

$c_product = new c_product();
$category = new Category();
$categories = $category->list_all_category();

// Lấy sản phẩm theo category nếu có
if (isset($_GET['category'])) {
    $category_id = $_GET['category'];
    $list_product = $c_product->get_products_by_category($category_id);
} else {
    $list_product = $c_product->list_all_product();
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
        .products .title {
            margin-top: 60px; 
            text-align: center; 
            font-size: 2.5rem; 
            color: #ffffff; 
        }

        .products .title span {
            color: #222;
        }

        .category-box {
            background: transparent;
            padding: 10px;
            border-radius: 5px;
            margin: 20px auto;
            max-width: 300px;
            text-align: center;
        }

        .category-box h3 {
            color: #ffc107;
            font-size: 1.7rem;
            margin-bottom: 10px;
        }

        .category-select {
            width: 50%;
            padding: 8px;
            font-size: 1rem;
            border: 1px solid #ccc;
            border-radius: 5px;
            background: #fff;
            color: #000;
            cursor: pointer;
            outline: none;
        }

        .category-select:hover {
            border-color: #ffc107;
        }

        .category-select option {
            background: #fff;
            color: #000;
            padding: 10px;
        }

        .category-select option:hover {
            background: #f4f4f4;
        }


        @media (max-width: 768px) {
            .box-container {
                grid-template-columns: repeat(2, 1fr);
                padding: 1rem;
            }
        }

        @media (max-width: 480px) {
            .box-container {
                grid-template-columns: 1fr;
            }
            
            .category-box ul {
                flex-direction: column;
            }
            
            .category-box li {
                width: 100%;
                text-align: center;
            }
        }
    </style>
    <section class="products">
        <h2 class="title">All <span>Products</span></h2>
        
        <div class="category-box">
            <h3>Category</h3>
            <select id="category-select" class="category-select" onchange="window.location.href=this.value">
                <option value="view_all_product.php">All Products</option>
                <?php foreach ($categories as $category): ?>
                    <option 
                        value="view_all_product.php?category=<?php echo $category['Category_ID']; ?>"
                        <?php echo (isset($_GET['category']) && $_GET['category'] == $category['Category_ID']) ? 'selected' : ''; ?>
                    >
                        <?php echo htmlspecialchars($category['Category_Name']); ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>
        
        <div class="box-container">
            <?php if (!empty($list_product)): ?>
                <?php foreach ($list_product as $product): ?>
                <div class="box">
                    <div class="icons">
                        <a href="#" class="fas fa-shopping-cart"></a>
                        <a href="#" class="fas fa-heart"></a>
                        <a href="#" class="fas fa-eye"></a>
                    </div>
                    <div class="img">
                        <?php
                            $avatar_path = substr($product['avatar'], 3); 
                            if (file_exists($avatar_path)) {
                                echo "<img style='height: 150px' src='$avatar_path' alt='Product Image'>";
                            } else {
                                echo "<img style='height: 150px' src='../Uploads/default_image.jpg' alt='Product Image'>";
                            }
                        ?>
                    </div>
                    <div class="content">
                        <h3><?php echo htmlspecialchars($product['Product_Name']); ?></h3>
                        <div class="price"><?php echo number_format($product['Price'], 0, ',', '.'); ?> VND</div>
                        <div class="stars">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            <?php else: ?>
                <p style="text-align: center; color: #fff;">Không tìm thấy sản phẩm nào.</p>
            <?php endif; ?>
        </div>
    </section>
    <?php 
    include 'footer.php';
    ?>
</body>
</html>