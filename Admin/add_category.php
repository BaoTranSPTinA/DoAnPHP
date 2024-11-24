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
        <div class="container mt-4">
            <h2 class="text-center">Welcome to the Admin Dashboard!</h2>
            <p class="text-center">This is your central hub for managing the application.</p>

            <div class="container mt-5 form-container">
                <h2 class="text-center title">Thêm danh mục</h2>
                <div class="row justify-content-center">
                    <div class="col-lg-8 col-md-10">
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
