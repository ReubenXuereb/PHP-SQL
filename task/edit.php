<?php 
//check GET request id parameter

include('config/db_connection.php');
$itemCode = $description = $active = $customerDescription = $salesItem = $stockItem = $purchasedItem = $barcode = $manageItemBy = $minimumInventory = $maximumInventory = $remarks = $imagePath = '';
$updatedItemCode = mysqli_real_escape_string($con_to_db, $_GET['updatedItemCode']);
//print_r($updatedItemCode);
	if(isset($_GET['updatedItemCode'])){
		//make sql
		$sql = "SELECT * FROM products WHERE ItemCode = $updatedItemCode";

		//get query result
		$result = mysqli_query($con_to_db, $sql);

		//fetch results in array format
		$product = mysqli_fetch_assoc($result);

		$itemCode = $product['ItemCode'];
		$description = $product['Description'];
		$active = $product['Active'];
		$customerDescription = $product['CustomerDescription'];
		$salesItem = $product['SalesItem'];
		$stockItem = $product['StockItem'];
		$purchasedItem = $product['PurchasedItem'];
		$barcode = $product['Barcode'];
		$manageItemBy = $product['ManageItemBy'];
		$minimumInventory = $product['MinimumInventory'];
		$maximumInventory = $product['MaximumInventory'];
		$remarks = $product['Remarks'];
		$imagePath = $product['ImagePath'];

		// mysqli_free_result($result);
		// mysqli_close($con_to_db);

		//print_r($product);
	}

	

 ?>

<!DOCTYPE html>
<html>
<?php include('templates/header.php'); ?>

	<section class="container grey-text">
		<h4 class="center"></h4>
		<form action="updateData.php" method="POST">
			<div class="form-group">
		    	<label>Item Code</label>
		    	<input type="text" name="itemCode" class="form-control" placeholder="Enter item code" value="<?php echo $itemCode ?>">
		  	</div>
		  	<div class="form-group">
    			<label>Description/Product Name</label>
    			<textarea class="form-control" type="text" placeholder="Enter product Description or Name" name="description" rows="3"><?php echo $description ?></textarea>
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
    			<textarea class="form-control" type="text" placeholder="Enter Customer Description" name="customerDescription" rows="3"><?php echo $customerDescription ?></textarea>
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
    			<textarea class="form-control" type="text" placeholder="Enter Barcode" name="barcode" rows="3"><?php echo $barcode ?></textarea>
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
			</div>
			<div class="form-group">
		    	<label>Minimum Inventory</label>
		    	<input type="text" name="minimumInventory" class="form-control" placeholder="Enter Minimum inventory" value="<?php echo $minimumInventory ?>">
		  	</div>
		  	<div class="form-group">
		    	<label>Maximum Inventory</label>
		    	<input type="text" name="maximumInventory" class="form-control" placeholder="Enter Maximum inventory" value="<?php echo $maximumInventory ?>">
		  	</div>
		  	<div class="form-group">
    			<label>Remarks</label>
    			<textarea class="form-control" type="text" placeholder="Enter Remarks about Product" name="remarks" rows="3"><?php echo $remarks ?></textarea>
  			</div>
  			<div class="form-group">
    			<label>Image Path</label>
    			<textarea class="form-control" type="text" placeholder="Enter Product's image path" name="imagePath" rows="3"><?php echo $imagePath ?></textarea>
  			</div>
			<div class="form-group">
				<button type="submit" name="update" value="<?php echo $product['ItemCode'] ?>" class="btn btn-primary">Submit Changes</button>
			</div>
		</form>
	</section>


</html>