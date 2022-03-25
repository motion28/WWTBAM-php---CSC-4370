<?php
session_start();
if(isset($_SESSION['id']) && isset($_SESSION['username'])) {
	?>
	<!DOCTYPE html>
	<html>
	<head>
	<style>
	<?php include 'home.css'; ?>
</style>
	<link rel="stylesheet" href="home.css" />
		<title>Homepage</title>
	</head>
	<body>
		<h1>Current High Scores:</h1>
		<?php
		include "dbconnect.php";
		$sql = "SELECT * FROM users ORDER BY hiscore DESC LIMIT 10;";
		$result = mysqli_query($conn, $sql);
		
		if (mysqli_num_rows($result) > 0) {
			$position = 1;
			while($row = mysqli_fetch_assoc($result)) {
				echo nl2br("<p class =\"list\">" . $position . ". " . $row['name'] . " - " . $row['hiscore'] . "\n</p>");
				$position = $position+1;
			}
		} else {
			echo "No high scores set atm.";
		}
		?>
	<p class ="list">	<a href="home.php">Return to Homepage</a></p>
	</body>
	</html>
	<?php
} else {
	header("Location: login.php");
	exit();
}
?>