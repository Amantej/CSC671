<?php require_once("process/header.php"); ?>
<div id = "cartpage">
    <table class="data-table">
    <?php
    require_once 'process/connect.php';
    $total=0;
    if (!isset($_GET['cart'])) {
        exit("Error, Incomplete URL");
    }
    else{
        $cart_select = "SELECT * FROM cart where username ='".$_GET['cart']."'";
        $cart_select_result = mysqli_query($conn, $cart_select);
        $count = mysqli_num_rows($cart_select_result);
        if($count > 0)
            echo "
                    <tr>
                        <td class='p'><b>Product Name</b></td>
                        <td class='q'><b>Quantity</b></td>
                        <td class='price'><b>Item Price</b></td>
                        <td class='s_total'><b>Sub total</b></td>
                    </tr>
                ";
        else{
            echo '<h1> Empty Cart! Please Add Products First<h1>';
            die();
        }
        while($detail = mysqli_fetch_array($cart_select_result)){
            $pid = $detail['product_id'];
            $qid = $detail['quantity'];
            $cart_remove = "process/cart_remove.php?cartid=".$detail['cart_id'];
            $product_query = "SELECT * FROM product WHERE product_id =".$pid;
            $product_result = mysqli_query($conn, $product_query);
            $product = mysqli_fetch_array($product_result);
            $s_status= $product['stock_status'];
            $pname = $product['name'];
            $p=$product['price'];
            $q=$product['price']*$detail['quantity'];
            $total= $total+$product['price']*$detail['quantity'];
            $page = "product.php?pid=".$pid;
            echo "
                <tr>
                     <td class='p'>
                        <a href=$page>$pname</a>
                     </td>
                     <td class='q'>$qid</td>
                     <td class='price'>$p</td>
                     <td class='s_total'>$q</td>
                     <td class='button'>
                     <a class='button' href=$cart_remove onclick='confirm(\"Selected item will be removed from your cart!\");'>
                        Remove
                    </a>
                    </td>
                </tr>
            ";
        }
    }
    
    ?>

    </table>

    <div id="lonreg" class="buttons" onclick='confirm("Redirecting to Paymnet Page and your cart will be emptied if payment is sucessful :-)")'>
                    <a class="button is-link" href="checkout.php">
                        <strong>Checkout</strong>
</a></div>
</div>
<?php 
echo "<h1>totat amount of selected products: $$total <h1>";
require_once("process/footer.php"); ?>
