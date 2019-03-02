<?php
include 'conn.php';
$username=$_COOKIE['user'];
if ($username=='admin') {
	echo '<nav>
	<a href="solve.php">Questions</a>
	<a href="leaderboard.php">Leaderboard</a>
	<a href="add.php">Add Questions</a>
	<a href="viewques.php">View all available questions</a>
	<a href="logout.php" style="float: right;">Logout</a>
</nav>';
}else{
	echo '<nav>
	<a href="solve.php">Questions</a>
	<a href="leaderboard.php">Leaderboard</a>
	<a href="logout.php" style="float: right;">Logout</a>
</nav>';
}
$user=$conn->query("SELECT * from Users where username='".$username."'");
$info=mysqli_fetch_assoc($user);
echo "Your Points : ".$info['points']."<br>";
 $ask="SELECT * FROM results";
	$res=$conn->query($ask);
	$result=mysqli_fetch_assoc($res);
	$query="SELECT * FROM Questions";
	$result1=$conn->query($query);
	$count=0;
while ($row=mysqli_fetch_assoc($result1)) {
	$i=$row['number'];
	$ask="SELECT * FROM results WHERE userq='".$username.$i."'";
	$res=$conn->query($ask);
	$result=mysqli_fetch_assoc($res);
	//var_dump($result);
	if ($result['status']=='not-answered') {
	echo '<form method="POST" action="eval.php">';
	echo '<input type="hidden" name="number" value="'.$i.'">';
	echo 'Question'.$i.'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
	echo 'Points'.$row['points'].'<br>';
	echo '&nbsp;&nbsp;&nbsp;'.$row['question']."<br>";
	echo "Option a)<input type='radio' name='option' value='a'>".$row['a']."<br>";
	echo "Option b)<input type='radio' name='option' value='b'>".$row['b']."<br>";
	echo "Option c)<input type='radio' name='option' value='c'>".$row['c']."<br>";
	echo "Option d)<input type='radio' name='option' value='d'>".$row['d']."<br>";
	echo "<input type='submit' value='answer'>";
	echo '</form><br><br>';
	$count++;
}

}
if ($count===0) {
	echo 'You have attempted all available questions';
}
  ?>