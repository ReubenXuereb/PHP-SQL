<?php  
	//MySQLi or PDO
	//connect to databse
	//mysqli_connect method uses 4 parametes; host, username, password, database name
	// $con_to_db = mysqli_connect('localhost', 'reuben', 'test1234', 'product_system');

	// //check connection
	// if(!$con_to_db){
	// 	echo 'Connection error: ' . mysqli_connect_error();
	// }
	//There are 3 steps in conecting and getting info from a database
	//1. Write quesry for all products
	// * means to get all columns from that table.
	//$sql = 'SELECT * FROM products'

include ('config/db_connection.php');

$sql = 'SELECT ItemCode, Description, ImagePath FROM products';

	//2. Make query and get result
$result = mysqli_query($con_to_db, $sql);

	//3. Fetch the resulting rows as an array
$products = mysqli_fetch_all($result, MYSQLI_ASSOC);

	//free results from memory
mysqli_free_result($result);

	//close connection to db
mysqli_close($con_to_db);

	//print_r($products);
?>

<!DOCTYPE html>
<html>
<head>
	<style type="text/css">
		.row{
			padding-top: 20px;
			padding-bottom: 50px;
			left: 90px;
			position: relative;
		}
		.title{
			padding-top: 20px;
		}
	</style>
	
</head>

<?php include('templates/header.php'); ?>


<div class="container" align="center">
	<h1 class="title">Products</h1>
	<div class="row">

		<?php foreach($products as $product): ?>

			<div class="card" style="width: 20rem;">
  				<img class="card-img-top" src="<?= htmlspecialchars($product['ImagePath']);?>" width="200px" height="200px">
  					<div class="card-body">
    					<h5 class="card-title"><?= htmlspecialchars($product['Description']);?></h5>
    					<a href="details.php?ItemCode=<?php echo $product['ItemCode'] ?>" class="btn btn-primary">more info</a>
  					</div>
			</div>

		<?php endforeach; ?>

	</div>
</div>
<body>
</body>

</html>