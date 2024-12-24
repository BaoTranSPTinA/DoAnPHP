<?php
session_start();
require_once('Controller/c_list_product_home.php');
require_once('Model/m_product.php');
require_once('Model/m_category.php');

$product = new Product();
$category = new Category();


$categoryID = isset($_GET['category']) ? $_GET['category'] : null;

if ($categoryID) {
    $list_product = $product->get_products_by_category($categoryID);
} else {
    $list_product = $product->list_all_product();
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
        .filter {
            text-align: left;
            margin: 20px 0;
        }
        .filter select {
            padding: 10px;
            font-size: 1rem;
        }
    </style>
    <section class="products">
        <h2 class="title"> All <span>Products</span> </h2>
        
        <div class="filter">
            <form method="GET" action="view_all_product.php">
                <select name="category" onchange="this.form.submit()">
                    <option value="">All Categories</option>
                    <?php
                    $categories = $category->list_all_category(); 
                    foreach ($categories as $category) {
                        $selected = ($category['Category_ID'] == $categoryID) ? 'selected' : '';
                        echo "<option value='{$category['Category_ID']}' $selected>{$category['Category_Name']}</option>";
                    }
                    ?>
                </select>
            </form>
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
                <p style="text-align: center; color: #fff;">No products found for this category.</p>
            <?php endif; ?>
        </div>
    </section>
    <?php 
    include 'footer.php';
    ?>
</body>
</html>
