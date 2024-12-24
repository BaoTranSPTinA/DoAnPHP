<?php
require('Controller/c_list_product_home.php');

if(isset($_GET['id'])) {
    $id = $_GET['id'];
    $product = new Product();
    $product_detail = $product->get_product_by_id($id);
    
    if($product_detail) {
        // Hiển thị thông tin chi tiết sản phẩm
        include 'head.php';
        include 'header.php';
?>
        <div class="product-detail">
            <div class="product-image">
                <img src="<?php echo substr($product_detail['avatar'], 3); ?>" alt="<?php echo $product_detail['Product_Name']; ?>">
            </div>
            <div class="product-info">
                <h1><?php echo htmlspecialchars($product_detail['Product_Name']); ?></h1>
                <div class="price"><?php echo number_format($product_detail['Price'], 0, ',', '.'); ?> VND</div>
                <p class="description"><?php echo htmlspecialchars($product_detail['Description']); ?></p>
                <!-- Thêm các thông tin khác của sản phẩm -->
            </div>
        </div>
<?php
        include 'footer.php';
    }
}
?>