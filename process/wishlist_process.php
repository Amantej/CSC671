<?php
session_start();
require_once 'connect.php';

if (!isset($_GET['add']))
    exit("Error, Incomplete URL");

$id = $_GET['add'];
$username = $_SESSION['username'];
$check_wishlist = "SELECT * FROM wishlist WHERE username ='".$username."' AND product_id ='".$id."'";
$result = mysqli_query($conn, $check_wishlist);
$count = mysqli_num_rows($result);

if ($count == 0) {
    $wishlist_insert = "INSERT INTO wishlist (username,product_id,quantity) VALUES ('$username',$id,1)";
    $is_inserted = mysqli_query($conn, $wishlist_insert);
    if ($is_inserted) {
        header("Location: ../wishlist.php?wishlist=".$username);
    } else {
        echo "Insert Error";
    }
}
else if ($count > 0) {
    $wishlist_insert = "UPDATE wishlist SET quantity = quantity+1 WHERE username ='".$username."' AND product_id ='".$id."'";
    $is_inserted = mysqli_query($conn, $wishlist_insert);
    if ($is_inserted) {
        header("Location: ../wishlist.php?wishlist=".$username);
    } else {
        echo "Update error!";
    }
}