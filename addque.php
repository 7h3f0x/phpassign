<?php
include 'conn.php';
if ($_COOKIE['user']!='admin') {
	echo "you aren't authorised";
}else{
	$question=$_POST['question'];
	$a=addslashes($_POST['a']);
	$b=addslashes($_POST['b']);
	$c=addslashes($_POST['c']);
	$d=addslashes($_POST['d']);
	$correct=$_POST['correct'];
	$points=$_POST['points'];
	$query="INSERT INTO Questions(question,a,b,c,d,correct,points)VALUES ('".$question."','".$a."','".$b."','".$c."','".$d."','".$correct."',".$points.")";
	$conn->query($query);
	$ask="SELECT * FROM Questions where question='".$question."'";
	$res=$conn->query($ask);
	$res1=mysqli_fetch_assoc($res);
	$i=$res1['number'];
	$query2="SELECT * FROM Users";
	$result1=$conn->query($query2);
	while ($row=mysqli_fetch_assoc($result1)){
		$x= $row['username'];
$query1="INSERT INTO results (userq,q) VALUES ('".$x."','".$i."')";

	$conn->query($query1);
	}
	echo 'question added successfully';
}
?>