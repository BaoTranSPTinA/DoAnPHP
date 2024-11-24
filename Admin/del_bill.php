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
                <h2 class="title">Xóa Hóa Đơn</h2>
                <form action="../controller/c_del_bill.php" method="POST" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="id" class="form-label">Mã đơn hàng</label>
                        <input type="number" id="id" name="id" class="form-control" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Xóa</button>
                </form>
                <p class="message">Don't have an account? <a href="#">Sign up</a></p>
            </div>
        </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <?php 
        include "../footer.php";
    ?>
</body>
</html>


