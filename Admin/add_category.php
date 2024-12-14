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
                <h2 class="title">Thêm danh mục</h2>
                        <form action="../controller/c_add_category.php" method="POST" enctype="multipart/form-data">
                            <div class="mb-4">
                                <label for="Category_Name" class="form-label">Tên danh mục</label>
                                <input type="text" id="Category_Name" name="Category_Name" class="form-control" required>
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
