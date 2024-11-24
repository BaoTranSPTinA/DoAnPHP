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
                <h2 class="title">Thêm khách hàng</h2>
                <form action="../controller/c_add_user.php" method="POST" enctype="multipart/form-data">
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
                        <input type="text" id="Email" name="Email" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label for="PhoneNumber" class="form-label">Số điện thoại</label>
                        <input type="text" id="PhoneNumber" name="PhoneNumber" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label for="Address" class="form-label">Địa chỉ</label>
                        <input type="text" id="Address" name="Address" class="form-control" required>
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


