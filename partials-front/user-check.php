
<?php
//check user is login or not
if(!isset($_SESSION['user-access']))//if user ssesion is not set
{
//user not login
$_SESSION['no-login-message'] = "<div class='error'>Pleas Login To Acces MHFood House.</div>";
//redirect to login pg
header('location:'.SiteUrl.'user-login.php');
}
?>