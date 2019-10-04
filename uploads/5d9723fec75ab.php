<?php
$dbserver = 'localhost';
$dbuser = 'root';
$dbpassword = '';
$dbname = 'users';

$conn = mysqli_connect($dbserver, $dbuser, $dbpassword, $dbname);

if(!$conn)
{
	die("Some Error".mysqli_connect_error());
}

?>