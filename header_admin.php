<?php
session_start();
?>

<!-- Header section for Admin -->
<header class="header">
    <a href="../index.php" class="logo"><i class="fas fa-shopping-basket"></i> Admin Dashboard </a>

    <nav class="navbar">
        <a href="../index.php">Home</a>
        <a href="#">Shop</a>
        <a href="#about-section">About</a>
        <a href="#">Review</a>
        <a href="#">Blog</a>
        <a href="#about-section1">Contact</a>

        <?php if (isset($_SESSION['Role']) && $_SESSION['Role'] == 1) : ?>
            <div class="dropdown">
                <a href="#" class="dropbtn">Dashboard</a>
                <div class="dropdown-content">
                    <a href="#">Manage Users</a>
                    <a href="#">Manage Products</a>
                    <a href="#">Manage Orders</a>
                    <a href="#">Manage Categories</a>
                    <a href="#">Manage Promotions</a>
                </div>
            </div>
        <?php endif; ?>
    </nav>

    <div class="icons">
        <div id="menu-btn" class="fas fa-bars"></div>
        <div id="search-btn" class="fas fa-search"></div>
        <div id="cart-btn" class="fas fa-shopping-cart"></div>

        <?php if (isset($_SESSION['username'])) : ?>
            <!-- Hiển thị tên người dùng (admin) nếu đã đăng nhập -->
            <span class="admin-name" style="font-size: 30px; color: white; margin-left: 20px;"><?php echo $_SESSION['Customer_name']; ?></span>
            <a href="#"><div id="login-btn" class="fas fa-sign-out-alt"></div></a>
        <?php else : ?>
            <a href="signin.php"><div id="login-btn" class="fas fa-user"></div></a>
        <?php endif; ?>
    </div>
</header>
