<?php
require_once 'config.php';
$result=false;
if (!empty($_POST)){
	$name=$_POST['name'];
	$email=$_POST['email'];
	$password=$_POST['password'];

	$sql="INSERT INTO users(name,email,password) VALUES (:name,:email,:password)";
	$query=$pdo->prepare($sql);
	$result=$query->execute([
		'name'=>$name,
		'email'=>$email,
		'password'=>$password
	]);
}
?>

<html>
<head>
	<title>Add User</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
	integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuAtp1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/<R0JKI" crossorigin="anonymous"></script>
</head>
<body>
	<div clas="container">
		<h1>Add User
		</h1>
		<a href="index.php"> Home</a>
		<?php
		if($result==true){
			echo '<div class="alert alert-success">!!!Success</div>';
		}
		?>
		<form action="add.php" method="post">
			<lable for="name">Name</lable>
			<input type="text" name="name" id="name">
			<br>
			<lable for="email">Email</lable>
			<input type="text" name="email" id="email">
			<br>
			<lable for="password">Password</lable>
			<input type="password" name="password" id="password">
			<br>
			<input type="submit" value="Save">

		</form>
	</div>
</body>
</html>