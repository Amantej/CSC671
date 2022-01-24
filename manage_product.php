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
$product_id='';
$categories_id='';
$company='';
$name='';
$stock_status='';
$warranty='';
$price='';
$imagepath='';
$msg='';
$cpu='';
$ram='';
$gpu='';
$battery='';
$storage='';
$size='';
$weight='';
$image_required='required';
if(isset($_GET['id']) && $_GET['id']!=''){
	$image_required='';
	$id=get_safe_value($conn,$_GET['id']);
	$res=mysqli_query($conn,"select * from product where product_id='$id'");
	$check=mysqli_num_rows($res);
	if($check>0){
		$row=mysqli_fetch_assoc($res);
		$categories_id=$row['category_id'];
		$company=$row['company'];
		$name=$row['name'];
		$stock_status=$row['stock_status'];
		$warranty=$row['warranty'];
		$price=$row['price'];
		$image=$row['imagepath'];
		$product_id=$row['product_id'];
		$cpu=$row['cpu'];
		$ram=$row['ram'];
		$gpu=$row['gpu'];
		$battery=$row['battery'];
		$storage=$row['storage'];
		$size=$row['size'];
		$weight=$row['weight'];
	}else{
		header('location:product.php');
		die();
	}
}

if(isset($_POST['submit'])){
	
	$categories_id=get_safe_value($conn,$_POST['category_id']);
	$company=get_safe_value($conn,$_POST['company']);
	$name=get_safe_value($conn,$_POST['name']);
	$stock_status=get_safe_value($conn,$_POST['stock_status']);
	$warranty=get_safe_value($conn,$_POST['warranty']);
	$price=get_safe_value($conn,$_POST['price']);
	$product_id=get_safe_value($conn,$_POST['product_id']);
	$cpu=get_safe_value($conn,$_POST['cpu']);
	$ram=get_safe_value($conn,$_POST['ram']);
	$gpu=get_safe_value($conn,$_POST['gpu']);
	$battery=get_safe_value($conn,$_POST['battery']);
	$storage=get_safe_value($conn,$_POST['storage']);
	$size=get_safe_value($conn,$_POST['size']);
	$weight=get_safe_value($conn,$_POST['weight']);

	$res=mysqli_query($conn,"select * from product where product_id='$product_id'");
	$check=mysqli_num_rows($res);
	if($check>0){
		if(isset($_GET['id']) && $_GET['id']!=''){
			$getData=mysqli_fetch_assoc($res);
			if($id==$getData['product_id']){
				
			}else{
				$msg="Product already exist";
			}
		}else{
			$msg="Product already exist";
		}
	}
	
	
	if(isset($_GET['id'])){
		if($_FILES['image']['type']!='image/png' && $_FILES['image']['type']!='image/jpg' && $_FILES['image']['type']!='image/jpeg'){
			$msg="Please select only png,jpg and jpeg image formate";
		}
	}
	else{
		if($_FILES['image']['type']!=''){
				if($_FILES['image']['type']!='image/png' && $_FILES['image']['type']!='image/jpg' && $_FILES['image']['type']!='image/jpeg'){
				$msg="Please select only png,jpg and jpeg image formate";
			}
		}
	}
	
	if($msg==''){
		if(isset($_GET['id']) && $_GET['id']!=''){
			if($_FILES['image']['name']!=''){
				$image=rand(111111111,999999999).'_'.$_FILES['image']['name'];
				move_uploaded_file($_FILES['image']['tmp_name'],'../computer-store/img/img'.$image);
				$update_sql="UPDATE product SET `name`='$name',stock_status=$stock_status,imagepath='$image', warranty=$warranty, price=$price,cpu='$cpu',ram='$ram',gpu='$gpu',battery='$battery',storage='$storage',size=$size,`weight`=$weight where product_id='$id'";
			}else{
				$update_sql="UPDATE product SET `name`='$name',stock_status=$stock_status, warranty=$warranty, price=$price,cpu='$cpu',ram='$ram',gpu='$gpu',battery='$battery',storage='$storage',size=$size,`weight`=$weight where product_id='$id'";
			}
			//echo "$id,$product_id,$categories_id,'$company','$name',$stock_status,$warranty,$price,'$image','$cpu','$ram','$gpu','$battery','$storage',$size,$weight";
			$is_inserted=mysqli_query($conn,$update_sql);

		}else{
			$image=rand(111111111,999999999).'_'.$_FILES['image']['name'];
			
			move_uploaded_file($_FILES['image']['tmp_name'],'../computer-store/img/img'.$image);
			$is_inserted=mysqli_query($conn,"INSERT into product(product_id,category_id,company,`name`,stock_status,warranty,price,imagepath,cpu,ram,gpu,battery,storage,size,`weight`) 
			values($product_id,$categories_id,'$company','$name',$stock_status,$warranty,$price,'$image','$cpu','$ram','$gpu','$battery','$storage',$size,$weight)");
		}
		if ($is_inserted) {
			echo "inserted";}
		else{
			echo "insert error";
		}
		die();
	}
}
?>
<div class="content pb-0">
            <div class="animated fadeIn">
               <div class="row">
                  <div class="col-lg-12">
                     <div class="card">
                        <div class="card-header"><strong>Product</strong><small> Form</small></div>
                        <form method="post" enctype="multipart/form-data">
							<div class="card-body card-block">
							   
							
							<div class="form-group">
									<label for="categories" class=" form-control-label">Product ID</label>
									<input type="text" name="product_id" placeholder="Enter product name" class="form-control" required value="<?php echo $product_id?>">
								</div>

							<div class="form-group">
									<label for="categories" class=" form-control-label">Categories</label>
									<select class="form-control" name="category_id">
										<option>Select Category</option>
										<?php
										$res=mysqli_query($conn,"select category_id,category_name from category order by category_id asc");
										while($row=mysqli_fetch_assoc($res)){
											if($row['category_id']==$categories_id){
												echo "<option selected value=".$row['category_id'].">".$row['category_name']."</option>";
											}else{
												echo "<option value=".$row['category_id'].">".$row['category_name']."</option>";
											}
											
										}
										?>
									</select>
								</div>

								<div class="form-group">
									<label for="categories" class=" form-control-label">company</label>
									<input type="text" name="company" placeholder="Enter Company" class="form-control" required value="<?php echo $company?>">
								</div>
								
								<div class="form-group">
									<label for="categories" class=" form-control-label">Name</label>
									<input type="text" name="name" placeholder="Enter product name" class="form-control" required value="<?php echo $name?>">
								</div>

								<div class="form-group">
									<label for="categories" class=" form-control-label">Price</label>
									<input type="text" name="price" placeholder="Enter product price" class="form-control" required value="<?php echo $price?>">
								</div>
								
								<div class="form-group">
									<label for="categories" class=" form-control-label">stock_status</label>
									<input type="text" name="stock_status" placeholder="Enter qty" class="form-control" required value="<?php echo $stock_status?>">
								</div>
						
								<div class="form-group">
									<label for="categories" class=" form-control-label">Image</label>
									<input type="file" name="image" class="form-control" <?php echo  $image_required?>>
								</div>
																
								<div class="form-group">
									<label for="categories" class=" form-control-label">warranty</label>
									<textarea name="warranty" placeholder="Enter warranty" class="form-control" required><?php echo $warranty?></textarea>
								</div>
															
								<div class="form-group">
									<label for="categories" class=" form-control-label">CPU</label>
									<input type="text" name="cpu" placeholder="Enter CPU" class="form-control" required value="<?php echo $cpu?>">
								</div>
								
								<div class="form-group">
									<label for="categories" class=" form-control-label">Ram</label>
									<input type="text" name="ram" placeholder="Enter Ram" class="form-control" required value="<?php echo $ram?>">
								</div>

								<div class="form-group">
									<label for="categories" class=" form-control-label">GPU</label>
									<input type="text" name="gpu" placeholder="Enter GPU" class="form-control" required value="<?php echo $gpu?>">
								</div>

                                <div class="form-group">
									<label for="categories" class=" form-control-label">Battery</label>
									<input type="text" name="battery" placeholder="Enter Battery" class="form-control" required value="<?php echo $battery?>">
								</div>
								<div class="form-group">
									<label for="categories" class=" form-control-label">Storage</label>
									<input type="text" name="storage" placeholder="Enter product Size" class="form-control" required value="<?php echo $storage?>">
								</div>

                                <div class="form-group">
									<label for="categories" class=" form-control-label">Size</label>
									<input type="text" name="size" placeholder="Enter product Size" class="form-control" required value="<?php echo $size?>">
								</div>
                                
								<div class="form-group">
									<label for="categories" class=" form-control-label">Weight</label>
									<input type="text" name="weight" placeholder="Enter product Weight" class="form-control" required value="<?php echo $weight?>">
								</div>

							   <button id="payment-button" name="submit" type="submit" class="btn btn-lg btn-info btn-block">
							   <span id="payment-button-amount">Submit</span>
							   </button>
							   <div class="field_error"><?php echo $msg?></div>
							</div>
						</form>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         
</body>
<?php require_once("process/footer.php"); ?>

</html>