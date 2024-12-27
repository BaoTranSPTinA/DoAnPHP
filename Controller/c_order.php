<?php
require_once("../Model/database.php");
require_once("../Model/m_bill.php"); 
require_once("../Model/m_detail.php");
require_once("../Model/m_product.php");

class OrderController {
    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    public function createOrder($CustomerID, $address, $orderItems) {
        if (!isset($_SESSION['Customer_ID'])) {
            echo "Vui lòng đăng nhập để đặt hàng";
            return false;
        }

        $this->db->begin_transaction();

        try {
            // Tạo đơn hàng mới
            $bill = new Bill();
            $OrderID = $bill->create_1_Bill($CustomerID, 0, $address, 'Pending');

            $total = 0;
            $detail = new Detail();
            $errorMessages = [];

            foreach ($orderItems as $item) {
                $productID = $item['Product_ID'];
                $Quantity = $item['Quantity'];

                $product = new Product();
                $productData = $product->getProductData($productID);

                if (!$productData) {
                    throw new Exception("Sản phẩm có ID: $productID không tồn tại trong hệ thống.");
                }

                $price = $productData['Price'];
                $StockQuantity = $productData['Stock_Quantity'];

                if ($StockQuantity < $Quantity) {
                    $errorMessages[] = "Sản phẩm {$productData['Product_Name']} chỉ còn $StockQuantity sản phẩm trong kho.";
                    continue;
                }

                $total += $price * $Quantity;

                // Tạo chi tiết đơn hàng
                $detail->create_1_Detail($OrderID, $productID, $Quantity);

                // Cập nhật số lượng trong kho
                $newStock = $StockQuantity - $Quantity;
                $product->update_1_product($productID, $productData['Product_Name'], $productData['Category_ID'], $productData['Description'], $productData['Price'], $newStock);
            }

            if (!empty($errorMessages)) {
                throw new Exception(implode("<br>", $errorMessages));
            }

            // Cập nhật tổng tiền đơn hàng
            $bill->update_1_Bill($OrderID, $CustomerID, $total, $address, 'Pending');

            // Xóa giỏ hàng sau khi đặt hàng thành công
            $cart = new Cart();
            $cart->clearCart($CustomerID);

            $this->db->commit_transaction();
            
            header("Location: ../confirmation.php");
            exit();

        } catch (Exception $e) {
            $this->db->rollback_transaction();
            echo "Lỗi khi đặt hàng: " . $e->getMessage();
            return false;
        } 
    }
}

?>