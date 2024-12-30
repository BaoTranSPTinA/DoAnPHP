<?php
session_start();
require_once('Model/m_category.php');  // Include category model

$category = new Category();  // Instantiate Category model
$categories = $category->list_all_category();  // Get all categories from the database
?>

<!-- Header section -->
<header class="header">
    <a href="index.php" class="logo"><i class="fas fa-shopping-basket"></i> Cake </a>

    <nav class="navbar">
        <a href="index.php">Home</a>
        <a href="#our-shop">Shop</a>

        <!-- Category Dropdown Menu -->
        <div class="dropdown">
            <button class="dropdown-btn">Category</button>
            <div class="dropdown-content">
                <?php foreach ($categories as $category): ?>
                    <a href="view_category.php?Category=<?php echo $category['Category_ID']; ?>"><?php echo htmlspecialchars($category['Category_Name']); ?></a>
                <?php endforeach; ?>
            </div>
        </div>

        <a href="#blogs">Blog</a>
        <a href="#about-section1">Contact</a>
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
        <?php else: ?> 
            <!-- Nếu chưa đăng nhập, hiển thị 2 nút Đăng nhập và Đăng ký --> 
            <a href="signin.php"><button class="login-btn">Đăng nhập</button></a> 
            <a href="signup.php"><button class="signup-btn">Đăng ký</button></a> 
        <?php endif; ?>

    </div>
    
</header>

<div class="search-form">
    <form action="search.php" method="GET">
        <input type="search" name="keyword" id="search-box" placeholder="Tìm kiếm sản phẩm...">
        <button type="button" id="close-search" class="close-btn">&times;</button>
    </form>
</div>

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

.search-form {
    position: fixed;
    top: -110%;
    left: 0;
    height: 100%;
    width: 100%;
    z-index: 1004;
    background: rgba(0, 0, 0, .8);
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 0 1rem;
    transition: .4s linear;
}

.search-form.active {
    top: 0;
}

.search-form form {
    width: 50rem;
    padding: 1.5rem;
    background: #fff;
    border-radius: .5rem;
    display: flex;
    align-items: center;
    gap: 1rem;
}

.search-form form input {
    width: 100%;
    padding: 1rem;
    font-size: 1.6rem;
    color: var(--black);
    text-transform: none;
    border: 1px solid #ddd;
    border-radius: .3rem;
}

.search-form form button {
    font-size: 2rem;
    cursor: pointer;
    color: var(--brown);
    background: none;
    border: none;
    transition: color 0.3s ease;
}

.search-form form button:hover {
    color: #222;
}

#search-btn {
    cursor: pointer;
    transition: color 0.3s ease;
}

#search-btn:hover {
    color: #222;
}
.search-form .close-btn {
    position: absolute;
    top: 15px;
    right: 25px;
    font-size: 2rem;
    cursor: pointer;
    color: #666;
    background: none;
    border: none;
}

.search-form .close-btn:hover {
    color: #b43f11;
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const searchBtn = document.querySelector('#search-btn');
    const searchForm = document.querySelector('.search-form');
    
    // Hiển thị form tìm kiếm khi click vào nút search
    searchBtn.addEventListener('click', () => {
        searchForm.classList.toggle('active');
    });
    
    // Đóng form tìm kiếm khi click ra ngoài
    document.addEventListener('click', (e) => {
        if (!searchForm.contains(e.target) && e.target !== searchBtn) {
            searchForm.classList.remove('active');
        }
    });
    document.getElementById('close-search').addEventListener('click', () => {
    document.querySelector('.search-form').classList.remove('active');
});
});
</script>
