<?php include("config.php"); ?>

<?php

	$id = $_POST['id']; 
	$sql = sqlsrv_query($conn, "SELECT * FROM employee WHERE id=$id");
	$res = sqlsrv_fetch($sql); 

?>

<html>
<head>	
	<title>Edit Data</title>

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>

<body class="container pt-5">
<div>
	<h1 class="pb-5">Update Post</h1>

	<form action=<?php echo $_SERVER['PHP_SELF']; ?> method="POST">
		<div class="form-group">
			<label class="font-weight-bold">Full Name</label>
			<input type="text" class="form-control" id="fullname" name="fullname" value="<?php echo $res['fullname']; ?>">
		</div>

		<div class="form-group">
			<label class="font-weight-bold">Email</label>
			<input type="email" class="form-control" id="email" name="email" value="<?php echo $res['email']; ?>">
		</div>

		<div class="form-group">
			<label class="font-weight-bold">Post</label>
			<textarea class="form-control" type="text" class="form-control" id="post" name="post" value="<?php echo $res['post']; ?>"></textarea>
		</div>		

		<button type="submit" id="submit" name="update" class="btn btn-success">Update</button>
	</form>
</div>
</body>
</html>

<?php

	if(isset($_POST['update']))
	{	
		if($_SERVER["REQUEST_METHOD"] == "POST"){	

			$id = $_POST['id'];
			$fullname = $_POST['fullname'];
			$email = $_POST['email'];
			$post =  $_POST['post'];
				
			// checking empty fields
			if(empty($fullname) || empty($email) || empty($post)) {
						
				
					echo "<div class='text-center is-invalid'><font color='red'>One or More Field is empty.</font></div>";
					echo "<div class='text-center is-invalid oi-action-undo'><a href='index.php'>Return</a></div>";

			} else { 
					
				//insert data to database	
				$result = sqlsrv_query($conn,"UPDATE employee SET fullname='$fullname',email='$email',post='$post' WHERE id=$id");
				
				//display success message
				echo '<div class="pt-5 text-center">';
					echo "<font color='green'>Data Updated successfully!";
					echo "<br/><a href='index.php'>View Result</a>";
				echo '</div>';
			}
		}
	}

?>