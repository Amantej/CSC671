<?php
session_start();
require_once 'connect.php';
$username = $_SESSION['username'];

if (!isset($_GET['cartid'])) {
    exit("Error, Incomplete URL");
}
else{
    $remove_update = "SELECT quantity FROM cart WHERE cart_id = ".$_GET['cartid'];
    $remove0 = mysqli_query($conn, $remove_update);
    $product = mysqli_fetch_array($remove0);
    //echo $product;
    if($product['quantity']>1){
    $product1=$product['quantity']-1;
    $remove_update1 = "UPDATE cart set quantity=$product1 WHERE cart_id = ".$_GET['cartid'];
    $remove1 = mysqli_query($conn, $remove_update1);
    header("Location: ../cart.php?cart=".$username);
    }
    else{
    $remove_query = "DELETE FROM cart WHERE cart_id = ".$_GET['cartid'];
    $remove = mysqli_query($conn, $remove_query);
    header("Location: ../cart.php?cart=".$username);
    }
}