<?php 

include ('config/db_connection.php');
$active = $salesItem = $stockItem = $purchasedItem = $manageItemBy = $imagePath = '';

if(isset($_POST['delete'])){
	$itemCode_to_delete = mysqli_real_escape_string($con_to_db, $_POST['itemCode_to_delete']);

		//make sql
	$sql = "DELETE FROM products WHERE ItemCode = $itemCode_to_delete";

		//get query result
	if(mysqli_query($con_to_db, $sql)){
			//success
		header('Location: index.php');
	}else{
		echo 'query error: ' . mysqli_error($con_to_db);
	}
}

	//check GET request id parameter
if(isset($_GET['ItemCode'])){

	$itemCode = mysqli_real_escape_string($con_to_db, $_GET['ItemCode']);

		//make sql
	$sql = "SELECT * FROM products WHERE ItemCode = $itemCode";

		//get query result
	$result = mysqli_query($con_to_db, $sql);

		//fetch results in array format
	$product = mysqli_fetch_assoc($result);

	$active = $product['Active'];
	$salesItem = $product['SalesItem'];
	$stockItem = $product['StockItem'];
	$purchasedItem = $product['PurchasedItem'];
	$manageItemBy = $product['ManageItemBy'];
	$imagePath = $product['ImagePath'];

	//print_r($product);
	//mysqli_free_result($result);
	// mysqli_close($con_to_db);



}else{
	echo ("Query Error: " . mysqli_error($con_to_db));
}


?>

<!DOCTYPE html>
<html>
<head>
	<!-- CSS only -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
	<style type="text/css">
		.container.center{
			padding-top: 120px;
			margin-right: 650px;
			color: #90a4ae;
		}
		.form-control{
			border-width: 10px;
		}
		.imageContainer{
			position:relative;
			background: red;
  			height:200px;
  			width:200px;
  			bottom: 1000px;
  			left: 350px;
		}
		.imageContainer img{
			display:block;
 			width:200px;
 			height: 200px;
  			margin:0;
  			padding:0;
  			position:absolute;
		}
		.container-buttons{
			position: absolute;
			bottom:  -250px;
		}

	</style>
</head>
<?php include('templates/header.php'); ?>


<div class="container center" align="center">
	<table class="table table-bordered white" align="center">
		
		<?php if($product): ?>
			<form>
  				<div class="form-group row">
    				<label class="col-sm-1 col-form-label">ItemCode</label>
    				<div class="col-sm-2">
     					<input type="text" readonly class="form-control " value="<?php echo htmlspecialchars($product['ItemCode']); ?>">
    				</div>
  				</div>
  				<div class="form-group row">
    				<label class="col-sm-1 col-form-label">Description</label>
    				<div class="col-sm-7">
     					<textarea type="text" readonly class="form-control" rows="3"><?php echo htmlspecialchars($product['Description']); ?></textarea>
    				</div>
  				</div>
  				<div class="form-group row">
    				<label class="col-sm-1 col-form-label">Active</label>
    				<div class="col-sm-2">
    					<input type="text" readonly class="form-control" 

    					value="<?php if($active == 1) {
    								echo 'true';
    							}else{
    								echo 'false';
    							}?>">

    				</div>
  				</div>
  				<div class="form-group row">
    				<label class="col-sm-1 col-form-label">Customer Description</label>
    				<div class="col-sm-7">
     					<textarea type="text" readonly class="form-control" row="3"><?php echo htmlspecialchars($product['CustomerDescription']); ?></textarea>
    				</div>
  				</div>
  				<div class="form-group row">
    				<label class="col-sm-1 col-form-label">Sales Item</label>
    				<div class="col-sm-2">
    					<input type="text" readonly class="form-control" 

    					value="<?php if($salesItem == 1) {
    								echo 'true';
    							}else{
    								echo 'false';
    							}?>">

    				</div>
  				</div>
  				<div class="form-group row">
    				<label class="col-sm-1 col-form-label">Stock Item</label>
    				<div class="col-sm-2">
    					<input type="text" readonly class="form-control" 

    					value="<?php if($stockItem == 1) {
    								echo 'true';
    							}else{
    								echo 'false';
    							}?>">

    				</div>
  				</div>
  				<div class="form-group row">
    				<label class="col-sm-1 col-form-label">Purchased Item</label>
    				<div class="col-sm-2">
    					<input type="text" readonly class="form-control" 

    					value="<?php if($purchasedItem == 1) {
    								echo 'true';
    							}else{
    								echo 'false';
    							}?>">

    				</div>
  				</div>
  				<div class="form-group row">
    				<label class="col-sm-1 col-form-label">ItemCode</label>
    				<div class="col-sm-5">
     					<input type="text" readonly class="form-control " value="<?php echo htmlspecialchars($product['Barcode']); ?>">
    				</div>
  				</div>
  				<div class="form-group row">
    				<label class="col-sm-1 col-form-label">Manage Item By</label>
    				<div class="col-sm-2">
    					<input type="text" readonly class="form-control" 

    					value="<?php if($manageItemBy == 1){
    								echo 'None';
    							}else if($manageItemBy == 2){
    								echo 'Serial';
    							}else if($manageItemBy == 3){
    								echo 'Batch';
    							}?>">

    				</div>
  				</div>
  				<div class="form-group row">
    				<label class="col-sm-1 col-form-label">Minimum Inventory</label>
    				<div class="col-sm-2">
     					<input type="text" readonly class="form-control " value="<?php echo htmlspecialchars($product['MinimumInventory']); ?>">
    				</div>
  				</div>
  				<div class="form-group row">
    				<label class="col-sm-1 col-form-label">Maximum Inventory</label>
    				<div class="col-sm-2">
     					<input type="text" readonly class="form-control " value="<?php echo htmlspecialchars($product['MaximumInventory']); ?>">
    				</div>
  				</div>
  				<div class="form-group row">
    				<label class="col-sm-1 col-form-label">Remarks</label>
    				<div class="col-sm-7">
     					<textarea type="text" readonly class="form-control" rows="3"><?php echo htmlspecialchars($product['Remarks']); ?></textarea>
    				</div>
  				</div>
  				<div class="form-group row">
    				<label class="col-sm-1 col-form-label">Image Path</label>
    				<div class="col-sm-7">
     					<textarea type="text" readonly class="form-control" rows="3"><?php echo htmlspecialchars($product['ImagePath']); ?></textarea>
    				</div>
  				</div>
  				<div class="imageContainer">
  					<img class="image" src="<?php echo htmlspecialchars($product['ImagePath']);?>" class="rounded float-right" width="200px" height="200px">
  				</div>
				
			</form>
			<div class="container-buttons">
			<form  action="details.php" method="POST">
  					<input type="hidden" name="itemCode_to_delete" value="<?php echo $product['ItemCode']; ?>">
					<input type="submit" class="btn btn-danger" name="delete" value="Delete">
			</form>
			<a class="btn btn-dark" href="edit.php?updatedItemCode=<?php echo $product['ItemCode']; ?>">Edit</a>
			</div>

		<?php else: ?>
			<h5>No such product exist !</h5>

		<?php endif; ?>


	</div>

	
	</html>