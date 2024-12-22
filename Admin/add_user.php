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
                    <button type="submit" class="btn btn-primary" >Thêm</button>
                </form>
            </div>
        </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>


