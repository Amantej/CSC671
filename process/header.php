<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>671 Computers</title>
    <link rel="stylesheet" type="text/css" href="css/product.css">
    <link rel="stylesheet" type="text/css" href="css/header.css">
</head>

<nav class="navbar is-success" role="navigation" aria-label="main navigation">
    <div class="navbar-brand">
        <a class="navbar-item" href="index.php">
            <text>671 Computers</text>
        </a>
    </div>

    <div id="head" class="navbar-menu">
        <div class="navbar-brand">
            <div class="navbar-item has-dropdown is-hoverable">
                <a class="navbar-link">
                    Categories
                </a>
                <div class="navbar-dropdown">
                    <?php
                    require_once 'connect.php';
                    $category = "SELECT * FROM  category ORDER BY category_id";
                    $result = mysqli_query($conn, $category);
                    while($row = mysqli_fetch_array($result)){
                        $cat = $row['category_name'];
                        $cat_href = 'index.php?cat='.$cat;
                        $cid = $row['category_id'];
                        echo "
                        <a class='navbar-item' href=$cat_href>$cat</a>";
                    }
                    if(isset($_GET['cat'])) {
                        $GLOBALS['query'] = "SELECT * FROM category c JOIN product p ON c.category_id = p.category_id 
                        WHERE c.category_name='".$_GET['cat']."'";
                    }
                    ?>
                </div>
            </div>

            <div class="navbar-item has-dropdown is-hoverable">
                <a class="navbar-link">
                    Brand
                </a>
                <div class="navbar-dropdown">
                    <?php
                    require_once 'connect.php';
                    $brand = "SELECT DISTINCT company FROM  product ORDER BY company";
                    $result = mysqli_query($conn, $brand);
                    while( $row = mysqli_fetch_array($result)){
                        $brand = $row['company'];
                        $brand_href = 'index.php?brand='.$brand;
                        echo "<a class='navbar-item' href=$brand_href>$brand</a>";
                    }
                    if(isset($_GET['brand'])) {
                        $GLOBALS['query'] = "SELECT * FROM product WHERE company = '".$_GET['brand']."'";
                    }
                    ?>
                </div>
                
            </div>
            <div class="navbar-item has-dropdown is-hoverable">
                <a class="navbar-link">
                    size
                </a>
                <div class="navbar-dropdown">
                    <?php
                    require_once 'connect.php';
                    $size = "SELECT DISTINCT size FROM  product ORDER BY product_id";
                    $result = mysqli_query($conn, $size);
                    while( $row = mysqli_fetch_array($result)){
                        $size = $row['size'];
                        $size_href = 'index.php?size='.$size;
                        echo "<a class='navbar-item' href=$size_href>$size</a>";
                    }
                    if(isset($_GET['size'])) {
                        $GLOBALS['query'] = "SELECT * FROM product where product.size = '".$_GET['size']."'";
                    }
                    ?>
                </div>
                
            </div>
            <div id="abcon" class="navbar-item is-hoverable">
                <a class="navbar-item" href="about us.php">
                    About Us
                </a>
                <a class="navbar-item" href="contact us.php">
                    Contact Us
                </a>
                <div id="searchbar" class="field" >
                    <div class="control">
                        <form action="search.php" method="get">
                            <input id="searchbox" name="searchitem" class="input is-info" type="text"
                                   placeholder="Search Here" required>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="navbar-end">
            <div class="navbar-item">

            <?php
            if (isset($_SESSION['username'])) {
                $item_q = "SELECT sum(quantity) as sum from cart WHERE username = '" . $_SESSION['username'] . "'";
                $result = mysqli_query($conn, $item_q);
                $row = mysqli_fetch_array($result);
                $item_q1 = "SELECT sum(quantity) as sum from wishlist WHERE username = '" . $_SESSION['username'] . "'";
                $result1 = mysqli_query($conn, $item_q1);
                $row1 = mysqli_fetch_array($result1);
                $cartid = "cart.php?cart=".$_SESSION['username'];
                $wishlistid = "wishlist.php?wishlist=".$_SESSION['username'];
                echo "
                <div id='logout' class='buttons'>
                    <a class='button is-link' href=$cartid>
                        <strong>
                            <i class='fa fa-shopping-cart'></i> Cart(";
                         echo $row["sum"].')
                         </strong>
                    </a>
                </div>
                ';
                echo "
                <div class='buttons'>
                    <a class='button is-link' href=$wishlistid>
                        <strong>
                             wishlist(";
                         echo $row1["sum"].')
                         </strong>
                    </a>
                    <a class="button is-light" href="process/logout_process.php">
                        Log out
                    </a>
                </div>
                ';
            }
            else if (isset($_SESSION['admin'])) {
                $item_q = "SELECT sum(quantity) as sum from cart WHERE username = '" . $_SESSION['admin'] . "'";
                $result = mysqli_query($conn, $item_q);
                $row = mysqli_fetch_array($result);
                $item_q1 = "SELECT sum(quantity) as sum from wishlist WHERE username = '" . $_SESSION['admin'] . "'";
                $result1 = mysqli_query($conn, $item_q1);
                $row1 = mysqli_fetch_array($result1);
                $cartid = "cart.php?cart=".$_SESSION['admin'];
                $wishlistid = "wishlist.php?wishlist=".$_SESSION['admin'];
                echo "
                <div id='logout' class='buttons'>
                    <a class='button is-link' href=$cartid>
                        <strong>
                            <i class='fa fa-shopping-cart'></i> Cart(";
                         echo $row["sum"].')
                         </strong>
                    </a>
                </div>
                ';
                echo "
                <div id='logout' class='buttons'>
                    <a class='button is-link' href=$wishlistid>
                        <strong>
                            wishlist(";
                         echo $row1["sum"].')
                         </strong>
                    </a>
                    <a class="button is-light" href="process/logout_process.php">
                        Log out
                    </a>
                </div>
                ';
            }
            else {
                echo '
                <div id="lonreg" class="buttons">
                    <a class="button is-link" href="register.php">
                        <strong>Sign up</strong>
                    </a>
                    <a class="button is-light" href="login.php">
                        Log in
                    </a>
                </div>
                ';
            }
            ?>
            </div>
        </div>
    </div>
</nav>