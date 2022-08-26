<?php
//add connection.php
include('partials/connection.php');
// 1. get id of admin to be deleted
$id=$_GET['id'];
//2.create sql query to delete admin
$sql = "DELETE FROM tbl_manager WHERE id=$id";

//execute query
$res = mysqli_query($con,$sql);
//check the query executed succes or not
if($res=true)
{
    //admin succesfuly deletd
    //echo "Admin Deleted";
    //create session to display message
    $_SESSION['delete'] = "<div class='success'>Manager Deleted Successfully.</div>";
    //redirect to manage admin page 
    header('location:'.SiteUrl.'boss/manage-manager.php');
}
else
{
    //failed to delete it
   //echo "Failed To Delete Admin";
   $_SESSION['delete'] = "<div class='error'>Failed to Delete Manager. Try Again Later.</div>";
   header('location:'.SiteUrl.'boss/manage-manager.php');
}
//3.redirect to manage admin page with message (sussec or not)
?>