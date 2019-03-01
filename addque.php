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
	$ask="SELECT * FROM results";
	$res=$conn->query($ask);
	$i=mysqli_num_fields($res);
	$query1="ALTER TABLE results ADD q".$i." VARCHAR(64) NOT NULL DEFAULT 'unanswered'";
	$conn->query($query1);
	echo 'question added successfully';
}
?>