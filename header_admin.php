<?php
session_start();
require_once('Model/m_category.php');  // Include category model

$category = new Category();  // Instantiate Category model
$categories = $category->list_all_category();  // Get all categories from the database
?>

<!-- Header section for Admin -->
<header class="header">
    <a href="index.php" class="logo"><i class="fas fa-shopping-basket"></i> Admin Dashboard </a>

    <nav class="navbar">
        <a href="index.php">Home</a>
        
        <!-- Category Dropdown Menu -->
        <div class="dropdown">
            <button class="dropdown-btn">Category</button>
            <div class="dropdown-content">
                <?php foreach ($categories as $category): ?>
                    <a href="view_category.php?Category=<?php echo $category['Category_ID']; ?>"><?php echo htmlspecialchars($category['Category_Name']); ?></a>
                <?php endforeach; ?>
            </div>
        </div>

        <a href="#">Shop</a>
        <a href="#blogs">Blog</a>
        <a href="#about-section1">Contact</a>

        <!-- Dropdown Menu -->
        <div class="dropdown">
            <button class="dropdown-btn">Dashboard</button>
            <div class="dropdown-content">
                <a href="Admin/list_user.php">Manage Customers</a>
                <a href="Admin/list_category.php">Manage Categories</a>
                <a href="Admin/list_product.php">Manage Products</a>
                <a href="Admin/list_bill.php">Manage Orders</a>
            </div>
        </div>
    </nav>

    <div class="icons">
        <div id="menu-btn" class="fas fa-bars"></div>
        <div id="search-btn" class="fas fa-search"></div>
        <a href="watch_cart.php"><div id="cart-btn" class="fas fa-shopping-cart"></div></a>

        <?php if (isset($_SESSION['username'])): ?> 
            <!-- Nếu đã đăng nhập, hiển thị tên người dùng và liên kết tới trang thông tin cá nhân -->
            <a href="profile.php">
                <span class="user-name" style="font-size: 1.8rem; color: white; margin-left: 20px;">
                    <?php echo $_SESSION['Customer_name']; ?>
                </span>
            </a>
            <a href="Controller/c_signout.php"><div id="login-btn" class="fas fa-sign-out-alt"></div></a> 
        <?php endif; ?>
    </div>
</header>

<style>
/* General Header Styles */
.header {
    position: fixed;
    top: 0;
    left: 0;
    right: 0;
    z-index: 1000;
    background: var(--brown);
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 2rem 9%;
    box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.1);
}

.header .logo {
    font-size: 2.5rem;
    font-weight: bolder;
    color: #ffffff;
}

.header .logo i {
    color: #222;
    padding-right: .5rem;
}

.header .navbar {
    display: flex;
    align-items: center;
}

.header .navbar a {
    font-size: 1.7rem;
    color: #fff;
    margin: 0 1rem;
}

.header .navbar a:hover {
    color: #222;
}

/* Dropdown Styles */
.dropdown {
    position: relative;
    display: inline-block;
}

.dropdown-btn {
    font-size: 1.7rem;
    background: transparent;
    border: none;
    color: white;
    cursor: pointer;
    padding: 10px 20px;
}

.dropdown-content {
    display: none;
    position: absolute;
    left: 50%;
    transform: translateX(-50%);
    background-color: rgb(0, 0, 0);
    min-width: 250px;
    box-shadow: 0px 8px 16px rgba(0, 0, 0, 0.2);
    z-index: 1;
    border-radius: 5px;
}

.dropdown-content a {
    color: black;
    padding: 12px 16px;
    text-decoration: none;
    display: block;
}

.dropdown-content a:hover {
    background-color: #ddd;
}

.dropdown:hover .dropdown-content {
    display: block;
}

.dropdown:hover .dropdown-btn {
    color: black;
}

/* Icons */
.header .icons div {
    font-size: 2.5rem;
    color: #fff;
    margin-left: 1.7rem;
    cursor: pointer;
}

.header .icons div:hover {
    color: #222;
}
.cart-icon-wrapper {
    position: relative;
    display: inline-block;
}

.cart-count {
    position: absolute;
    top: -8px;
    right: -8px;
    background-color: #ff4444;
    color: white;
    border-radius: 50%;
    padding: 2px 6px;
    font-size: 12px;
    min-width: 15px;
    text-align: center;
}
</style>
