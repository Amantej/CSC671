<?php
require_once "process/connect.php";

if(isset($_GET['searchitem'])) {
    $GLOBALS['query'] = "SELECT * FROM product WHERE name LIKE '%".$_GET['searchitem']."%'";
    require "index.php";
}
