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
    width: 100%;
    border-collapse: collapse;
}

th, td, tr {
    border: 1px solid #ddd;
    padding: 10px;
    text-align: center;
    color: white;
}

button {
    background-color:#CD853F;
    color: white;
    border-radius: 8px;
    border: 1px solid black;
    font-size: 16px;
    padding: 5px 10px;
    position: relative;
    left: 900px;
    
    
}

button:hover {
    background-color:#4c1d0f;
    font-size: 16px;
    color: white;
}

    </style>
</head>
<body>


   
   


    <div class="content">
        <div class="header">
            <h1><center>DANH SÁCH DANH MỤC</center></h1>
        </div>
        <div class="container mt-4">
        

        <script>
        function openPopupAdd() {
            window.open("add_category.php", "_blank", "width=800,height=600");
        }

        function openPopupDel() {
            window.open("del_category.php", "_blank", "width=800,height=600");
        }

        function openPopupUpdate() {
            window.open("update_category.php", "_blank", "width=800,height=600");
        }

        function Reload(){
            location.reload();
        }


        
        
        
    </script>


            <div class="row">
                <?php
                    require ('../controller/c_list_category.php');

                    $c_category = new category();
               
                    $list_category= $c_category->list_all_category();

                ?>

                <table class="table">
                        <thead>
                            <tr>
                                <th>Mã danh mục</th>
                                <th>Tên danh mục</th>
                                <th>Ngày tạo</th>
                                
                            </tr>
                        </thead>
                        <tbody>


                       

                            <?php
                            foreach ($list_category as $c_category):
                            ?>
                            <tr>
                                <td><?php echo "{$c_category['Category_ID']}" ?></td>
                                <td> <?php echo "{$c_category['Category_Name']}" ?></td>
                                <td> <?php echo "{$c_category['create_time']}" ?></td>
                               
                                
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
