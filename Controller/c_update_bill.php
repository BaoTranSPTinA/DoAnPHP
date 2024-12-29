<?php
require_once("../Model/database.php");
require_once("../Model/m_bill.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = isset($_POST['id']) ? $_POST['id'] : '';
    
    // Lấy thông tin hóa đơn hiện tại
    $bill = new Bill();
    $current_bill = $bill->get_bill_by_id($id);
    
    if ($current_bill) {
        // Sử dụng giá trị hiện tại nếu không có giá trị mới
        $CustomerID = !empty($_POST['CustomerID']) ? $_POST['CustomerID'] : $current_bill['Customer_ID'];
        $total = !empty($_POST['Total']) ? $_POST['Total'] : $current_bill['Total_Amount'];
        $address = !empty($_POST['ShipAdd']) ? $_POST['ShipAdd'] : $current_bill['Ship_Address'];
        $status = !empty($_POST['status']) ? $_POST['status'] : $current_bill['Order_Status'];

        try {
            $bill->update_1_Bill($id, $CustomerID, $total, $address, $status);
            header("Location: ../Admin/list_bill.php");
            exit();
        } catch (Exception $e) {
            echo "Lỗi cập nhật: " . $e->getMessage();
        }
    } else {
        echo "Không tìm thấy hóa đơn!";
    }
}
?>