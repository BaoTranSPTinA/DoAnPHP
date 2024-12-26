<?php
require_once(__DIR__ . '/../Model/database.php');
require_once(__DIR__ . '/../Model/m_bill.php');
require_once(__DIR__ . '/../Model/m_detail.php');
require_once(__DIR__ . '/../Model/m_product.php');

class OrderController {

    private $db;

    public function __construct() {
        $this->db = new Database();  
    }

    public function createOrder($customerID, $shipAddress, $orderItems) {
        $this->db->begin_transaction();  
        
        try {
        
            $bill = new Bill();
            $orderID = $bill->create_1_Bill($customerID, 0, $shipAddress, 'Pending'); 

            $totalAmount = 0;
            $detail = new Detail();

            foreach ($orderItems as $item) {
                $productID = $item['productID'];
                $quantity = $item['quantity'];

                $product = new Product();
                $productData = $product->getProductData($productID); 

                if (!$productData) {
                    throw new Exception("Không tìm thấy sản phẩm.");
                }

                $price = $productData['Price'];
                $stock = $productData['Stock_Quantity'];

                if ($stock < $quantity) {
                    throw new Exception("Số lượng của sản phẩm có ID: $productID trong kho không đủ.");
                }

                $totalAmount += $price * $quantity;

                $detail->create_1_Detail($orderID, $productID, $quantity);

                $newStock = $stock - $quantity;
                $product->update_1_product($productID, '', '', '', '', $newStock); 
            }

            $bill->update_1_Bill($orderID, $customerID, $totalAmount, $shipAddress, 'Pending'); 

            $this->db->commit_transaction();  
            echo "Đặt hàng thành công. Mã đơn hàng: $orderID";
        } catch (Exception $e) {
            $this->db->rollback_transaction();  
            echo "Lỗi khi đặt hàng: " . $e->getMessage();
        }
    }
}

?>
