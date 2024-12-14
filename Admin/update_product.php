<?php 
    include "../head.php";
?>
<body>
    <?php 
        include "../header.php";
    ?>
    <style>
        <?php 
            include "../Public/CSS/style_add.css";
        ?>
    </style>
   
        <div class="content">
            <div class="container mt-5">
                <div class="form-container">
                    <h2 class="text-center title">Cập nhật sản phẩm</h2>
                    <form action="../controller/c_update_product.php" method="POST" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label for="id" class="form-label">Mã sản phẩm</label>
                            <input type="number" id="id" name="id" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="ProductName" class="form-label">Tên sản phẩm</label>
                            <input type="text" id="ProductName" name="ProductName" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="CategoryID" class="form-label">Mã danh mục</label>
                            <input type="number" id="CategoryID" name="CategoryID" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label for="Description" class="form-label">Mô tả</label>
                            <input type="text" id="Description" name="Description" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label for="Price" class="form-label">Giá</label>
                            <input type="number" id="Price" name="Price" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label for="StockQuantity" class="form-label">Số lượng</label>
                            <input type="number" id="StockQuantity" name="StockQuantity" class="form-control" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Cập nhật</button>
                    </form>
                    <p class="message">Don't have an account? <a href="#">Sign up</a></p>
                </div>
            </div>
        </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <?php 
        include "../footer.php";
    ?>
</body>
</html>


