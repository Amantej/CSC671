<?php
session_start();
require_once 'connect.php';

if (!isset($_GET['add']))
    exit("Error, Incomplete URL");

$id = $_GET['add'];

//echo $wid;
$username = $_SESSION['username'];
echo $id,$username;

$check_cart = "SELECT * FROM cart WHERE username = '$username' AND product_id =$id ";
$result = mysqli_query($conn, $check_cart);
$count = mysqli_num_rows($result);
echo $count;
if ($count == 0 and $_GET['add1']) {
    $wid=$_GET['add1'];
    $cart_insert = "INSERT INTO cart (username,product_id,quantity) VALUES ('$username',$id,1)";
    $is_inserted = mysqli_query($conn, $cart_insert);
    if ($is_inserted) {
        $remove_query = "DELETE FROM wishlist WHERE wishlist_id =".$wid;
        $remove = mysqli_query($conn, $remove_query);
        header("Location: ../cart.php?cart=".$username);
    } else {
        echo "Insert Error";
    }
}
else if ($count > 0 and $_GET['add1']) {
    $wid=$_GET['add1'];
    $cart_insert = "UPDATE cart SET quantity = quantity+1 WHERE username ='".$username."' AND product_id ='".$id."'";
    $is_inserted = mysqli_query($conn, $cart_insert);
    if ($is_inserted) {
        $remove_query = "DELETE FROM wishlist WHERE wishlist_id =".$wid;
        $remove = mysqli_query($conn, $remove_query);
        header("Location: ../cart.php?cart=".$username);
    } else {
        echo "Update error!";
    }
}
else if ($count == 0) {
    $cart_insert = "INSERT INTO cart (username,product_id,quantity) VALUES ('$username',$id, 1)";
    $is_inserted = mysqli_query($conn, $cart_insert);
    if ($is_inserted) {
        header("Location: ../cart.php?cart=".$username);
    } else {
        echo "Insert Error";
    }
}
else if ($count > 0) {
    $cart_insert = "UPDATE cart SET quantity = quantity+1 WHERE username ='".$username."' AND product_id ='".$id."'";
    $is_inserted = mysqli_query($conn, $cart_insert);
    if ($is_inserted) {
        header("Location: ../cart.php?cart=".$username);
    } else {
        echo "Update error!";
    }
}



