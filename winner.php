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
		$money= ++$_COOKIE['Score']+999999;
		echo "
			<div>
					<h1> Congratulations! You Have Won! </h1>
					<h3> Amount Earned </h3>
					<h3> $$money</h3>
			</div>
		";
    ?>

</body>
</html>