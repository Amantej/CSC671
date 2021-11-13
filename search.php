<?php

require("process/header.php");
if(isset($_GET['searchitem'])) {
    $GLOBALS['query'] = "SELECT * FROM product WHERE name LIKE '%".$_GET['searchitem']."%'";
    require "index.php";
}
?>
<html>
<body>   
<div class="navbar-item has-dropdown is-hoverable">
            <div>
            <form action="action_handler.php" method="POST">
    <div><p>Company</p>
    <input type="radio" name="company" value="Dell"> Dell<br>
    <input type="radio" name="company" value="Asus"> Asus<br>
    <input type="radio" name="company" value="MSI"> MSI<br>
    <input type="radio" name="company" value="Apple"> Apple<br>
    <input type="radio" name="company" value="Samsung"> Samsung
</div>
<div><p>Size</p>
    <input type="radio" name="size" value=13> 13<br>
    <input type="radio" name="size" value=15> 15<br>
    <input type="radio" name="size" value=16> 16<br>
    <input type="radio" name="size" value=8> 8<br>
    <input type="radio" name="size" value=10> 10
</div>
    <p><input type="submit"></p>
  </form>
            </div>
</div>
</body>
</html>
<?php
require_once("process/footer.php"); 
?>
