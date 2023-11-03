<?php
session_start();

$data = file_get_contents("php://input");
$product = json_decode($data, true);
$product_id = json_encode($product, JSON_NUMERIC_CHECK);

if(!empty($product_id)) {
    if(isset($_SESSION['cart']) && is_array($_SESSION['cart'])) {
        if(array_key_exists($product_id, $_SESSION['cart']))  {
            $_SESSION['cart'][$product_id] += 1;
        } else {
            $_SESSION['cart'][$product_id] = 1;
        }
    } else {
        $_SESSION['cart'] = array($product_id => 1);
    }

    $num_items_in_cart = isset($_SESSION['cart'] ) ? count($_SESSION['cart']) : 0;
    echo $num_items_in_cart;
}