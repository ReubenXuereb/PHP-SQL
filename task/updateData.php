<?php 

include('config/db_connection.php');

	if(isset($_POST['update'])){
		$updatedItemCode = mysqli_real_escape_string($con_to_db, $_POST['update']);
		print_r($updatedItemCode);
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
		$sql = "UPDATE products SET ItemCode = '$itemCode', Description = '$description', Active = $active, CustomerDescription = '$customerDescription', SalesItem = $salesItem, StockItem = $stockItem, PurchasedItem = $purchasedItem, Barcode = '$barcode', ManageItemBy = $manageItemBy, MinimumInventory = $maximumInventory, MaximumInventory = $maximumInventory, Remarks = '$remarks', ImagePath = '$imagePath' WHERE ItemCode = $updatedItemCode";

		$result = mysqli_query($con_to_db, $sql);

		//save to db and check
			if($result){
				//success
				header('Location: index.php');
				print_r('Product Updated !');
			}else{
				//error
				echo 'query error: ' . mysqli_error($con_to_db);
			}
	}
?>