<?php 
	include("config.php");
?>

<html>
<head>
	<title>Add Data</title>

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>

<body class="container pt-5">

<div>
	<h1 class="pb-5">Create Post</h1>
</div>
<div class="container pt-4 border">

	<form action=<?php echo $_SERVER['PHP_SELF']; ?> method="POST">
		<div class="form-group">
			<label class="font-weight-bold"><span class="text-danger">* </span>Full Name</label>
			<input type="text" class="form-control" id="fullname" name="fullname" placeholder="Enter Full name">
		</div>

		<div class="form-group">
			<label class="font-weight-bold"><span class="text-danger">* </span>Email</label>
			<input type="email" class="form-control" id="email" name="email" placeholder="Enter E-mail">
		</div>

		<div class="form-group">
			<label class="font-weight-bold"><span class="text-danger">* </span>Post</label>
			<textarea class="form-control" type="text" class="form-control" id="post" name="post" placeholder="Your Text Here" rows="5"></textarea>
		</div>		

		<button type="submit" id="submit" class="btn btn-success">Submit</button>
	</form>

</div>


<?php

if($_SERVER["REQUEST_METHOD"] == "POST"){	

	$fullname = $_POST['fullname'];
	$email = $_POST['email'];
	$post =  $_POST['post'];
		
	// checking empty fields
	if(empty($fullname) || empty($email) || empty($post)) {
				
		if(empty($fullname)) {
			echo "<div class='text-center is-invalid'><font color='red'>fullname field is empty.</font><br/></div>";
		}
		
		if(empty($email)) {
			echo "<div class='text-center is-invalid'> <font color='red'>Email field is empty.</font><br/> </div>";
		}

		if(empty($post)) {
			echo "<div class='text-center is-invalid'> <font color='red'>Post field is empty.</font><br/> </div>";
		}
		
		//link to the previous page
		echo "<br/><div class='text-center'> <a href='index.php'>Return Home</a></div>";
	} else { 
			
		//insert data to database	
		$sql = sqlsrv_query($conn,"INSERT INTO employee (fullname,email,post) VALUES ('$fullname','$email','$post')");
		
		//display success message
		echo '<div class="pt-5 text-center">';
			echo "<font color='green'>Data added successfully!";
			echo "<br/><a href='index.php'>View Result</a>";
		echo '</div>';
	}
}
?>

</body>
</html>
