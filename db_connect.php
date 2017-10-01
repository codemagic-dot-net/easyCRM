<?php

$user_message_mysqli_error = "Database Connection Failed"; 
$host_name = "db551470357.db.1and1.com"; 
$database = "db551470357"; 
$user_name = "dbo551470357"; 
$password = "23420247365"; 

$connection = mysqli_connect($host_name, $user_name, $password, $database); 

if (!$connection){ die($user_message_mysqli_error. mysqli_error($connection));}
if(mysqli_connect_errno()) { echo mysqli_connect_error(); } 
$select_db = mysqli_select_db($connection, $database);

if (!$select_db){die($user_message_mysqli_error. mysqli_error($connection));}


?>



