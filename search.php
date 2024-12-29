<?php
session_start();
require_once('Model/database.php');
require_once('Model/m_product.php');

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

$keyword = isset($_GET['keyword']) ? trim($_GET['keyword']) : '';
$product = new Product();
$search_results = $product->search_products($keyword);
?>

<div class="search-results">
    <h2>Kết quả tìm kiếm cho "<?php echo htmlspecialchars($keyword); ?>"</h2>
    
    <?php if (empty($search_results)): ?>
        <p class="no-results">Không tìm thấy sản phẩm nào phù hợp.</p>
    <?php else: ?>
        <div class="products-grid">
            <?php foreach ($search_results as $product): ?>
                <div class="product-card">
                    <img src="<?php echo substr($product['avatar'], 3); ?>" alt="<?php echo $product['Product_Name']; ?>">
                    <h3><?php echo $product['Product_Name']; ?></h3>
                    <p class="price"><?php echo number_format($product['Price']); ?> VNĐ</p>
                    <a href="product_detail.php?id=<?php echo $product['Product_ID']; ?>" class="view-detail">Xem chi tiết</a>
                </div>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
</div>

<style>
body {
    background-color: #b43f11;
}

.search-results {
    margin: 80px auto 20px;
    padding: 20px;
    max-width: 1200px;
}

.search-results h2 {
    color: #fff;
    text-align: center;
    margin-bottom: 30px;
    font-size: 2rem;
}

.no-results {
    text-align: center;
    color: #fff;
    font-size: 1.2rem;
    background: rgba(255, 255, 255, 0.1);
    padding: 20px;
    border-radius: 8px;
}

.products-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
    gap: 20px;
}

.product-card {
    background: #fff;
    border-radius: 8px;
    padding: 15px;
    text-align: center;
    transition: transform 0.3s ease;
    box-shadow: 0 2px 5px rgba(0,0,0,0.1);
}

.product-card:hover {
    transform: translateY(-5px);
}

.product-card img {
    width: 100%;
    height: 200px;
    object-fit: cover;
    border-radius: 4px;
}

.product-card h3 {
    margin: 10px 0;
    font-size: 1.2rem;
    color: #333;
}

.product-card .price {
    color: #b43f11;
    font-weight: bold;
    font-size: 1.1rem;
    margin: 10px 0;
}

.view-detail {
    display: inline-block;
    padding: 8px 15px;
    background: #b43f11;
    color: #fff;
    text-decoration: none;
    border-radius: 4px;
    transition: background 0.3s ease;
}

.view-detail:hover {
    background: #833517;
}
</style> 