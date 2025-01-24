<?php

$server_name = "localhost";
$user_name = 'root';
$user_pass = '';
$database_name = "freq_users";

$con = mysqli_connect($server_name, $user_name, $user_pass, $database_name);

if(!$con){
    die ('Connection Failed!' . mysql_error());
}
?>