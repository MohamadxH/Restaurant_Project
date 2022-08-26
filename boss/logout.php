<?php
//include connection
include('partials/connection.php');
//delete all the session
session_destroy();
//redirect to login
header('location:'.SiteUrl.'boss/login.php');
?>