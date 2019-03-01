
<?php
include 'conn.php';  
if (isset($_COOKIE['user'])) {
	header('Location:solve.php');
}else{
?><!DOCTYPE html>
<html>
<head>
	<title>Login/Register</title>
</head>
<body>
<form action="process.php" method="POST">
	Name:<input type="text" name="username"><br>
	Password:<input type="password" name="password"><br>
	<input type="submit" name="login" value="Login">
	<input type="submit" name="register" value="Register">
</form>
</body>
</html>
<?php 
}
 ?>