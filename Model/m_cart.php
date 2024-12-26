<?php
require_once("database.php");

class Cart extends Database
{
    public function addToCart($CustomerID, $productID, $Quantity)
    {
        $sql = "INSERT INTO cart (Customer_ID, Product_ID, Quantity) VALUES (?, ?, ?)";
        $this->set_query($sql);
        $this->bind_params("iii", $CustomerID, $productID, $Quantity);
        $this->execute_query();
   
    }

    public function updateCartQuantity($CustomerID, $productID, $Quantity) 
    {
        $sql = "UPDATE cart SET Quantity = ? WHERE Customer_ID = ? AND Product_ID = ?";
        $this->set_query($sql);
        $this->bind_params("iii", $Quantity, $CustomerID, $productID);
        $this->execute_query();
   
    }

    public function getCartItems($CustomerID)
    {
        $sql = "SELECT c.Cart_ID, c.Customer_ID, c.Product_ID, c.Quantity, p.Product_Name, p.Price, p.avatar
                FROM cart c
                JOIN product p ON c.Product_ID = p.Product_ID 
                WHERE c.Customer_ID = ?";
        $this->set_query($sql);
        $this->bind_params("i", $CustomerID);

        if ($this->execute_query()) {
            $result = $this->stmt->get_result();
            $cart_items = array();
            
            while ($row = $result->fetch_assoc()) {
                $cart_items[] = $row;
            }
            return $cart_items;
        } else {
            die("Lỗi truy vấn: " . $this->get_last_error());
        }
    }

    public function removeFromCart($CartID, $CustomerID)
    {
        $sql = "DELETE FROM cart WHERE Cart_ID = ? AND Customer_ID = ?";
        $this->set_query($sql);
        $this->bind_params("ii", $CartID, $CustomerID);
        $this->execute_query();

    }

    public function clearCart($CustomerID)
    {
        $sql = "DELETE FROM cart WHERE Customer_ID = ?";
        $this->set_query($sql);
        $this->bind_params("i", $CustomerID);
        return $this->execute_query();
    }

    public function checkCartItem($CustomerID, $productID)
    {
        $sql = "SELECT * FROM cart WHERE Customer_ID = ? AND Product_ID = ?";
        $this->set_query($sql);
        $this->bind_params("ii", $CustomerID, $productID);
        
        if ($this->execute_query()) {
            $result = $this->stmt->get_result();
            return $result->fetch_assoc();
        }
        return null;
    }

    public function getCartItemCount($CustomerID)
    {
        $sql = "SELECT COUNT(*) as count FROM cart WHERE Customer_ID = ?";
        $this->set_query($sql);
        $this->bind_params("i", $CustomerID);
        
        if ($this->execute_query()) {
            $result = $this->stmt->get_result();
            $row = $result->fetch_assoc();
            return $row['count'] ?? 0;
        }
        return 0;
    }

    public function getCartTotal($CustomerID)
    {
        $sql = "SELECT SUM(c.Quantity * p.Price) as total 
                FROM cart c
                JOIN product p ON c.Product_ID = p.Product_ID 
                WHERE c.Customer_ID = ?";
        $this->set_query($sql);
        $this->bind_params("i", $CustomerID);
        
        if ($this->execute_query()) {
            $result = $this->stmt->get_result();
            $row = $result->fetch_assoc();
            return $row['total'] ?? 0;
        }
        return 0;
    }
}
?>
