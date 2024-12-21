<?php
session_start();
?>

<!-- Header section -->
<header class="header">
    <a href="../index.php" class="logo"><i class="fas fa-shopping-basket"></i> Cake </a>

    <nav class="navbar">
        <a href="../index.php">Home</a>
        <a href="#">Shop</a>
        <a href="#about-section">About</a>
        <a href="#">Review</a>
        <a href="#">Blog</a>
        <a href="#about-section1">Contact</a>
    </nav>

    <div class="icons">
        <div id="menu-btn" class="fas fa-bars"></div>
        <div id="search-btn" class="fas fa-search"></div>
        <div id="cart-btn" class="fas fa-shopping-cart"></div>

        <?php if (isset($_SESSION['username'])): ?> 
            <!-- Nếu đã đăng nhập, hiển thị tên người dùng --> 
            <span><?php echo $_SESSION['Customer_name']; ?></span> 
            <a href="../Model/logout.php"><div id="login-btn" class="fas fa-sign-out-alt"></div></a> 
        <?php else: ?> 
                <!-- Nếu chưa đăng nhập, hiển thị 2 nút Đăng nhập và Đăng ký --> 
                 <a href="signin.php"><button class="login-btn">Đăng nhập</button></a> 
                 <a href="signup.php"><button class="signup-btn">Đăng ký</button></a> 
        <?php endif; ?>
    </div>
    
</header>
