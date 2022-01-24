<?php require_once("process/header.php");?>
<body style="background-color:white;">
<style>
.text-center {
  text-align: center;
  width: 1250px;
}
  </style>
<div id = "cartpage">
    <table class="data-table">
    <?php
    $total=0;
    require_once 'process/connect.php';
    $cart_select = "SELECT * FROM cart where username ='" . $_SESSION['username'] . "'";
    $cart_select_result = mysqli_query($conn, $cart_select);
    $count = mysqli_num_rows($cart_select_result);
    while($detail = mysqli_fetch_array($cart_select_result)){
        $pid=$detail['product_id'];
        $product_query = "SELECT * FROM product WHERE product_id =".$pid;
        $product_result = mysqli_query($conn, $product_query);
        $product = mysqli_fetch_array($product_result);
        $p=$product['price'];
        $pname=$product['name'];
        $total= $total+$product['price'];
        $s_status= $product['stock_status'];
        if($s_status==0){
          
          echo "<h1 style='color:black;'> Cannot proceed as the '$pname' is out of stock </h1>";
        
          die();
        }
    }
        ?>
<div class=".sectionb">
<div class="row">
  <div class="col-75">
    <div class="container">
      <form action="process/action_page.php">
      <fieldset>
      <div class="cform" id='contact-form'>
          <div class="col-50">
            <h3>Billing Address</h3>
            <label for="fname"><b>Full Name</b></label><br>
            <input type="name" id="fname" name="firstname" placeholder="Joey" required><br>
            <label for="email"><b> Email</b></label><br>
            <input type="email" id="email" name="email" placeholder="joey@example.com" required><br>
            <label for="adr"><b>Address</b></label><br>
            <input type="text" id="adr" name="address" placeholder="x Street" required><br>
            <label for="city"><b> City</b></label><br>
            <input type="text" id="city" name="city" placeholder="Greensboro" required><br>
            <label for="state"><b>State</b></label><br>
            <input type="text" id="state" name="state" placeholder="NC" required><br>
            <label for="zip"><b>Zip</b></label><br>
            <input type="text" id="zip" name="zip" placeholder="00000" pattern =[0-9]{5} required><br>
            </div>
          </div>
          <br>
          </fieldset>
          <fieldset>
          <div class="cform" id='contact-form'>
            <h3>Payment Details</h3>
            <label for="cname"><b>Name on Credit/Debit Card</b></label><br>
            <input type="text" id="cname" name="cardname" placeholder="Joey" required><br>
            <label for="ccnum"><b>Credit card number</b></label><br>
            <input type="text" id="ccnum" name="cardnumber" placeholder="1111-2222-3333-4444" pattern=[0-9]{16} required><br>
            <label for="expmonth"><b>Exp Month & Year</b></label><br>
            <input type="month" id="expmonth" name="expmonth" placeholder="MM" required><br>
                <label for="expyear"><b>Zipcode</b></label><br>
                <input type="text" id="expyear" name="expyear" placeholder="00000" pattern=[0-9]{5} required><br>
                <label for="cvv"><b>CVV</b></label><br>
                <input type="text" id="cvv" name="cvv" placeholder="000" pattern =[0-9]{3} required><br>
                <?php echo "<h1 style='color:black;'> Amount to be paid: $ $total </h1>";?><br>
                <div class="text-center">
        
        <input type="submit" style="height:60px; width:80px; background-color: #008CBA;" value="Pay"  class="btn" onclick='confirm("Order placed sucessfully, check your order page for status")'></div>
          </div>
          </fieldset>
        </div>
      </form>
    </div>
  </div>
  <div>
</div>