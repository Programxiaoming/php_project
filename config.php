<?php 
	session_start();
	$conn = mysqli_connect("localhost", "root", "", "php_blog");
	if (!$conn) {
		die("Error connecting to database: " . mysqli_connect_error());
	}
	define ('ROOT_PATH',realpath(dirname(__FILE__)));	
	define('BASE_URL', 'http://localhost/php_project/');
?>