<?php
include('config/db_connection.php');
$search = $_POST['search'];
if(isset($_POST['search'])){
	$search = mysqli_real_escape_string($con_to_db, $_POST['search']);
		//$sql = "SELECT * FROM products WHERE product_name = '$search' ORDER BY created_at";
	$sql = "SELECT * FROM products WHERE ItemCode LIKE '%{$search}%' OR Description LIKE '%{$search}%'";

	$result = mysqli_query($con_to_db, $sql);
	
	//$searches = mysqli_fetch_assoc($result);
	$searches = mysqli_fetch_all($result, MYSQLI_ASSOC);
	//print_r($searches);
	//$count = mysqli_num_rows($result);

}
?>

<!DOCTYPE html>
<html>
<style type="text/css">
		.row{
			padding-top: 120px;
		}
	</style>
<?php include('templates/header.php'); ?>

<div class="container">
	<div class="row">

		<?php if($searches): ?>

		<?php foreach($searches as $search): ?>
			<div class="card" style="width: 20rem;">
  				<img class="card-img-top" src="<?= htmlspecialchars($search['ImagePath']);?>" width="200px" height="200px">
  					<div class="card-body">
    					<h5 class="card-title"><?= htmlspecialchars($search['Description']);?></h5>
    					<a href="details.php?ItemCode=<?php echo $search['ItemCode'] ?>" class="btn btn-primary">more info</a>
  					</div>
			</div>
		<?php endforeach; ?>

		<?php else: ?>
			
			<div class="container" align="center">
				<h5>No such product exist !</h5>
			</div>
			
		<?php endif; ?>

	</div>
</div>

</html>