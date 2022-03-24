<?php
	 $score='Score';
	 setcookie($score);
	 ?>
	<?php
		$_COOKIE['Score']=0;

	?>
<style>
	<?php include 'winner.css'; ?>
</style>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width">
	<title>Who Wants to Be a Millionaire </title>
	<link rel="stylesheet" href="winner.css" />
</head>
<body>
	<?php
		$money= ++$_COOKIE['Score']+999999;
		echo "
			<img src=\"logo.png\">
			<div class=\"winner\">
				
					<h1 > Congratulations! You Have Won! </h1>
					<br>
					<h3> Amount Earned </h3>
					<h3> $$money</h3>
			</div>
		";
    ?>

</body>
</html>