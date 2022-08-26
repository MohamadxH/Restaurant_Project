<?php
//include connection
include('admin/configue/connection.php');
//delete all the session
session_destroy();
//redirect to login
header('location:'.SiteUrl.'user-login.php');
?>