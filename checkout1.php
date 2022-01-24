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
        $username=$detail['username'];
        $product_query = "SELECT * FROM product WHERE product_id =".$pid;
        $product_result = mysqli_query($conn, $product_query);
        $product = mysqli_fetch_array($product_result);
        $p=$product['price'];
        $pname=$product['name'];
        $total= $total+$product['price'];
        $s_status= $product['stock_status'];
        if($s_status==0){
          
          echo '<h1> Cannot proceed as the '.$pname.' is out of stock </h1>';
        
          die();
        }
    }
    
        ?>
<div class=".sectionb">
<div class="row">
  <div class="col-75">
    <div class="container">
    <form action="process/action_page.php">

        <div class="cform" id='contact-form'>
          <div class="col-50">
            <form> 
              <fieldset>
                <legend><h3><b>Billing Address</b></h3></legend>  
            
                <label for="fname"><b>Full Name</b></label><br>
                <input type="name" class= "form-control" id="fname" name="firstname" placeholder="Full Name" required><br>
            
                <label for="email"><b>Email</b></label><br>
                <input type="email" class= "form-control" id="email" name="email" placeholder="Email" required><br>
            
                <label for="adr"><b>Address</b></label><br>
                <input type="text" class= "form-control" id="adr" name="address" placeholder="Address" required><br>
            
                <label for="city"><b>City</b></label><br>
                <input type="text" class= "form-control" id="city" name="city" placeholder="City" pattern =[a-z][A-Z] required><br>
              
                <label for="state"><b>State</b></label><br>
                <input type="text" class= "form-control" id="state" name="state" placeholder="State" pattern =[a-z][A-Z] required><br>
                
                <label for="zip"><b>Zip Code</b></label><br>
                <input type="text" class= "form-control" id="zip" name="zip" placeholder="Zip" pattern =[0-9]{5} required><br>
                
              </fieldset>
            </form>
         
            <form>
              <fieldset>
                <legend><h3><b>Payment</b></h3></legend>

                <label for="cname"><b>Name on Credit/Debit Card</b></label><br>
                <input type="name" id="cname" name="cardname" placeholder="Name on Card" required><br>
            
                <label for="ccnum"><b>Credit card number</b></label><br>
                <input type="text" id="ccnum" name="cardnumber" placeholder="Credit Card Number" name="id number" pattern=[0-9]{16} required><br>
            
                <label for="expmonth"><b>Exp Month & Year</b></label><br>
                <input type="text" id="expmonth" name="expmonth" placeholder="Month" required><br>
                                   
                <label for="cvv"><b>CVV</b></label><br>
                <input type="text" id="cvv" name="cvv" placeholder="CVV" name = "id number" pattern =[0-9]{3} required><br>
                
                <?php echo"<h1 style='color:black;'> Amount to be paid: $ $total </h1>";?>
                <br>
                
                <div class="text-center">
                <button type="submit" style="height:60px; width:80px; background-color: #008CBA; " onclick='confirm("Order placed sucessfully, check your order page for status")'>Pay</button>
                </form> 

              </fieldset>
           </form>
        
          </div>
        </div>
      </div>
        
    </div>
  </div>
</div>