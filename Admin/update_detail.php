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
                    <h2 class="text-center title">Cập nhật chi tiết</h2>
                    <form action="../controller/c_update_detail.php" method="POST" enctype="multipart/form-data">

                    <div class="mb-3">
                            <label for="id" class="form-label">Mã chi tiết</label>
                            <input type="number" id="id" name="id" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="oid" class="form-label">Mã hóa đơn</label>
                            <input type="number" id="oid" name="oid" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="pid" class="form-label">Mã sản phẩm</label>
                            <input type="number" id="pid" name="pid" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label for="quantity" class="form-label">Số lượng</label>
                            <input type="number" id="quantity" name="quantity" class="form-control" required>
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


