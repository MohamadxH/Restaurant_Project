<?php
//include connection file
include('configue/connection.php');
//echo "Delete page";
//check if the id and image name value is set or not

if(isset($_GET['id']) AND isset($_GET['image_name']))
{
    //get the value and delete it
    //echo "get value and delete";
    $id = $_GET['id'];
    $image_name = $_GET['image_name'];

    //1. remove the image file if avalable
    if($image_name!= "")
    {
        //image is avalable
        $path = "../images/category/".$image_name;
        //remove the image
        $remove = unlink($path);

        if($remove == false)
        {
            //set message
            $_SESSION['remove'] = "<div class='error'>Failed to Remove Category Image.</div>";
            //redirect to manage category page
            header('location:'.SiteUrl.'admin/manage-category.php');
            //stop the proccess
            die();
        }
    }
    //2.delete data from database query 
    $sql = "DELETE FROM `tbl_category` WHERE id=$id";

    //execute query
    $res=mysqli_query($con,$sql);

    //check if the data deleted from database
    if($res==true)
    {
        //set succes massage
        $_SESSION['delete'] = "<div class='success'>Category Deleted Successfully.</div>";
         //redirect
         header('location:'.SiteUrl.'admin/manage-category.php');
    }
    else
    {
        //set failed message
        $_SESSION['delete'] = "<div class='success'>Category Deleted Failed.</div>";
        //redirect
        header('location:'.SiteUrl.'admin/manage-category.php');
    }

    //redirect massage to manage page 
}
else
{
    //redirect to manage c pg
    header('location:'.SiteUrl.'admin/manage-category.php');

}
?>