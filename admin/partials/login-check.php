<?php
//check user is login or not
if(!isset($_SESSION['user']))//if user ssesion is not set
{
//user not login
$_SESSION['no-login-message'] = "<div class='error'>Pleas Login To Acces Manager Panel.</div>";
//redirect to login pg
header('location:'.SiteUrl.'admin/login.php');
}
?>