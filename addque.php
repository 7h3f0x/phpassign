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
	// $query1="ALTER TABLE results ADD q".$i." VARCHAR(64) NOT NULL DEFAULT 'unanswered'";
	$query2="SELECT * FROM Users";
	$result1=$conn->query($query2);
	while ($row=mysqli_fetch_assoc($result1)){
		$x= $row['username'].$i;
		// echo $x;
$query1="INSERT INTO results (userq) VALUES ('".$x."')";
// var_dump($query1);
// die();

	if($conn->query($query1)){
		echo "Ez";
	} else {
		echo "Error ".$conn->error;
		die();
	}
	}
	echo 'question added successfully';
}
?>