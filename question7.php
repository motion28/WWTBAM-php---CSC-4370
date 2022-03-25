<?php
session_start();
if(isset($_SESSION['id']) && isset($_SESSION['username'])) {
	?>
<style>
	<?php include 'questions.css'; ?>
</style>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width">
	<title>Who Wants to Be a Millionaire </title>
	<link rel="stylesheet" href="style.css" />
</head>
<body>
	<?php
		$_SESSION["score"] = 100000;
	?>
			<div>
					<h1> Question 7:</h1>
					<h3>Player: <?php echo $_SESSION['name'];?></h3>
					<h3> Amount Earned </h3>
			</div>
		<?php
		 echo "<h3>" . "$" . $_SESSION['score']; "</h3>"
		?>
		<?php
		$random=rand(1,3);
		$list = fopen("questions/level7.txt", "r");
		while($line=fgets($list)){
			$part=explode("/", $line);
			if($part[0]==$random){
				$question=$part[1];
				$correct=$part[2];
				$a=$part[3];
				$b=$part[4];
				$c=$part[5];
				$d=$part[6];
			}
		}
		fclose($list);
		echo "<br>";
		echo"
			<div>
					<div>
						<h3 class =\"question\"> $question </h3>
					</div>
			</div>
		";
		if(strtoupper(rtrim($correct)) == strtoupper(rtrim($a))){
			echo "			
			<div>
				<div>
					<p class =\"questionA\"> <a href='question8.php'> $a </a></p>
					<p class =\"questionB\"> <a href='wrong.php'> $b </a> <p>
				</div>
				<div>
					<p class =\"questionC\"> <a href='wrong.php'> $c </a> </p>
					<p class =\"questionD\"> <a href='wrong.php'> $d </a><p>
				</div>
			</div>
		";
		}
		elseif(strtoupper(rtrim($correct)) == strtoupper(rtrim($b))){
			echo "
			
			<div>
				<div>
					<p class =\"questionA\"> <a href='wrong.php'> $a </a></p>
					<p class =\"questionB\"> <a href='question8.php'> $b </a> <p>
				</div>
				<div>
					<p class =\"questionC\"> <a href='wrong.php'> $c </a> </p>
					<p class =\"questionD\"> <a href='wrong.php'> $d </a><p>
				</div>
			</div>
		";
		}
		elseif(strtoupper(rtrim($correct)) == strtoupper(rtrim($c))){
			echo "
			
			<div>
				<div>
					<p class =\"questionA\"> <a href='wrong.php'> $a </a></p>
					<p class =\"questionB\"> <a href='wrong.php'> $b </a> <p>
				</div>
				<div>
					<p class =\"questionC\"> <a href='question8.php'> $c </a> </p>
					<p class =\"questionD\"> <a href='wrong.php'> $d </a><p>
				</div>
			</div>
		";
		}
		elseif(strtoupper(rtrim($correct)) == strtoupper(rtrim($d))){
			echo "
			
			<div>
				<div>
					<p class =\"questionA\"> <a href='wrong.php'> $a </a></p>
					<p class =\"questionB\"> <a href='wrong.php'> $b </a> <p>
				</div>
				<div>
					<p class =\"questionC\"> <a href='wrong.php'> $c </a> </p>
					<p class =\"questionD\"> <a href='question8.php'> $d </a><p>
				</div>
		";


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