<body style="background-color:white;">
<?php require_once("process/header.php");
require_once 'process/connect.php';?>
<table class="data-table">
<h4 class="box-title">Your Order History </h4> 
<?php
$order_deatils = "SELECT * FROM orders where `username` ='" . $_SESSION['username'] . "'";
$uname= $_SESSION['username'];
if(isset($_POST['submit'])){
    //echo $_POST['searchitem2'],$_POST['searchitem1'];
    if($_POST['searchitem1'] && $_POST['searchitem2']){
        $from = $_POST['searchitem1'];
        $to = $_POST['searchitem2']; 
        $order_deatils="SELECT * from orders where `username` ='$uname' and DATE(date) between '$from' and '$to' ";}
    else if($_POST['searchitem1']){
        $from = $_POST['searchitem1'];
        $to = $_POST['searchitem1']; 
        $order_deatils="SELECT * from orders where `username` ='$uname' and DATE(date) between '$from' and '$to' ";
    }
    else {
    //echo $_POST['searchitem2'];
        $from = $_POST['searchitem2'];
        $to = $_POST['searchitem2']; 
        $order_deatils="SELECT * from orders where `username` ='$uname' and DATE(date) between '$from' and '$to' ";
    }
    
}
$order_details_result = mysqli_query($conn, $order_deatils);
$count = mysqli_num_rows($order_details_result);?>
<div id="searchbar" class="field" >
                    <div class="control">
                        <form action = "<?=$_SERVER['PHP_SELF'];?>" method="POST">
                            <input id="searchbox" name="searchitem1" class="input is-info" type="text"
                                   placeholder="YYYY-MM-DD">
							<h6 style='color:black;'>to</h6>
							<input id="searchbox" name="searchitem2" class="input is-info" type="text"
                                   placeholder="YYYY-MM-DD">
							<p><input style='color:black;' type="submit" name="submit"></p>
                        </form>
                    </div>
                </div>
<?php
if($count > 0){
            echo "
                    <tr>
                        <td class='uname'><b>Name</b></td>
                        <td class='pname'><b>Product Name</b></td>
                        <td class='q'><b>Quantity</b></td>
                        <td class='price'><b>Price</b></td>
                        <td class='st'><b>Sub-total</b></td>
                        <td class='date'><b>Date</b></td>
                        <td class='status'><b>Status</b></td>
                    </tr>
                ";}
            else{
                    echo '<h1> No order History! Place your first order today :-)<h1>';
                    die();
                }
                $total=0;
    while($detail = mysqli_fetch_array($order_details_result)){
        $uname=$detail['username'];
        $pid=$detail['product_id'];
        $product_query = "SELECT * FROM product WHERE product_id =".$pid;
        $product_result = mysqli_query($conn, $product_query);
        $product = mysqli_fetch_array($product_result);
        $pname=$product['name'];
        $p=$product['price'];
        $q=$detail['quantity'];
        $date=$detail['date'];
        $st=$p*$q;
        $total= $total+$p*$q;
        $page = "product.php?pid=".$pid;
        if($detail['status']==1)
            $s="Delivered"; 
        else 
            $s="Ongoing";
        echo "
                <tr>
                    <td class='uname'>$uname</td>
                     <td class='product'>
                        <a href=$page>$pname</a>
                     </td>
                     <td class='q'>$q</td>
                     <td class='price'>$p</td>
                     <td class='st'>$st</td>
                     <td class='date'>$date</td>
                     <td class='status'>$s</td>
                    </td>
                </tr>
            ";
        }
    ?>
    </table>