<?php
require_once 'connect.php';

if(isset($_POST['username']) && isset($_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $login_query = "SELECT concat(fname,' ',lname) as name FROM `user` Where username='$username' AND password='$password'";
    $admin= "SELECT username FROM `admin_users` Where username='$username' AND password='$password'";

    $result = mysqli_query($conn, $login_query);
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
    $count = mysqli_num_rows($result);

    $result1 = mysqli_query($conn, $admin);
    $row1 = mysqli_fetch_array($result1, MYSQLI_ASSOC);
    $count1 = mysqli_num_rows($result1);
    

    if ($count == 1 && $count1 != 1) {
        session_start();
        $_SESSION['username'] = $username;
        header("Location: ../index.php");
    } 
    if ($count1 == 1) {
        session_start();
        $_SESSION['admin'] = $username;
        header("Location: ../category.php");
    } 
    
    else {
        echo "Your Username or Password is invalid";
    }
} else {
    echo "Please insert Username and Password";
}
?>