<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
body {
background-color:#4c1d0f;
}
.content {
    margin-left: 250px;
    width:100%;
    padding: 20px;
}
.header {
    height: 60px;
    background-color: #4c1d0f;
    color: white;
    padding: 0;
    text-align: center;
}


table {
    margin-left: -40px;
    width: 100%;
    border-collapse: collapse;
}

th, td, tr {
    border: 1px solid #ddd;
    padding: 10px;
    text-align: center;
    color: black;
    border-color: #4c1d0f;
}

button {
    background-color:#4c1d0f;
    color: white;
    border-radius: 8px;
    border: 1px solid black;
    font-size: 16px;
    padding: 5px 10px;
    position: relative;
    left: 900px;
    
    
}

button:hover {
    background-color:#CD853F;
    font-size: 16px;
    color: white;
}

    </style>
</head>
<body>
<?php
    require("menu_admin.php");
?>

   
   


    <div class="content">
        <div class="header">
            <h1><center>DANH SÁCH SẢN PHẨM</center></h1>
        </div>
        <div class="container mt-4">
        

        <script>
        function openPopupAdd() {
            window.open("add_product.php", "_blank", "width=800,height=600");
        }

        function openPopupDel() {
            window.open("del_product.php", "_blank", "width=800,height=600");
        }

        function openPopupUpdate() {
            window.open("update_product.php", "_blank", "width=800,height=600");
        }

        function Reload(){
            location.reload();
        }


        
        
        
    </script>


            <div class="row">
                <?php
                    require ('../controller/c_list_product.php');

                    $c_product = new Product();
               
                    $list_product= $c_product->list_all_product();

                ?>

                <table class="table">
                        <thead>
                            <tr>
                                <th>Mã sản phẩm</th>
                                <th>Hình ảnh</th>
                                <th>Tên sản phẩm</th>
                                <th>Mã danh mục</th>
                                <th>Mô tả</th>
                                <th>Giá</th>
                                <th>Số lượng</th>
                                <th>Ngày tạo</th>
                                
                            </tr>
                        </thead>
                        <tbody>


                       

                            <?php
                            foreach ($list_product as $c_product):
                            ?>
                            <tr>
                                <td><?php echo "{$c_product['Product_ID']}" ?></td>
                                <td> <?php echo "{$c_product['avatar']}" ?> </td>
                                <td> <?php echo "{$c_product['Product_Name']}" ?></td>
                                <td><?php echo "{$c_product['Category_ID']}" ?> </td>
                                <td> <?php echo "{$c_product['Description']}" ?></td>
                                <td> <?php echo "{$c_product['Price']}" ?></td>
                                <td>  <?php echo "{$c_product['Stock_Quantity']}" ?> </td>
                                <td> <?php echo "{$c_product['create_time']}" ?></td>
                               
                                
                            </tr>

                            <?php endforeach; ?>
                       
                       
                           
                        </tbody>
                    </table>

                    <div class="col-md-12">
                        <button  onclick="openPopupAdd()"> Thêm </button>
         
                        <button onclick="openPopupDel()"> Xóa</button>

                        <button  onclick="openPopupUpdate()"> Cập nhật</button>

                        <button onclick = "Reload()"> Tải lại</button>
             
                </div>


               
               
            </div>


        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>


