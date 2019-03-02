<?php
include 'conn.php';
 if(isset($_POST['username'])&& isset($_POST['password'])){
	 	if ($_POST['login']) {
 		$username=$_POST['username'];
		$password=$_POST['password'];
		 $check="SELECT * FROM Users WHERE username='".$username."' AND password='".$password."'";
		 $result=$conn->query($check);
		  if (mysqli_num_rows($result)>0) {
		 	setcookie('user',$username,time()+(86400*30),"/");
		 	$row=$result->fetch_assoc();
		 	if($row['username']=='admin'){
		 	header("Location: add.php");
		 	}else{
		 		header("Location: solve.php");
		 	}
		 }else{
		 	header("Location: login.php");
		 }
}
		elseif ($_POST['register']) {
 		$username=$_POST['username']; 		
 		$password=$_POST['password'];
 		$check="SELECT * FROM Users WHERE username='".$username."' AND password='".$password."'";
 		if (mysqli_num_rows($conn->query($check))>0) {
 			header("Location: login.php");
 		}else{
		$query="INSERT INTO Users(username,password)VALUES ('".$username."','".$password."')";
			$conn->query($query);
		$query1="SELECT * FROM Questions";
		$result1=$conn->query($query1);
		while($row=mysqli_fetch_assoc($result1)){
			$i=$row['number'];
		$query2="INSERT INTO results(userq)VALUES ('".$username.$i."')";
			$conn->query($query2);
		}
			setcookie('user',$username,time()+(86400*30),"/");
			header("Location: solve.php");
		}}} else{
			header("Location: login.php");
}
?>