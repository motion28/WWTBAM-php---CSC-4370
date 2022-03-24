<style>
<?php include 'questions.css'; ?>
</style>
<?php
	 $score='Score';
	 setcookie($score);
	 ?>
	<?php
		$_COOKIE['Score']=00;

	?>
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
		$money= ++$_COOKIE['Score']+49999;
		echo "
			<div>
					
					<h3> Amount Earned </h3>
					<h3> $$money</h3>
			</div>
		";
		$random=rand(1,3);
		$list = fopen("questions/level6.txt", "r");
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
				<h1> Question 6:</h1>
					<div>
						<h3 class =\"question\"> $question </h3>
					</div>
			</div>
		";
		if(strtoupper(rtrim($correct)) == strtoupper(rtrim($a))){
			echo "			
			<div >
				<div>
					<p class =\"questionA\"> <a href='question7.php'> $a </a></p>
					<p class =\"questionB\"> <a href='wrong.html'> $b </a> <p>
				</div>
				<div>
					<p class =\"questionC\"> <a href='wrong.html'> $c </a> </p>
					<p class =\"questionD\"> <a href='wrong.html'> $d </a><p>
				</div>
			</div>
		";
		}
		elseif(strtoupper(rtrim($correct)) == strtoupper(rtrim($b))){
			echo "
			
			<div >
				<div>
					<p class =\"questionA\"> <a href='wrong.html'> $a </a></p>
					<p class =\"questionB\"> <a href='question7.php'> $b </a> <p>
				</div>
				<div>
					<p class =\"questionC\"> <a href='wrong.html'> $c </a> </p>
					<p class =\"questionD\"> <a href='wrong.html'> $d </a><p>
				</div>
			</div>
		";
		}
		elseif(strtoupper(rtrim($correct)) == strtoupper(rtrim($c))){
			echo "
			
			<div >
				<div>
					<p class =\"questionA\"> <a href='wrong.html'> $a </a></p>
					<p class =\"questionB\"> <a href='wrong.html'> $b </a> <p>
				</div>
				<div>
					<p class =\"questionC\"> <a href='question7.php'> $c </a> </p>
					<p class =\"questionD\"> <a href='wrong.html'> $d </a><p>
				</div>
			</div>
		";
		}
		elseif(strtoupper(rtrim($correct)) == strtoupper(rtrim($d))){
			echo "
			
			<div >
				<div>
					<p class =\"questionA\"> <a href='wrong.html'> $a </a></p>
					<p class =\"questionB\"> <a href='wrong.html'> $b </a> <p>
				</div>
				<div>
					<p class =\"questionC\"> <a href='wrong.html'> $c </a> </p>
					<p class =\"questionD\"> <a href='question7.php'> $d </a><p>
				</div>
		";


		}
	?>

</body>
</html>