<?php 
include 'conn.php';
if ($_COOKIE['user']=='admin') {
	echo '<nav>
	<a href="solve.php">Questions</a>
	<a href="leaderboard.php">Leaderboard</a>
	<a href="add.php">Add Questions</a>
	<a href="viewques.php">View all available questions</a>
	<a href="logout.php" style="float: right;">Logout</a>
</nav>';
	$query="SELECT * FROM Questions";
	$result1=$conn->query($query);
	while ($row=mysqli_fetch_assoc($result1)) {
		echo "Q".$row['number']." ";
		echo $row['question']."<br>";
		echo "Option a)".$row['a']."<br>";
		echo "Option b)".$row['b']."<br>";
		echo "Option c)".$row['c']."<br>";
		echo "Option d)".$row['d']."<br>";
		echo "Correct option: ".$row['correct']."&nbsp;&nbsp;&nbsp;";
		echo "Points: ".$row['points']."<br>";
	}
}else{
	echo 'you aren\' allowed to view this';
}


 ?>