<?php
$servername="localhost";
$username="root";
$password="";
$dbname="p2_database";

$conn=mysqli_connect($servername, $username, $password, $dbname);
if($conn) {
	echo "Database Connection succeeded! ";
} else {
	echo "Database Connection failed" ;
}
?>