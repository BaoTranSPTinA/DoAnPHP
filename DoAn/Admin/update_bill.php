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
                <h2>Cập nhật đơn hàng </h2>
               
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




                <p class="message">Don't have an account? <a href="#">Sign up</a></p>
            </div>


        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>


