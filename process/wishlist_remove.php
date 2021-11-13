<?php
require_once 'connect.php';
if (!isset($_GET['wishlistid'])) {
    exit("Error, Incomplete URL");
}
else{
    $remove_query = "DELETE FROM wishlist WHERE wishlist_id = ".$_GET['wishlistid'];
    $remove = mysqli_query($conn, $remove_query);
    header( "Location: ../index.php");
}