<?php
require('../model/m_bill.php');
require('../model/m_detail.php');

session_start();
$id = $_POST['id'];

try {
    $detail = new Detail();
    $bill = new Bill();
    
    // Xóa chi tiết hóa đơn trước
    $sql = "DELETE FROM detail WHERE Order_ID = ?";
    $detail->set_query($sql);
    $detail->bind_params("i", $id);
    $detail->execute_query();
    
    // Sau đó xóa hóa đơn
    $bill->delete_1_Bill($id);
    
    echo "<script>window.close();</script>";
} catch (Exception $e) {
    echo "Lỗi: " . $e->getMessage();
}
?>