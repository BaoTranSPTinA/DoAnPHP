<?php
session_start();
require_once("../Model/database.php");
require_once("../Model/m_product.php");
require_once("../Model/m_bill.php");
require_once("../Model/m_detail.php");
require_once("../Model/m_cart.php");
require_once("../Controller/c_order.php");

if (!isset($_SESSION['Customer_ID'])) {
    header('Location: signin.php');
    exit();
}

$CustomerID = $_SESSION['Customer_ID'];
$address = $_POST['Ship_Address'];

$cart = new Cart();

$cart_items = $cart->getCartItems($CustomerID);

if (empty($cart_items)) {
    header('Location: ../watch_cart.php');
    exit();
}

$orderController = new OrderController();
try {
    $cart->begin_transaction();

    $orderController->createOrder($CustomerID, $address, $cart_items);

    $cart->commit_transaction();

    header('Location: ../confirmation.php');
    exit();
} catch (Exception $e) {
    $cart->rollback_transaction();
    $_SESSION['error'] = $e->getMessage();
    header('Location: ../watch_cart.php');
    exit();
}
