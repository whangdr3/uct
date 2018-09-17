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


	<h1 class="pb-5">View Post</h1>

	<table  class="table table-bordered">
		<form action=<?php echo $_SERVER['PHP_SELF']; ?> method="POST">
			<div class="form-group">
				<label class="font-weight-bold">ID :</label>
				<span class="font-weight-bold" style="font-size: 1em;"><?= $id; ?></span>
			</div>
			<div class="form-group">
				<label class="font-weight-bold">Full Name :</label>
				<span class="font-weight-bold" style="font-size: 1em;"><?= $fullname; ?></span>
			</div>

			<div class="form-group">
				<label class="font-weight-bold">Email :</label>
				<span class="font-weight-bold" style="font-size: 1em;"><?= $email; ?></span>
			</div>

			<div class="form-group">
				<label class="font-weight-bold">Post :</label>
				<span class="font-weight-bold" style="font-size: 1em;"><?= $post; ?></span>
			</div>		
		</form>
	</table>

</div>
</body>
</html>

