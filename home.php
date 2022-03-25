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
		<h1>Hello, <?php echo $_SESSION['name'];?></h1>
	<div class="bubble">	<a href="question1.php">Start the Game!</a></div><br>
	<div class="bubble">	<a href="hiscore.php">Display High Scores</a></div><br>
	<div class="bubble">	<a href="logout.php">Logout</a></div><br>
	</body>
	</html>
	<?php
} else {
	header("Location: login.php");
	exit();
}
?>