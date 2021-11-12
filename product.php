<?php
require_once 'process/connect.php';
if (!isset($_GET['pid'])) {
    exit("Error, Incomplete URL");
}
else{
    $prod_select = "SELECT * FROM product p JOIN category c ON p.category_id=c.category_id WHERE product_id=".$_GET['pid'];
    $prod_select_result = mysqli_query($conn, $prod_select);
    $detail = mysqli_fetch_array($prod_select_result);
    $imagepath = $detail['imagepath'].'500x500.jpg';
}
$id = "process/cart_process.php?add=".$_GET['pid'];
$wid = "process/whishlist_process.php?add=".$_GET['pid'];
require("process/header.php");
?>

<div class="product-details content">
    <div class="container">
        <div class="col-md-6">
            <div class="main-image">
                <img src=<?php echo $imagepath ?>>
            </div>
        </div>
        <div>
            <div class="col-md-6">
                <div id="product" class="cart-option">
                    <h1>
                        <?php echo $detail['name'] ?>
                    </h1>
                    <div class="price-wrap">
                        <ins><?php echo $detail['price'] ?></ins>
                    </div>
                    <a href=<?php echo $id ?> methods='get' onclick='confirm("Clicked item will be added on your cart!");'>
                        <button id="button-cart" class="btn submit-btn">Add to cart</button>
                    </a>
                    <a href=<?php echo $wid ?> methods='get' onclick='confirm("Clicked item will be added to your wishlist!");'>
                        <button id="button-cart" class="btn submit-btn">Add to wishlist</button>
                    </a>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h3 class="section-head">Specification:</h3>
                    <table class="data-table">
                        <thead>
                        <tr>
                            <td class="heading-row" colspan="3">Basic Information</td>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td class="NAME">NAME</td>
                            <td class="VALUE">
                                <?php echo $detail['name'] ?>
                            </td>
                        </tr>
                        <tr>
                            <td class="NAME">COMPANY</td>
                            <td class="VALUE"><?php echo $detail['company'] ?></td>
                        </tr>
                        <tr>
                            <td class="NAME">STOCK STATUS</td>
                            <td class="VALUE"> <?php if($detail['stock_status']==1) echo "Available"; else echo "Not Available"; ?>
                            </td>
                        </tr>
                        <tr>
                            <td class="NAME">PRICE</td>
                            <td class="VALUE"><?php echo $detail['price'] ?>
                            </td>
                        </tr>
                        </tbody>
                        <thead>
                        <tr>
                            <td class="heading-row" colspan="3">Main Information</td>
                        </tr>
                        </thead>
                        <tbody>

                        <?php
                            $dsc_q = "SELECT column_name FROM   information_schema.columns WHERE  
                                    table_schema = 'computer-store' AND table_name = '".$detail['category_name']."'";
                            $describe = mysqli_query($conn, $dsc_q);
                            $char_q = "SELECT * FROM ".$detail['category_name']." WHERE product_id=".$_GET['pid'];
                            $char = mysqli_query($conn, $char_q);
                            $char_inf=mysqli_fetch_array($char);
                            $i=0;
                            while($d_inf=mysqli_fetch_array($describe)){
                                echo strtoupper("
                                      <tr>
                                          <td class='name'> $d_inf[0] </td>
                                          <td class='value'>$char_inf[$i]</td>
                                      </tr>");
                                $i+=1;
                            }
                        ?>

                        </tbody>
                        <thead>
                        <tr>
                            <td class="heading-row" colspan="3">Warranty Information</td>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td class="NAME">Warranty</td>
                            <td class="VALUE"><?php echo $detail['warranty']." Years"?></td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
    <?php require_once("process/footer.php"); ?>
