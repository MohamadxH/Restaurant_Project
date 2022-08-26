<?php
//start session
session_start();

//create connection betweeb data base and form
define('SiteUrl','http://localhost/restaurant1/');
define('localhost','localhost');
define('db_username','root');
define('db_password','');
define('db_name','restaurant');

$con = mysqli_connect(localhost,db_username,db_password) or die(mysqli_error());
$db_select = mysqli_select_db($con,db_name) or die(mysqli_error());
?>