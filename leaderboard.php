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
}else{
	echo '<nav>
	<a href="solve.php">Questions</a>
	<a href="leaderboard.php">Leaderboard</a>
	<a href="logout.php" style="float: right;">Logout</a>
</nav>';
}
	echo "<h1>Leaderboard</h1>";
	$i=1;
	$query='SELECT * FROM Users ORDER BY points DESC';
	$result=$conn->query($query);

	echo "<table>";
	echo "<tr>";
	echo "<th>Rank</th>";
	echo "<th>Name</th>";
	echo "<th>Points</th>";
	echo "</tr>";
	while ($row=mysqli_fetch_assoc($result)) {
		if ($row['username']!='admin') {
			echo "<tr>";
			echo "<td>".$i."</td>";
			echo "<td>".$row['username']."</td>";
			echo "<td>".$row['points']."</td>";
			echo "</tr>";
			$i++;
		}
	}
	echo "</table>"

?>