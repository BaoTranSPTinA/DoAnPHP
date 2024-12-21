
<body>
<style>
    body {
    margin: 0;
    padding-top: 35px;
    font-family: Arial, sans-serif;
    background-color: #4c1d0f; 
    color: #f5f5f5; 
}

.form-container {
    background-color: #4c1d0f; 
    padding: 50px 20px;
}

.form-control {
    width: 100%;
    height: 45px; 
    font-size: 18px;
    border: 2px solid #f5f5f5; 
    background-color: transparent; 
    color: #f5f5f5; 
    padding: 10px;
    margin-bottom: 20px;
}

.title {
    font-size: 30px;
    font-weight: bold;
    color: #00EE00;
    text-transform: uppercase;
    text-align: center;
    margin-bottom: 20px;
}

.form-label {
    font-size: 18px;
    color: #f5f5f5;
    margin-bottom: 10px;
    display: block;
    text-align: left; 
}

.message {
    font-size: 16px;
    text-align: center;
    margin-top: 20px;
}

.message a {
    color: #FF3366; 
    text-decoration: none;
    transition: color 0.3s ease;
}

.message a:hover {
    color: #e0a800; 
    text-decoration: underline;
}
button{
    padding: 10px 20px;
    font-size: 16px;
    background-color: #00EE00;
    color: black;
    border-radius: 5px;
    align-items: center; 

}

button:hover {
    background-color: #4c1d0f;
}
</style>


   
        <div class="content">
            <div class="container mt-5">
                <div class="form-container">
                    <h2 class="text-center title">Cập nhật sản phẩm</h2>
                    <form action="../controller/c_update_product.php" method="POST" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label for="id" class="form-label">Mã sản phẩm</label>
                            <input type="number" id="id" name="id" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="ProductName" class="form-label">Tên sản phẩm</label>
                            <input type="text" id="ProductName" name="ProductName" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="CategoryID" class="form-label">Mã danh mục</label>
                            <input type="number" id="CategoryID" name="CategoryID" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label for="Description" class="form-label">Mô tả</label>
                            <input type="text" id="Description" name="Description" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label for="Price" class="form-label">Giá</label>
                            <input type="number" id="Price" name="Price" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label for="StockQuantity" class="form-label">Số lượng</label>
                            <input type="number" id="StockQuantity" name="StockQuantity" class="form-control" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Cập nhật</button>
                    </form>
                </div>
            </div>
        </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>


