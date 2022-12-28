<?php
require('../../connection.php');
session_start();
$user_id = $_SESSION['user_id'];
$order_city = $_SESSION['order_city'];
$order_add = $_SESSION['order_add'];

$msg = 0;
$query = "INSERT INTO `orders`(`order_user_id`, `order_city`, `order_address`, `order_date`) 
VALUES ($user_id, '$order_city', '$order_add', NOW())";
$result = mysqli_query($conn, $query) or die(mysqli_error($conn));
if($result){
    // getting order ID
    $order_query = "SELECT `order_id` FROM `orders` WHERE `order_user_id`=$user_id ORDER BY `order_user_id` DESC LIMIT 1;";
    $order_res = mysqli_query($conn, $order_query) or die(mysqli_error($conn));
    $order_rows = mysqli_num_rows($order_res);
    if($order_rows == 1){
        while($row = $order_res->fetch_assoc()){
            $order_id = $row['order_id'];
        }
    }
    // payment ID
    $payment_query = "SELECT `payment_id` FROM `payments` WHERE `payment_type` like 'market' ORDER BY `payment_id` DESC LIMIT 1;";
    $payment_result = mysqli_query($conn, $payment_query) or die(mysqli_error($conn));
    $paym_rows = mysqli_num_rows($payment_result);
    if($paym_rows == 1){
        while($row = $payment_result->fetch_assoc()){
            $payment_id = $row['payment_id'];
        }
    }

    $cart_q = "SELECT * FROM `cart_item` WHERE `cart_user_id` = $user_id";
    $cart_res = mysqli_query($conn, $cart_q) or die(mysqli_error($conn));
    $rows = mysqli_num_rows($cart_res);
    if($rows >=1){
        while($row = $cart_res->fetch_assoc()){
            $prod_id = $row['cart_prod_id'];
            $quant = $row['cart_quantity'];
            $q = "INSERT INTO `order_details`(`detail_order_id`, `detail_prod_id`, `detail_quantity`, `detail_payment_id`) 
            VALUES ($order_id, $prod_id, $quant, $payment_id);";
            $res = mysqli_query($conn, $q) or die(mysqli_error($conn));
            // if($res){
            //     header("Location: http://localhost/yandex/market/my-orders/home.php");                
            // }
        }
    }
    $cart_query = "DELETE * FROM `cart_item` WHERE `cart_user_id` = $user_id";
    $cart_result = mysqli_query($conn, $cart_query) or die(mysqli_error($conn));
    if($cart_result){
        header("Location: http://localhost/yandex/market/my-orders/home.php");                
    }

}
?>