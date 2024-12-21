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
                    <h2 class="text-center title">Cập nhật đơn hàng</h2>
                    <form action="../controller/c_update_bill.php" method="POST" enctype="multipart/form-data">

                        <div class="mb-3">
                            <label for="id" class="form-label">Mã đơn hàng</label>
                            <input type="number" id="id" name="id" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="CustomerID" class="form-label">Mã khách hàng </label>
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
                        <button type="submit" class="btn btn-primary">Cập nhật</button>
                    </form>
                </div>
            </div>
        </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>


