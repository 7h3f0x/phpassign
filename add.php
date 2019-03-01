<?php
include 'conn.php';
if($_COOKIE['user']=='admin'){
	echo '<nav>
	<a href="solve.php">Questions</a>
	<a href="leaderboard.php">Leaderboard</a>
	<a href="add.php">Add Questions</a>
	<a href="viewques.php">View all available questions</a>
	<a href="logout.php" style="float: right;">Logout</a>
</nav>';
echo '<form action="addque.php" method="POST">
	<span style="float:left;">Question:</span><textarea style="width:100%,height:50%;float:left;" name="question"></textarea><br><br>
	Option a)<input type="text" name="a"><br>
	Option b)<input type="text" name="b"><br>
	Option c)<input type="text" name="c"><br>
	Option d)<input type="text" name="d"><br>
	Correct <input type="text" name="correct"><br>
	Points<input type="text" name="points"><br>
	<input type="submit" name="add">
</form>';
}
else{
	echo "You aren't authorised to do this";
}
?>