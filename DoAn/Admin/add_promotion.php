<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
}
.sidebar {
    height: 100vh;
    position: fixed;
    top: 0;
    left: 0;
    z-index: 100;
    padding: 48px 0 0;
    background-color: #F99A9c;
}
.sidebar a {
    color: #ffffff;
}
.sidebar a:hover {
    background-color: #495057;
}
.content {
    margin-left: 250px;
    padding: 20px;
}
.header {
    height: 60px;
    background-color: #F99A9c;
    color: white;
    padding: 0;
    text-align: center;
}
    </style>

</head>
<body>
   


    <div class="content">
        <div class="header">
            <h1>Dashboard</h1>
        </div>
        <div class="container mt-4">
            <h2>Welcome to the Admin Dashboard!</h2>
            <p>This is your central hub for managing the application.</p>




        
            <!-- Add your content here -->

 
            <div class="container">
                <h2>Thêm khuyến mãi</h2>
               
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




                <p class="message">Don't have an account? <a href="#">Sign up</a></p>
            </div>


        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>


