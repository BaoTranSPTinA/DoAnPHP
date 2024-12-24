<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADMIN</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">

</head>
<style>
    body {
    margin: 0;
    font-family: Arial, sans-serif;
    background-color: #FFE4C4;
}

.menu {
    width: 300px;
    background-color: #A13C1E;
    color: #ffffff;
    height: 100vh;
    padding: 20px;
    box-shadow: 2px 0 5px rgba(0, 0, 0, 0.1);
    position: absolute;
}

.menu-group {
    margin-bottom: 20px;
}

.menu-group h3 {
    font-size: 30px;
    font-weight: bold;
    margin-bottom: 10px;
    text-align: center;
}

a {
    text-decoration: none; 
    color: white; 
    font-size: 25px;
    margin-left:-25px;

}
.menu li {
    margin-bottom: 15px; 
}
.menu ul a {
    display: flex; 
    align-items: center; 
    text-decoration: none; 
    color: white;
    font-size: 25px; 
}
ul a:hover {
    color: #EEAD0E; 
}


</style>
<body>

    <div class="menu">
        <div class="menu-group">
            <h3>DASHBOARD</h3>
            <ul>
            <a href="list_user.php" class="icon-a"><i class="fa fa-users icons"></i>&nbsp;&nbsp;Customer</a><br><br>
            <a href="list_category.php" class="icon-a"><i class="fa fa-file-text icons"></i> &nbsp;&nbsp; Category</a><br><br>
            <a href="list_product.php" class="icon-a"><i class="fa fa-birthday-cake" aria-hidden="true"></i> &nbsp;&nbsp;Product</a><br><br>
            <a href="list_bill.php" class="icon-a"><i class="fa fa-file-text" aria-hidden="true"></i>&nbsp;&nbsp;   Order</a><br><br>


            <a href="../index.php" class="icon-a"><i class="fa fa-arrow-left" aria-hidden="true"></i>&nbsp;&nbsp;Return</a><br><br>

            


            

            

            

            </ul>
        </div>
    </div>
</body>
</html>
