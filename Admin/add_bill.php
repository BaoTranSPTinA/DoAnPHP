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
                <h2 class="title">Thêm hóa đơn</h2>
                <form action="../controller/c_add_bill.php" method="POST" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="CustomerID" class="form-label">Mã khách hàng</label>
                        <input type="number" id="CustomerID" name="CustomerID" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="Total" class="form-label">Tổng tiền </label>
                        <input type="number" id="Total" name="Total" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label for="ShipAdd" class="form-label">Địa chỉ giao hàng</label>
                        <input type="text" id="ShipAdd" name="ShipAdd" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label for="status" class="form-label">Trạng thái</label>
                        <input type="text" id="status" name="status" class="form-control" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Thêm</button>
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


