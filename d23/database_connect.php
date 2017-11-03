<?php
	//Connect to MYSQL
$host = "localhost";
$password = "root";
$user = "root";
$db = "d23";
$connect = mysqli_connect($host, $password, $user, $db);

//Test Connection
if(mysqli_connect_errno()){
	echo 'Failed to connect to MYSQL:'.mysqli_connect_error();
}