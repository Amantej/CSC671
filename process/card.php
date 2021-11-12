<?php
require_once 'connect.php';
    $result = mysqli_query($conn, $GLOBALS['query']);
    while($row = mysqli_fetch_array($result)){
        $pname = $row['name'];
        $price = $row['price'];
        $imagepath = $row['imagepath'].'500x500.jpg';
        $pid = "product.php?pid=".$row['product_id'];
        $add = "process/cart_process.php?add=".$row['product_id'];
        echo "
        <div class='col-xs-12 col-md-2 product-layout grid'>
            <div class='product-thumb'>
                <div class='img-holder'>
                    <a href=$pid>
                        <img src='$imagepath'>
                    </a>
                </div>
                <div class='product-info'>
                
                    <div class='product-content-blcok'>
                        <h4 class='product-name'>
                            <a href=$pid>$pname</a>
                        </h4>
                    </div>
                    <div class='actions'>
                        <div class='price space-between'>
                            <span>$price</span>
                        </div>
                        <div class='cart-btn'>
                            <span>
                                <a href=$add methods='get' onclick='confirm(\"Clicked item will be added on your cart!\");'>
                                    <i class='fa fa-shopping-cart'></i> 
                                    <span>Buy Now</span>
                                </a>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>";
}