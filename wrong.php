<?php
session_start();
if(isset($_SESSION['id']) && isset($_SESSION['username'])) {
	?>
    <style>
	    <?php include 'winner.css'; ?>
    </style>
	<!DOCTYPE html>
	<html>
	<head>
		<title>Wrong</title>
	</head>
	<body>
    <img src="logo.png">
    <div class="winner">

		<h1>Wrong Answer. Better luck next time!</h1>
        <a href="home.php">Return to Homepage</a>
        <br>
        <a href="logout.php">Logout</a>
    </div>

        <?php
		include "dbconnect.php";

        $username = $_SESSION['username'];
        $score = $_SESSION['score'];

        $sql = "SELECT hiscore FROM users WHERE username='$username'";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        $userhiscore = $row['hiscore'];

        if ($score > $userhiscore) {
        $sql = "UPDATE users SET hiscore='$score' WHERE username='$username'";
        $result = mysqli_query($conn, $sql);
        }
}
	
		
	
    ?>

	</body>
    </html>