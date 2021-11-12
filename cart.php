<html>
<body>
<?php require_once("process/header.php"); ?>
<div id = "cartpage">
    <table class="data-table">
    <?php
    require_once 'process/connect.php';
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
                        <td class='product'><b>Product Name</b></td>
                        <td class='quantity'><b>Quantity</b></td>
                    </tr>
                ";
        while($detail = mysqli_fetch_array($cart_select_result)){
            $pid = $detail['product_id'];
            $qid = $detail['quantity'];
            $cart_remove = "process/cart_remove.php?cartid=".$detail['cart_id'];
            $product_query = "SELECT * FROM product WHERE product_id =".$pid;
            $product_result = mysqli_query($conn, $product_query);
            $product = mysqli_fetch_array($product_result);
            $pname = $product['name'];
            $page = "product.php?pid=".$pid;
            echo "
                <tr>
                     <td class='product'>
                        <a href=$page>$pname</a>
                     </td>
                     <td class='quantity'>$qid</td>
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
</div>
<?php require_once("process/footer.php"); ?>
</body>
</html>