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
                    <h2 class="text-center title">Xóa khách hàng</h2>
                    <form action="../controller/c_del_user.php" method="POST" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label for="CustomerName" class="form-label">Tên khách hàng</label>
                            <input type="text" id="CustomerName" name="CustomerName" class="form-control" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Xóa</button>
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


