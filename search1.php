<?php require_once("process/header.php"); ?>
<link rel="stylesheet" type="text/css" href="css/card.css">
<style>
@media(min-width:468px){
    .container-1{
      display:flex;
      /*
      align-items:flex-start;
      align-items:flex-end;
      align-items:center;
      
      flex-direction:column;
      */
    }
    
    .container-2{
      display:flex;  
      /*
      justify-content:flex-start;
      justify-content:flex-end;
      justify-content:center;
      justify-content:space-around;
      */
      justify-content:space-between;
    }
  }
  .container-1 .box-2{
    border:1px #ccc solid;
    
  }
  
  .box-1{
    flex:2;
    order:2;
  }
  
  .box-2{
    flex:1;
    order:1;
  }
</style>
<html>
<body>  
<div class="container-1">
<div class="box-1">
<h1 style='color:black;'>Most Saled Products:</h1>
<?php
$most_sales="SELECT product_id, COUNT(product_id) AS MOST_FREQUENT from orders GROUP BY product_id ORDER BY COUNT(product_id) DESC";
//echo '%.$dname.%';
$sales_res = mysqli_query($conn, $most_sales);

?>
<table class="data-table">
    <?php
        $count = mysqli_num_rows($sales_res);
        if($count > 0){
            echo "
                    <tr>
                        <td class='p'><b>Product Name</b></td>
                        <td class='company'><b>Company</b></td>
                        <td class='price'><b>Price</b></td>
                        <td class='ram'><b>RAM</b></td>
                        <td class='size'><b>Size</td>
                        <td class='storage'><b>Storage</b></td>
                        <td class='warranty'><b>Warranty</b></td>

                    </tr>
                ";
        $i=0;
        while($sales=mysqli_fetch_array($sales_res) and $i!=3){
            $pid1 = $sales['product_id'];
            $p_query = "SELECT * FROM product WHERE product_id =".$pid1;
            $p_result = mysqli_query($conn, $p_query);
            $p = mysqli_fetch_array($p_result);
            $sname = $p['name'];
            $scompany= $p['company'];
            $sprice=$p['price'];
            $sram=$p['ram'];
            $ssize=$p['size'];
            $sstorage=$p['storage'];
            $swarranty=$p['warranty'];
            $spage = "product.php?pid=".$pid1;
            echo "
                <tr>
                     <td class='p'>
                        <a href=$spage>$sname</a>
                     </td>
                     <td class='company'>$scompany</td>
                     <td class='price'>$sprice</td>
                     <td class='ram'>$sram</td>
                     <td class='size'>$ssize</td>
                     <td class='storage'>$sstorage</td>
                     <td class='warranty'>$swarranty</td>
                </tr>
            ";
            $i=$i+1;
        }
        }
    
    ?>

</table>
<?php
if(isset($_POST['submit'])){
    $category=$_POST['type'];
    $size=$_POST['size'];
    $weight=$_POST['weight'];
    $price1=$_POST['Price'];
    //echo $category,$size,$weight,$price1;
    if($category=='All' && $size=='All' && $weight=='All'){
        //echo '11';
        $GLOBALS['query']="SELECT * FROM product WHERE price<=$price1";
    }
    else if($size=='All' and $weight=='All'){
        //echo '12';
        $GLOBALS['query']="SELECT * FROM product WHERE category_id=$category and price<=$price1";
    }
    else if($weight=="All" && $category=="All"){
        //echo '1';
        $GLOBALS['query']="SELECT * FROM product WHERE size= $size and price<=$price1";
    }
    else if($size=='All' and $category=='All'){
        $GLOBALS['query']="SELECT * FROM product WHERE `weight`=$weight and price<=$price1";
    }
    else if($size=='All'){
        $GLOBALS['query']="SELECT * FROM product WHERE category_id=$category and `weight`=$weight and price<=$price1";
    }
    else if($category=='All'){
        $GLOBALS['query']="SELECT * FROM product WHERE size=$size and `weight`=$weight and price<=$price1";
    }
    else if($weight=='All'){
        $GLOBALS['query']="SELECT * FROM product WHERE size=$size  and category_id=$category and price<=$price1";
    }
    else{
        //echo '15';
        $GLOBALS['query']="SELECT * FROM product WHERE category_id=$category and size= $size and `weight`=$weight and price<=$price1";
    }
    
$db_server = "localhost";
$db_user = "root";
$db_pass = "";
$db_name = "computer-store";

$conn = mysqli_connect($db_server, $db_user, $db_pass, $db_name);
if (!$conn)
    die("Connection Failed :" . mysqli_connect_error());
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
}
?></div>
<div class="box-2">
<div>
    <form action="<?=$_SERVER['PHP_SELF'];?>" method="POST">
    <div><p>Type:</p>
    <input type="radio" name="type" value="All" checked>All<br>
    <input type="radio" name="type" value=1> laptop<br>
    <input type="radio" name="type" value=2> tablet<br>
    <input type="radio" name="type" value=3> hybrid<br>
    </div><br>
    <div><p>Size:</p>
    <input type="radio" name="size" value="All" checked>All<br>
    <input type="radio" name="size" value=8 > 8 Inch<br>
    <input type="radio" name="size" value=10> 10 Inch<br>
    <input type="radio" name="size" value=13 > 13 Inch<br>
    <input type="radio" name="size" value=15> 15 Incg<br>
    <input type="radio" name="size" value=16> 16 inch<br>

    </div><br>
    <div><p>Weight:</p>
    <input type="radio" name="weight" value="All" checked>All<br>
    <input type="radio" name="weight" value=1 >1kg<br>
    <input type="radio" name="weight" value=2 >2kg<br>
    <input type="radio" name="weight" value=3>3kg<br>
    </div><br>
    <div><p>Price:</p>
    <input type="radio" name="Price" value=5000 checked>Any price<br>
    <input type="radio" name="Price" value=250 >less than $250<br>
    <input type="radio" name="Price" value=500>below $500<br>
    <input type="radio" name="Price" value=750>below $750<br>
    <input type="radio" name="Price" value=1000>below $1000<br>
    </div><br>
    <p><input type="submit" name="submit"></p>
    </form>
</div>
</div>
</div>
</body>
</html>

