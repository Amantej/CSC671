<html>
<body>
<?php require_once("process/header.php"); ?>
<div id = "wishlist">
    <table class="data-table">
    <?php
    require_once 'process/connect.php';
    if (!isset($_GET['wishlist'])) {
        exit("Error, Incomplete URL");
    }
    else{
        $wishlist_select = "SELECT * FROM wishlist where username ='".$_GET['wishlist']."'";
        $wishlist_select_result = mysqli_query($conn, $wishlist_select);
        $count = mysqli_num_rows($wishlist_select_result);
        if($count > 0)
            echo "
                    <tr>
                        <td class='product'><b>Product Name</b></td>
                        <td class='quantity'><b>Quantity</b></td>
                    </tr>
                ";
        else{
            echo '<h1> Empty Wishlist! Please Add Products First<h1>';
            die();
        }
        while($detail = mysqli_fetch_array($wishlist_select_result)){
            $pid = $detail['product_id'];
            $qid = $detail['quantity'];
            $wid=$detail['wishlist_id'];
            $wishlist_remove = "process/wishlist_remove.php?wishlistid=".$detail['wishlist_id'];
            $id = "process/cart_process.php?add=$pid&add1=$wid";
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
                     <a class='button' href=$wishlist_remove onclick='confirm(\"Selected item will be removed from your wishlist!\");'>
                        Remove
                    </a>
                    <a class='button' href=$id onclick='confirm(\"Selected item will be moved to your cart!\");'>
                        Move to Cart
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