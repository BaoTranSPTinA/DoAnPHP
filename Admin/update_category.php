
<body>
<style>
body {
      margin: 0;
      font-family: Arial, sans-serif;
      background-color: #A13C1E;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      background-size: cover;
      background-position: center;
    }
.container{
     background-color: white;
      width: 400px;
      padding: 20px;
      box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
      border-radius: 8px;
    }
.container h1{
     text-align: center;
     color: #A13C1E;
     font-size: 30px;
}

.container input{
    width: 100%;
    padding: 10px;
    margin: 10px 0;
    border: 1px solid #ccc;
    border-radius: 4px;
    font-size: 15px;
    width: 350px;
}

.container input::placeholder{
    color: #888;
}

.container button{
    width: 350px;
    padding: 10px;
    background-color: #A13C1E;
    color: white;
    border: none;
    border-radius: 4px;
    font-size: 16px;
    cursor: pointer;
    text-align: center;
}

.container button:hover{
    background-color: #FFE4C4;
    color: black;
}
</style>
<div class = "container">

                    <h1 class="text-center title">Cập nhật danh mục</h1>
                    <form action="../controller/c_update_category.php" method="POST" enctype="multipart/form-data">

                            <input type="number" id="id" name="id" placeholder = "Mã danh mục" class="form-control" required>
                            <input type="text" id="Category_Name" placeholder = "Tên danh mục" name="Category_Name" class="form-control" required>
                        <button type="submit" class="btn btn-primary">Cập nhật</button>
                    </form>
</div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>


