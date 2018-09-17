<html>
<head>	
	<title>Edit Data</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>

<body>
<div class="container pt-5">
<?php 
	include("config.php"); 

	if($_SERVER["REQUEST_METHOD"] == "GET"){	
		$id = $_GET['id']; 

		$sql = "SELECT * FROM employee WHERE id = $id";
		$stmt = sqlsrv_query( $conn, $sql);
		if( $stmt === false ) {
		     die( print_r( sqlsrv_errors(), true));
		}

		if( sqlsrv_fetch( $stmt ) === false) {
		    die( print_r( sqlsrv_errors(), true));
		}

		$fullname = sqlsrv_get_field( $stmt, 1);
		$email = sqlsrv_get_field( $stmt, 2);
		$post = sqlsrv_get_field( $stmt, 3);
	}
?>

<div>
	<h1 class="pb-5">Update Post</h1>

	<form action="edit" method="POST">
		<div class="form-group">
			<label class="font-weight-bold">ID :</label>
			<span class="font-weight-bold" style="font-size: 1.5rem;"><?= $id; ?></span>
		</div>
		<div class="form-group">
			<label class="font-weight-bold">Full Name</label>
			<input type="text" class="form-control" id="fullname" name="fullname" value="<?= $fullname ?>">
		</div>

		<div class="form-group">
			<label class="font-weight-bold">Email</label>
			<input type="email" class="form-control" id="email" name="email" value="<?= $email ?>">
		</div>

		<div class="form-group">
			<label class="font-weight-bold">Post</label>
			<input class="form-control" type="text" class="form-control" id="post" name="post" value="<?= $post ?>"></input>
		</div>		

		<input type="hidden" name="id" value="<?php echo $id; ?>">
		<button type="submit" id="update" name="update" class="btn btn-success">Update</button>
	</form>
</div>
<?php



?>
</div>
</body>
</html>

