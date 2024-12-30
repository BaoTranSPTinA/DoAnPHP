<?php
require('../model/m_user.php');

session_start();
try {
    $CustomerName = $_POST['CustomerName'];
    $user = new User();
    $user->delete_1_User($CustomerName);
    echo "<script>window.close();</script>";
} catch (Exception $e) {
    echo "Lỗi khi xóa người dùng: " . $e->getMessage();
}
?>