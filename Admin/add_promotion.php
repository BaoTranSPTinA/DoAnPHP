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
        <div class="container mt-5 form-container">
            <<h2 class="title">Thêm khuyến mãi</h2>
            <form action="../controller/c_add_promotion.php" method="POST" enctype="multipart/form-data">
                <div class="mb-3">
                        <label for="promotionCode" class="form-label">Code khuyến mãi</label>
                        <input type="text" id="promotionCode" name="promotionCode" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="Startdate" class="form-label">Ngày bắt đầu</label>
                        <input type="datetime-local" id="Startdate" name="Startdate" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label for="Enddate" class="form-label">Ngày kết thúc</label>
                        <input type="datetime-local" id="Enddate" name="Enddate" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label for="percent" class="form-label">Phần trăm</label>
                        <input type="number" id="percent" name="percent" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label for="ProductID" class="form-label">Mã sản phẩm</label>
                        <input type="number" id="ProductID" name="ProductID" class="form-control" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Thêm</button>
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


