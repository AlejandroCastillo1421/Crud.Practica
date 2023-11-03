<?php
$user=null;
$query=null;
if(!empty($_POST)){
	require_once 'config.php';
	/* $query ="SELECT * FROM users where email='" . $_POST['email'] . "'AND password='" . md5($_POST['password']) . "'";
	$queryResul = $pdo->query($query);
	$user = $queryResul->fetch(PDO::FETCH_ASSOC);
	*/
	$query = "SELECT * FROM users where email= :email AND password= :password";
	$prepared=$pdo->prepare($query);
	//$queryResul = $pdo->query($query);
	$prepared->execute([
		'email'=>$_POST['email'],
		'password'=>md5($_POST['password'])

	]);

	//$user = $queryResul->fetch(PDO::FETCH_ASSOC);
	$user = $prepared->fetch(PDO::FETCH_ASSOC);
}
?>

<html>
<head>
	<title> Database</title>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
	integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuAtp1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/ KR0JKI" crossorigin="anonymous"></script>
</head>
<body>
	<div clas="container">
		<h1>Fake Login
		</h1>
		<a href="index.php">Home</a>
		<form action="fake-login.php" method="post">
			<lable for="email">Email</lable>
			<input type="text" name="email" id="email">
			<br>
			<lable for="password">Password</lable>
			<input type="password" name="password" id="password">
			<br>
			<input type="submit" value="Login">
		</form>
		<h2>Query</h2>
		<div>
			<?php
			print_r($query);
			?>
		</div>
		<h2>User Data</h2>
		<div>
			<?php
			print_r($user);
			?>
		</div>
	</div>
</body>
</html>