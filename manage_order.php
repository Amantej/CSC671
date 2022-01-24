<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="assets/css/normalize.css">
      <link rel="stylesheet" href="assets/css/bootstrap.min.css">
      <link rel="stylesheet" href="assets/css/font-awesome.min.css">
      <link rel="stylesheet" href="assets/css/themify-icons.css">
      <link rel="stylesheet" href="assets/css/pe-icon-7-filled.css">
      <link rel="stylesheet" href="assets/css/flag-icon.min.css">
      <link rel="stylesheet" href="assets/css/cs-skin-elastic.css">
      <link rel="stylesheet" href="assets/css/style.css">
      <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" type="text/css" href="css/card.css">
    <title></title>
</head>
<?php
require("process/header.php");?>
<body>
<?php
function get_safe_value($conn,$str){
	if($str!=''){
		$str=trim($str);
		return mysqli_real_escape_string($conn,$str);
	}
}
if(isset($_GET['type']) && $_GET['type']!=''){
	$type=get_safe_value($conn,$_GET['type']);
	if($type=='status'){
		$operation=get_safe_value($conn,$_GET['operation']);
		$oid=get_safe_value($conn,$_GET['oid']);
		if($operation=='active'){
			$status=1;
		}else{
			$status=0;
		}
		$update_status_sql="update orders set status=$status where oid=$oid";
		mysqli_query($conn,$update_status_sql);
	}
	

}


?>
<div class="content pb-0">
	<div class="orders">
	   <div class="row">
		  <div class="col-xl-12">
			 <div class="card">
				<div class="card-body">
				   <h4 class="box-title">All Orders </h4> 
				</div>
				<div id="searchbar" class="field" >
                    <div class="control">
                        <form action = "<?=$_SERVER['PHP_SELF'];?>" method="POST">
                            <input id="searchbox" name="searchitem1" class="input is-info" type="text"
                                   placeholder="YYYY-MM-DD">
							<h6 style='color:black;'>to</h6>
							<input id="searchbox" name="searchitem2" class="input is-info" type="text"
                                   placeholder="YYYY-MM-DD">
							<p><input type="submit" name="submit"></p>
                        </form>
                    </div>
                </div>
				<div class="card-body--">
				   <div class="table-stats order-table ov-h">
					  <table class="table ">
						 <thead>
							<tr>
							   <th>OID</th>
							   <th>Username</th>
							   <th>Product</th>
							   <th>Quantity</th>
							   <th>Price</th>
							   <th>Sub Total</th>
                               <th>Date</th>
                               <th>Status</th>
							   <th></th>
							</tr>
						 </thead>
						 <tbody>
							<?php 
							$total=0;
							$sql="SELECT * from orders";
							if(isset($_POST['submit'])){
								//echo $_POST['searchitem2'],$_POST['searchitem1'];
								if($_POST['searchitem1'] && $_POST['searchitem2']){
									$from = $_POST['searchitem1'];
									$to = $_POST['searchitem2']; 
									$sql="SELECT * from orders where DATE(date) between '$from' and '$to' ";}
								else if($_POST['searchitem1']){
									$from = $_POST['searchitem1'];
									$to = $_POST['searchitem1']; 
									$sql="SELECT * from orders where DATE(date) between '$from' and '$to' ";
								}
								else {
								//echo $_POST['searchitem2'];
									$from = $_POST['searchitem2'];
									$to = $_POST['searchitem2']; 
									$sql="SELECT * from orders where DATE(date) between '$from' and '$to' ";
								}
								
							}
							$res=mysqli_query($conn,$sql);
							while($row=mysqli_fetch_assoc($res)){
                            $pid=$row['product_id'];
                            $oid=$row['oid'];
                            $product_query = "SELECT * FROM product WHERE product_id =".$pid;
                            $product_result = mysqli_query($conn, $product_query);
                            $product = mysqli_fetch_array($product_result);
                            $p=$product['price'];
                            $q=$row['quantity'];
                            $st=$p*$q;
                            $total= $total+$p*$q;?>
							<tr>
							   <td><?php echo $row['oid']?></td>
							   <td><?php echo $row['username']?></td>
							   <td><?php echo $product['name']?></td>
                               <td><?php echo $row['quantity']?></td>
							   <td><?php echo $product['price']?></td>
                               <td><?php echo $st?></td>
                               <td><?php echo $row['date']?></td>
							   <td><?php echo $row['status']?></td>
							   <td>
								<?php
								if($row['status']==1){
									echo "<span class='badge badge-complete'><a href='?type=status&operation=deactive&oid=".$row['oid']."'>Delivered</a></span>&nbsp;";
								}else{
									echo "<span class='badge badge-pending'><a href='?type=status&operation=active&oid=".$row['oid']."'>Ongoing</a></span>&nbsp;";
								}
								//echo "<span class='badge badge-edit'><a href='manage_product.php?oid=".$row['oid']."'>Edit</a></span>&nbsp;";
								
						
								
								?>
							   </td>
							</tr>
                            
							<?php } 
                            echo "<h1 style='color:black;'>Total Sales amount: $total </h1>";?>
						 </tbody>
					  </table>
				   </div>
				</div>
			 </div>
		  </div>
	   </div>
	</div>
</div>
</body>
<?php require_once("process/footer.php"); ?>

</html>