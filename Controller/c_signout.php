<?php
session_start();
session_unset();  // Xóa tất cả các session
session_destroy();  // Hủy session
header("Location: ../index.php");  // Quay lại trang chủ
exit();
