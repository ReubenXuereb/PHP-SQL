<?php 

include('config/db_connection.php');

$itemCode = $description = $active = $customerDescription = $salesItem = $stockItem = $purchasedItem = $barcode = $manageItemBy = $minimumInventory = $maximumInventory = $remarks = $imagePath = '';
$errors = array('itemCode'=>'', 'description'=>'', 'active'=>'', 'salesItem'=>'', 'stockItem'=>'', 'purchasedItem'=>'', 'barcode'=>'', 'manageItemBy'=>'', 'minimumInventory'=>'', 'maximumInventory'=>'', 'imagePath'=>'');

if(isset($_POST['submit'])){
	

		//check itemCode
	if(empty($_POST['itemCode'])){
		$errors['itemCode'] = 'An item code is required <br />';
	}else{
		echo htmlspecialchars($_POST['itemCode']);
	}
		//check desc
	if(empty($_POST['description'])){
		$errors['description'] = 'A description is required <br />';
	}else{
		echo htmlspecialchars($_POST['description']);
	}
		//check product Name
	if(empty($_POST['active'])){
			//echo 'A product name is required <br />';
		$errors['active'] = 'A ticked box is required <br />';
	}else{
		echo htmlspecialchars($_POST['active']);
	}
		//check mobile number
	if(empty($_POST['salesItem'])){
			//echo 'A mobile number is required <br />';
		$errors['salesItem'] = 'A ticked box is required <br />';
	}else{
		echo htmlspecialchars($_POST['salesItem']);
	}
	if(empty($_POST['stockItem'])){
			//echo 'A mobile number is required <br />';
		$errors['stockItem'] = 'A ticked box is required <br />';
	}else{
		echo htmlspecialchars($_POST['stockItem']);
	}
	if(empty($_POST['purchasedItem'])){
			//echo 'A mobile number is required <br />';
		$errors['purchasedItem'] = 'A ticked box is required <br />';
	}else{
		echo htmlspecialchars($_POST['purchasedItem']);
	}
	if(empty($_POST['barcode'])){
			//echo 'A mobile number is required <br />';
		$errors['barcode'] = 'A barcode is required <br />';
	}else{
		echo htmlspecialchars($_POST['barcode']);
	}
	if(empty($_POST['manageItemBy'])){
			//echo 'A mobile number is required <br />';
		$errors['manageItemBy'] = 'A ticked box is required <br />';
	}else{
		echo htmlspecialchars($_POST['manageItemBy']);
	}
	if(empty($_POST['minimumInventory'])){
			//echo 'A mobile number is required <br />';
		$errors['minimumInventory'] = 'A minimum inventory is required <br />';
	}else{
		echo htmlspecialchars($_POST['minimumInventory']);
	}
	if(empty($_POST['maximumInventory'])){
			//echo 'A mobile number is required <br />';
		$errors['maximumInventory'] = 'A maximum inventory is required <br />';
	}else{
		echo htmlspecialchars($_POST['maximumInventory']);
	}
	if(empty($_POST['imagePath'])){
			//echo 'A mobile number is required <br />';
		$errors['imagePath'] = 'An image path is required <br />';
	}else{
		echo htmlspecialchars($_POST['imagePath']);
	}

		//if array_filters returns false; there are no errors
		//if array_filters returns true; there are errors
	// if(array_filter($errors)){
	// 	echo 'Form is invalid due to errors';
	// }else{
			//post items into db
		$itemCode = mysqli_real_escape_string($con_to_db, $_POST['itemCode']);
		$description = mysqli_real_escape_string($con_to_db, $_POST['description']);
		$active = mysqli_real_escape_string($con_to_db, $_POST['active']);
		$customerDescription = mysqli_real_escape_string($con_to_db, $_POST['customerDescription']);
		$salesItem = mysqli_real_escape_string($con_to_db, $_POST['salesItem']);
		$stockItem = mysqli_real_escape_string($con_to_db, $_POST['stockItem']);
		$purchasedItem = mysqli_real_escape_string($con_to_db, $_POST['purchasedItem']);
		$barcode = mysqli_real_escape_string($con_to_db, $_POST['barcode']);
		$manageItemBy = mysqli_real_escape_string($con_to_db, $_POST['manageItemBy']);
		$minimumInventory = mysqli_real_escape_string($con_to_db, $_POST['minimumInventory']);
		$maximumInventory = mysqli_real_escape_string($con_to_db, $_POST['maximumInventory']);
		$remarks = mysqli_real_escape_string($con_to_db, $_POST['remarks']);
		$imagePath = mysqli_real_escape_string($con_to_db, $_POST['imagePath']);
		

			//create sql
		$sql= "INSERT INTO products(ItemCode, Description, Active, CustomerDescription, SalesItem, StockItem, PurchasedItem, Barcode, ManageItemBy, MinimumInventory, MaximumInventory, Remarks, ImagePath) VALUES('$itemCode', '$description', $active, '$customerDescription', $salesItem, $stockItem, $purchasedItem, '$barcode', $manageItemBy, $minimumInventory, $maximumInventory, '$remarks', '$imagePath')";

			//save to db and check
		if(mysqli_query($con_to_db, $sql)){
				//success
			header('Location: index.php');
		}else{
				//error
			echo 'query error: ' . mysqli_error($con_to_db);
		}
	//}

	}//End of post check

	?>

	<!DOCTYPE html>
	<html>
	<?php include('templates/header.php'); ?>

	<section class="container grey-text">
		<h4 class="center"></h4>
		<form class="white" action="add.php" method="POST">
			<div class="form-group">
		    	<label>Item Code</label>
		    	<input type="text" name="itemCode" class="form-control" placeholder="Enter item code" value="<?php if (isset($itemCode)){echo $itemCode; }?>">
		    	
		  	</div>
		  	<div class="form-group">
    			<label>Description/Product Name</label>
    			<textarea class="form-control" type="text" placeholder="Enter product Description or Name" name="description" rows="3" value="<?php echo $description; ?>"></textarea>
    			
  			</div>
  			<label>Active</label>
  			<div class="form-group row">
  			<div class="form-check form-check-inline">
			  <input class="form-check-input" type="radio" name="active" value="1" <?php if (isset($active) && $active == "1") echo "checked";?>>
			  <label class="form-check-label">True</label>
			</div>
			<div class="form-check form-check-inline">
			  <input class="form-check-input" type="radio" name="active" value="0" <?php if (isset($active) && $active == "0") echo "checked";?>>
			  <label class="form-check-label">False</label>
			</div>
			</div>
			<div class="form-group">
    			<label>Customer Description</label>
    			<textarea class="form-control" type="text" placeholder="Enter Customer Description" name="customerDescription" rows="3" value="<?php echo $customerDescription; ?>"></textarea>
  			</div>
  			<label>Sales Item</label>
  			<div class="form-group row">
  			<div class="form-check form-check-inline">
			  <input class="form-check-input" type="radio" name="salesItem" value="1" <?php if (isset($salesItem) && $salesItem == "1") echo "checked";?>>
			  <label class="form-check-label">Yes</label>
			</div>
			<div class="form-check form-check-inline">
			  <input class="form-check-input" type="radio" name="salesItem" value="0" <?php if (isset($salesItem) && $salesItem == "0") echo "checked";?>>
			  <label class="form-check-label">No</label>
			</div>
			</div>
			<label>Stock Item</label>
  			<div class="form-group row">
  			<div class="form-check form-check-inline">
			  <input class="form-check-input" type="radio" name="stockItem" value="1" <?php if (isset($stockItem) && $stockItem == "1") echo "checked";?>>
			  <label class="form-check-label">Yes</label>
			</div>
			<div class="form-check form-check-inline">
			  <input class="form-check-input" type="radio" name="stockItem" value="0" <?php if (isset($stockItem) && $stockItem == "0") echo "checked";?>>
			  <label class="form-check-label">No</label>
			</div>
			</div>
			<label>Purchased Item</label>
  			<div class="form-group row">
  			<div class="form-check form-check-inline">
			  <input class="form-check-input" type="radio" name="purchasedItem" value="1" <?php if (isset($purchasedItem) && $purchasedItem == "1") echo "checked";?>>
			  <label class="form-check-label">Yes</label>
			</div>
			<div class="form-check form-check-inline">
			  <input class="form-check-input" type="radio" name="purchasedItem" value="0" <?php if (isset($purchasedItem) && $purchasedItem == "0") echo "checked";?>>
			  <label class="form-check-label">No</label>
			</div>
			</div>
			<div class="form-group">
    			<label>Barcode</label>
    			<textarea class="form-control" type="text" placeholder="Enter Barcode" name="barcode" rows="3" value="<?php echo $barcode; ?>"></textarea>
    			
  			</div>
  			<label>Manage Item by</label>
  			<div class="form-group row">
  			<div class="form-check form-check-inline">
			  <input class="form-check-input" type="radio" name="manageItemBy" value="1" <?php if (isset($manageItemBy) && $manageItemBy == "1") echo "checked";?>>
			  <label class="form-check-label">None</label>
			</div>
			<div class="form-check form-check-inline">
			  <input class="form-check-input" type="radio" name="manageItemBy" value="2" <?php if (isset($manageItemBy) && $manageItemBy == "2") echo "checked";?>>
			  <label class="form-check-label">Serial</label>
			</div>
			<div class="form-check form-check-inline">
			  <input class="form-check-input" type="radio" name="manageItemBy" value="3" <?php if (isset($manageItemBy) && $manageItemBy == "3") echo "checked";?>>
			  <label class="form-check-label">Batch</label>
			</div>
			<div class="text-danger"><?php echo $errors['manageItemBy']; ?></div>
			</div>
			<div class="form-group">
		    	<label>Minimum Inventory</label>
		    	<input type="text" name="minimumInventory" class="form-control" placeholder="Enter Minimum inventory" value="<?php echo $minimumInventory; ?>">
		    	
		  	</div>
		  	<div class="form-group">
		    	<label>Maximum Inventory</label>
		    	<input type="text" name="maximumInventory" class="form-control" placeholder="Enter Maximum inventory" value="<?php echo $maximumInventory; ?>">
		    	
		  	</div>
		  	<div class="form-group">
    			<label>Remarks</label>
    			<textarea class="form-control" type="text" placeholder="Enter Remarks about Product" name="remarks" rows="3" value="<?php echo $remarks; ?>"></textarea>
  			</div>
  			<div class="form-group">
    			<label>Image Path</label>
    			<textarea class="form-control" type="text" placeholder="Enter Product's image path" name="imagePath" rows="3" value="<?php echo $imagePath; ?>"></textarea>
    			
  			</div>
  			<div class="form-group">
				<input type="submit" name="submit" value="submit" class="btn btn-primary">
			</div>
		</form>
	</section>

	</html>