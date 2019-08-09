<?php  
	$servername="172.28.128.4";
	$username ="root";
	$password ="";
	$dbname="blog";
	$conn = mysqli_connect($servername, $username, $password, $dbname) or die("loi");
	mysqli_set_charset($conn,"utf8");
?>

