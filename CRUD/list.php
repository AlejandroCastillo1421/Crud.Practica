<?php
require_once 'config.php';
$queryResult=$pdo->query("SELECT * FROM users");

?>
<html>
<head>
  <title> List Users </title> 
 <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/boostrap/4.5.0/css/bootstrap.min.css"
 integrity="sha384-9aIt2nRpC12UK9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7SK" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATPlz7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</head>
<body>
<div class="container">
<h1>List Users
</h1>
<a href="index.php">Home</a>
<table class="table">
<tr>
    <th>Name</th>
     <th>Email</th>
      <th>Edit</th>
       <th>Delete</th>
</tr>

<tr>
<?php
 while($row=$queryResult->fetch(PDO::FETCH_ASSOC)){
 echo '<tr>';
 echo '<td>'.$row['name'].'</td>';
 echo '<td>'.$row['email'].'</td>';
 echo '<td><a href="update.php?id='.$row['id'].'">Edit</a></td>';
 echo '<td><a href="delete.php?id='.$row['id'].'">Delete</a></td>';
 echo '</tr>';
 }
 ?>
 </table>
 </div>
 </body>
 </html>