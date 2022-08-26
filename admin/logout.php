<?php
//include connection
include('configue/connection.php');
//delete all the session
session_destroy();
//redirect to login
header('location:'.SiteUrl.'admin/login.php');
?>