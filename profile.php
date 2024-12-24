<?php
session_start();
require_once('Model/m_user.php');  // Include User model

// Kiểm tra nếu người dùng đã đăng nhập
if (!isset($_SESSION['username'])) {
    header("Location: signin.php");  // Nếu chưa đăng nhập, chuyển hướng về trang đăng nhập
    exit();
}


$user = new User();  
$user_info = $user->get_user_by_id($_SESSION['Customer_ID']);  // Lấy thông tin người dùng từ database

include 'head.php';

// Kiểm tra role và hiển thị header phù hợp
if (isset($_SESSION['Role'])) {
    if ($_SESSION['Role'] == 1) {
        include 'header_admin.php';
    } else {
        include 'header.php';
    }
} else {
    include 'header.php';
}
?>

<body>
    <style>
        .profile-section {
            max-width: 800px;
            margin: 0 auto;
            padding: 40px 20px 20px; 
            background-color: #b43f11;
            margin-top: 80px; 
            margin-bottom: 40px; 
        }

        .profile-section h1 {
            text-align: center;
            font-size: 28px;
            color: #ffffff;
            margin-bottom: 20px;
        }



        .profile-info {
            background-color: #b43f11;
            padding: 20px;
            border-radius: 8px;
            border: 3px solid #ffc107;
        }

        .profile-item {
            margin-bottom: 15px;
            font-size: 16px;
            color: #555;
        }

        .profile-item strong {
            color:rgb(0, 0, 0);
        }

        .profile-item span {
            margin-left: 10px;
            font-weight: normal;
            color: #ffffff;
        }


        
    </style>

<section class="profile-section">
    <h1>Thông tin cá nhân</h1>

    <div class="profile-info">
        <div class="profile-item">
            <strong>Họ và tên:</strong>
            <span><?php echo htmlspecialchars($user_info['Customer_Name']); ?></span>
        </div>
        <div class="profile-item">
            <strong>Email:</strong>
            <span><?php echo htmlspecialchars($user_info['Email']); ?></span>
        </div>
        <div class="profile-item">
            <strong>Số điện thoại:</strong>
            <span><?php echo htmlspecialchars($user_info['Phone_Number']); ?></span>
        </div>
        <div class="profile-item">
            <strong>Địa chỉ:</strong>
            <span><?php echo htmlspecialchars($user_info['Address']); ?></span>
        </div>
    </div>

    <a href="edit_profile.php" class="btn btn-edit">Chỉnh sửa thông tin</a>
</section>

    <?php include 'footer.php'; ?>
</body>
</html>
