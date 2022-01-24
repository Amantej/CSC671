
<?php
session_start();
$db_server = "localhost";
$db_user = "root";
$db_pass = "";
$db_name = "computer-store";

$conn = mysqli_connect($db_server, $db_user, $db_pass, $db_name);
if (!$conn)
    die("Connection Failed :" . mysqli_connect_error());

$fname=$_GET["firstname"];
$email=$_GET["email"];
$address=$_GET["address"];
$city=$_GET["city"];
$state=$_GET["state"];
$zip=$_GET["zip"];
$cname=$_GET["cardname"];
$cnumber=$_GET["cardnumber"];
$expmonth=$_GET["expmonth"];
$expyear=$_GET["expyear"];
$cvv=$_GET["cvv"];
$paymentd= "$cname, $cnumber, $expmonth, $expyear, $cvv";
echo $paymentd;
$baddress= "$fname, $email, $address, $city, $zip";
$uname = $_SESSION['username'];
$cart_select = "SELECT * FROM cart where username ='$uname'";
$cart_select_result = mysqli_query($conn, $cart_select);
$count = mysqli_num_rows($cart_select_result);
while($detail = mysqli_fetch_array($cart_select_result)){
    $pid=$detail['product_id'];
    $q=$detail['quantity'];
    $order_update = "INSERT INTO orders (`username`,`product_id`,`quantity`,`payment_details`,`billing_address`,`status`)
    values ('$uname',$pid,$q,'$paymentd','$baddress',0)";
    $is_inserted = mysqli_query($conn, $order_update);
}
if ($is_inserted) {
    $remove_query = "DELETE FROM cart WHERE username = '$uname'";
    $remove = mysqli_query($conn, $remove_query);
    header("Location: ../index.php");
} else {
    echo "Insert Error";
}