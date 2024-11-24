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

    <!-- Content -->
    <div class="content"> <!-- Thêm khoảng cách đệm -->
    <div class="container mt-4">
        <div class="container mt-5 form-container">
            <h2 class="title text-center">Thêm Chi tiết</h2>
            <div class="row justify-content-center">
                <div class="col-lg-10 col-xl-8">
                    <form action="../controller/c_add_detail.php" method="POST" enctype="multipart/form-data">
                        <div class="mb-4">
                            <label for="oid" class="form-label">Mã hóa đơn</label>
                            <input type="number" id="oid" name="oid" class="form-control" required>
                        </div>
                        <div class="mb-4">
                            <label for="pid" class="form-label">Mã sản phẩm</label>
                            <input type="number" id="pid" name="pid" class="form-control" required>
                        </div>
                        <div class="mb-4">
                            <label for="quantity" class="form-label">Số lượng</label>
                            <input type="number" id="quantity" name="quantity" class="form-control" required>
                        </div>
                        <button type="submit" class="btn btn-primary btn-block">Thêm</button>
                    </form>
                    <p class="message text-center mt-4">Don't have an account? <a href="#">Sign up</a></p>
                </div>
            </div>
        </div>
    </div>
</div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <?php 
        include "../footer.php";
    ?>
</body>



</html>
