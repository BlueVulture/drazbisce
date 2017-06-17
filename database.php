<?php
$db_user ='root';
$db_pass = '';
$db_name = 'drazbisce';
$db_server = 'localhost';

$conn = mysqli_connect($db_server, $db_user, $db_pass);

$db = mysqli_select_db($conn, $db_name);

$query = mysqli_query($conn, "SET NAMES 'utf8'");
?>
