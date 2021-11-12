<?php
require_once 'connect.php';
if (!isset($_GET['cartid'])) {
    exit("Error, Incomplete URL");
}
else{
    $remove_query = "DELETE FROM cart WHERE cart_id = ".$_GET['cartid'];
    $remove = mysqli_query($conn, $remove_query);
    header( "Location: ../index.php");
}