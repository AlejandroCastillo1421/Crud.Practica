<?php
include_once 'config.php';
$result=false;
if (!empty($_POST)){
	$id=$_POST['id'];
	$newName=$_POST['name'];
	$newEmail=$_POST['email'];

	$sql="UPDATE users SET name=:name, email=:email WHERE id=:id";
	$query=$pdo->prepare($sql);

	$result=$query->execute( [
	'id'=>$id,
	'name'=>$newName,
	'email'=>$newEmail
]);       
	$nameValue=$newName;
	$emailValue=$newEmail;

}else{

	$id=$_GET['id'];
	$sql="SELECT * FROM users WHERE id=:id";
	$query=$pdo->prepare($sql);
	$query->execute([
		'id'=>$id
	]);
	$row=$query->fetch(PDO::FETCH_ASSOC);
	$nameValue=$row['name'];
	$emailValue=$row['email'];

}
?>


<html>
<head>
	<title> Update</title>
 <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/boostrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpCl2Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</head>
<body>
	<div class="container">
		<h1>Update User
		</h1>
	<a href="list.php">Back</a>
	<?php
	
	if($result==true)
	{ 
		echo '<div class="alert alert-success">!!!Success</div>';
}
?>
<form action="update.php" method="post">
<lable for="name">Name</lable>
<input type="text" name="name" id="name" value="<?php echo $nameValue; ?>">
<br>
<lable for="email">Email</lable>
<input type="text" name="email" id="email" value="<?php echo $emailValue; ?>">
<br>
<input type="hidden" name="id" value="<?php echo $id ?>">
<input type="submit" value="Update">
</form>
</div>
</body>
</html>
