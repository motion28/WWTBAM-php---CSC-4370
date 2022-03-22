<?php
session_start();
include 'dbconnect.php';

$username = mysqli_real_escape_string($conn, $_REQUEST['username']);
$password = mysqli_real_escape_string($conn, $_REQUEST['password']);
$name = mysqli_real_escape_string($conn, $_REQUEST['name']);
	
if(empty($username)) {
	echo "Missing Username";
	exit();
} else if(empty($password)) {
	echo "Missing Password";
	exit();
} else if(empty($name)) {
	echo "Missing Nickname";
	exit();
} else {
	$sql = "SELECT * FROM users WHERE username='$username'";
	$result = mysqli_query($conn, $sql);
	$userexists = mysqli_num_rows($result);
	
	if($userexists == 0) {
		$hash = password_hash($password, PASSWORD_DEFAULT);
		
		$sql = "INSERT INTO users (username, password, name) VALUES ('$username', '$password', '$name');";
		$result = mysqli_query($conn, $sql);
		
		if($result) {
			header("Location: login.php");
			exit();
		} else {
			echo "Database not updated. Please try again.";
			exit();
		}
	} else {
		echo "User already exists.";
		exit();
	}
}
	