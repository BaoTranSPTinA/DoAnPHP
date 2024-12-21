
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
    color: #ffc107;
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
    color: #ffc107; 
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
    background-color: #ffc107;
    color: black;
    border-radius: 5px;
    align-items: center; 

}

button:hover {
    background-color: #4c1d0f;
}
</style>

<body>
   
    <div class="content">
        <div class="container mt-5 form-container">
            <h2 class="title">Thêm khuyến mãi</h2>
            <form action="../controller/c_add_promotion.php" method="POST" enctype="multipart/form-data">
                <div class="mb-3">
                        <label for="promotionCode" class="form-label">Code khuyến mãi</label>
                        <input type="text" id="promotionCode" name="promotionCode" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="Startdate" class="form-label">Ngày bắt đầu</label>
                        <input type="datetime-local" id="Startdate" name="Startdate" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label for="Enddate" class="form-label">Ngày kết thúc</label>
                        <input type="datetime-local" id="Enddate" name="Enddate" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label for="percent" class="form-label">Phần trăm</label>
                        <input type="number" id="percent" name="percent" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label for="ProductID" class="form-label">Mã sản phẩm</label>
                        <input type="number" id="ProductID" name="ProductID" class="form-control" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Thêm</button>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>


