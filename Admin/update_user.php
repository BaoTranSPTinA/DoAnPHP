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
                    <h2 class="text-center title">Cập nhật thông tin khách hàng</h2>
                    <form action="../controller/c_update_user.php" method="POST" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label for="id" class="form-label">Mã khách hàng</label>
                            <input type="number" id="id" name="id" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="CustomerName" class="form-label">Tên khách hàng</label>
                            <input type="text" id="CustomerName" name="CustomerName" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="UserName" class="form-label">Tên đăng nhập</label>
                            <input type="text" id="UserName" name="UserName" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="Password" class="form-label">Mật khẩu</label>
                            <input type="password" id="Password" name="Password" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="Email" class="form-label">Email</label>
                            <input type="email" id="Email" name="Email" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="PhoneNumber" class="form-label">Số điện thoại</label>
                            <input type="tel" id="PhoneNumber" name="PhoneNumber" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="Address" class="form-label">Địa chỉ</label>
                            <input type="text" id="Address" name="Address" class="form-control" required>
                        </div>
                        <button type="submit" class="btn btn-primary w-100">Cập nhật</button>
                    </form>
                    <p class="text-center mt-3 message">Bạn chưa có tài khoản? <a href="#">Đăng ký</a></p>
                </div>
            </div>
        </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <?php 
        include "../footer.php";
    ?>
</body>
</html>
