<?php
session_start();
include "dbconnect.php";
if(isset($_POST['username']) && isset($_POST['password'])) {
	function validate($data){
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}
	
	$username = validate($_POST['username']);
	$password = validate($_POST['password']);
	
	if(empty($username)) {
		echo "Missing Username";
		exit();
	} else if(empty($password)) {
		echo "Missing Password";
		exit();
	} else {
		$sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";
		$result = mysqli_query($conn, $sql);
		if(mysqli_num_rows($result) === 1) {
			$row = mysqli_fetch_assoc($result);
			if($row['username']===$username && $row['password']===$password) {
				echo "Logged in";
				$_SESSION['username'] = $row['username'];
				$_SESSION['name'] = $row['name'];
				$_SESSION['id'] = $row['id'];
				header("Location: home.php");
				// To-Do: replace the above home.php with name of our homepage
				exit();
			} else {
				echo "Incorrect login credentials";
				exit();
			}
		} else {
			echo "Incorrect login credentials";
			exit();
		}
	}
} else {
	header("Location: login.html"); //default return case
	exit();
}