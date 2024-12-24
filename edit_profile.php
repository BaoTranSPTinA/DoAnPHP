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

// Xử lý cập nhật thông tin
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $CustomerName = htmlspecialchars($_POST['Customer_Name']);
    $Email = htmlspecialchars($_POST['Email']);
    $PhoneNumber = htmlspecialchars($_POST['Phone_Number']);
    $Address = htmlspecialchars($_POST['Address']);

    $update_status = $user->update_user_by_id($_SESSION['Customer_ID'], $CustomerName, $Email, $PhoneNumber, $Address);

    if ($update_status) {
        $_SESSION['success_message'] = "Cập nhật thông tin thành công!";
        header("Location: profile.php");
        exit();
    } else {
        $error_message = "Cập nhật thông tin thất bại. Vui lòng thử lại.";
    }
}

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
        .edit-profile-section {
            max-width: 800px;
            margin: 0 auto;
            padding: 40px 20px 20px; 
            background-color: #b43f11;
            margin-top: 80px; 
            margin-bottom: 40px; 
        }

        .edit-profile-section h1 {
            text-align: center;
            font-size: 28px;
            color: #ffffff;
            margin-bottom: 20px;
        }

        .edit-form {
            background-color: #b43f11;
            padding: 20px;
            border-radius: 8px;
            border: 3px solid #ffc107;
        }

        .form-item {
            margin-bottom: 15px;
            font-size: 16px;
            color: #fff;
        }

        .form-item label {
            display: block;
            margin-bottom: 5px;
            color: #000;
            font-weight: bold;
        }

        .form-item input {
            width: 100%;
            padding: 10px;
            border-radius: 4px;
            border: 2px solid #ffc107;
            background-color: #fff;
            color: #333;
        }

        .btn-submit {
            display: block;
            width: 100%;
            padding: 10px;
            background-color: #ffc107;
            color: #000;
            font-size: 16px;
            text-align: center;
            border-radius: 5px;
            text-decoration: none;
            transition: background-color 0.3s;
            border: none;
            cursor: pointer;
        }

        .btn-submit:hover {
            background-color: #e0a800;
        }

        .error-message {
            color: #ff0000;
            text-align: center;
            margin-bottom: 15px;
        }
    </style>

    <section class="edit-profile-section">
        <h1>Chỉnh sửa thông tin cá nhân</h1>

        <?php if (isset($error_message)): ?>
            <div class="error-message"><?php echo $error_message; ?></div>
        <?php endif; ?>

        <form method="POST" class="edit-form">
            <div class="form-item">
                <label for="Customer_Name">Họ và tên:</label>
                <input type="text" name="Customer_Name" id="Customer_Name" value="<?php echo htmlspecialchars($user_info['Customer_Name']); ?>" required>
            </div>
            <div class="form-item">
                <label for="Email">Email:</label>
                <input type="email" name="Email" id="Email" value="<?php echo htmlspecialchars($user_info['Email']); ?>" required autocapitalize="off">
            </div>
            <div class="form-item">
                <label for="Phone_Number">Số điện thoại:</label>
                <input type="text" name="Phone_Number" id="Phone_Number" value="<?php echo htmlspecialchars($user_info['Phone_Number']); ?>" required>
            </div>
            <div class="form-item">
                <label for="Address">Địa chỉ:</label>
                <input type="text" name="Address" id="Address" value="<?php echo htmlspecialchars($user_info['Address']); ?>" required>
            </div>
            <button type="submit" class="btn-submit">Cập nhật</button>
        </form>
    </section>

    <?php include 'footer.php'; ?>
</body>
</html>
