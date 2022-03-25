<?php
session_start();
if(isset($_SESSION['id']) && isset($_SESSION['username'])) {
	?>
<style>
	<?php include 'winner.css'; ?>
</style>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width">
	<title>Winner </title>
	<link rel="stylesheet" href="winner.css" />
</head>
<body>
	<?php
		$_SESSION["score"] = 1000000;
	?>
	<?php
		echo "
			<img src=\"logo.png\">
			<div class=\"winner\">
				
					<h1 > Congratulations! You Have Won! </h1>
					<br>
					<h3> Amount Earned </h3>
					<h3>  $  $_SESSION[score] </h3>
					<a href=\"home.php\">Return to Homepage</a>
        			<br>
					<a href=\"hiscore.php\">Check High Scores</a>
					<br>
        			<a href=\"logout.php\">Logout</a>
			</div>
		";
    ?>
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
	
	
    ?>

</body>
</html>
<?php
} else {
	header("Location: login.php");
	exit();
}
?>