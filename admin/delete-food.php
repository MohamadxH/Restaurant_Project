<?php
        //include connection
        include('configue/connection.php');
        //echo "delete page";


        if(isset($_GET['id']) && isset($_GET['image_name']))
        {
            //delete
           // echo "procces deleted";

           //1.get the id and image
           $id = $_GET['id'];
           $image_name =$_GET['image_name'];

           //2.remove the image if available
           if($image_name!="")
           {
                // if has we need to delete it from folder
                $path = "../images/food/".$image_name;

                //remove image file from folder
                $remove = unlink($path);

                //the image susseccfully deleted??
                if($remove == false)
                {
                    //failed to remove image
                    $_SESSION['upload'] = "<div class='error'>Failed to Remove Image File.</div>";
                    //redirect to manage food
                    header('location:'.SiteUrl.'admin/manage-food.php');
                    //stop the procces delete
                    die();
                }
           }


           //3.delete food from database
           $sql = "DELETE FROM tbl_food WHERE id=$id";
           //execute query
           $res = mysqli_query($con,$sql);

           //check if the query executed or not and send msg
           if($res==true)
           {
               //food deleted
               $_SESSION['delete'] = "<div class='success'>Food Deleted Successfully.</div>";
               header('location:'.SiteUrl.'admin/manage-food.php');
           }
           else
           {
               //failed to delete food
               $_SESSION['delete'] = "<div class='error'>Failed To Delete Food.</div>";
               header('location:'.SiteUrl.'admin/manage-food.php');
           }

           //4.redirect to manage food +seesion msg
        }
        else
        {
            //redirect to manage page
            //echo "Redirect";
            $_SESSION['unauthorize'] = "<div class='error'>Unauthorized Access.</div>";
            header('location:'.SiteUrl.'admin/manage-food.php');
        }



?>