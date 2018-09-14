<?php
	include('config.php');
?>

<!DOCTYPE html>
<html>
<head>
	<title>UCT</title>

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>
<body class="container">

<div class="pt-5 pb-5 pl-5">
	<a href="add.php" class="btn btn-success">Create Post</a>
</div>

<div class="pb-5 pl-5 text-center">
	<table class="table table-bordered" style="width: 40vw; height: 5vh">
		<thead class="thead-dark  text-center">
		<th scope="col">ID</td>
		<th scope="col">Full Name</td>
		<th scope="col">Email</td>
		<th scope="col">Post</td>
		<th scope="col">Action</td>
	</thead>

	<tbody>

		<?php 

			$sql = "SELECT * FROM employee";
			$stmt = sqlsrv_query( $conn, $sql );
			if( $stmt === false) {
			    die( print_r( sqlsrv_errors(), true) );
			}

			while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ) {
			      echo '<tr>';
					echo "<td>".$row['id']."</td>";
					echo "<td>".$row['fullname']."</td>";
					echo "<td>".$row['email']."</td>";	
					echo "<td>".$row['post']."</td>";
					echo "<td class='text-center'>
							<a  class='btn btn-primary' href=\"edit.php?id=$row[id]\">Update</a>
							<a  class='btn btn-danger' href=\"delete.php?id=$row[id]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";					
			      echo '</tr>';
	
			}

			sqlsrv_free_stmt( $stmt);

		?>

	</tbody>	
	</table>
</div>
</body>
</html>