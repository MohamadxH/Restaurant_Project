<?php include('partials/menu.php'); ?>


        <?php
        
        //check if id set or no
        if(isset($_GET['id']))
        {
            //Get all the data
            $id = $_GET['id'];

            //sql to get the selected food
            $sql2 = "SELECT*FROM `tbl_food` WHERE id=$id";

            //execute query
            $res2 = mysqli_query($con,$sql2);

            //row c
            $row2 = mysqli_fetch_assoc($res2);

            //get the s f
            $title = $row2['title'];
            $description = $row2['description'];
            $price = $row2['price'];
            $current_image = $row2['image_name'];
            $current_category = $row2['category_id'];
            $featured = $row2['featured'];
            $active = $row2['active'];

        }
        else
        {
            //redirect to manage food
            header('location:'.SiteUrl.'admin/manage-food.php');
        }
    
        ?>




    <div class="main-content">
        <div class="wrapper">
            <h1>Update Food</h1>

            <br><br>
         

            <form action="" method="POST" enctype="multipart/form-data">

                <table class="tbl-30">
                    <tr>
                        <td>Title:</td>
                        <td>
                            <input type="text" name="title" value="<?php echo $title; ?>">
                        </td>
                    </tr>

                    <tr>
                        <td>Description:</td>
                        <td>
                             <textarea name="description" cols="30" rows="5"><?php echo $description; ?></textarea>
                        </td>
                    </tr>

                    <tr>
                        <td>Price:</td>
                        <td>
                            <input type="number" name="price" value="<?php echo $price; ?>">
                        </td>
                    </tr>

                    <tr>
                    <td>Current Image:</td>
                        <td>
                        <?php  
                        
                        if($current_image =="")
                        {
                            //image not available
                          
                             //display message
                             echo "<div class='error'>Image Not Available. </div>";
                        }
                        else
                        {
                            //image available
                            ?>
                            <img src="<?php echo SiteUrl; ?>images/food/<?php echo $current_image;?>" width="120px" height="70px">
                            <?php
                        }

                    ?>
                        </td>
                    </tr>

                    <tr>
                    <td>Select New Image:</td>
                        <td>
                            <input type="file" name="image">
                        </td>
                    </tr>

                    <tr>
                    <td>Category:</td>
                        <td>
                            <select name="category">

                            <?php
                            ob_start();
                            //create query
                            $sql = "SELECT * FROM `tbl_category` WHERE active='Yes'";
                            //execute query
                            $res = mysqli_query($con,$sql);
                            //count rows
                            $count = mysqli_num_rows($res);
                            //check if category available or not
                            if($count>0)
                            {
                                //c available
                                while($row=mysqli_fetch_assoc($res))
                                {
                                    $category_title = $row['title'];
                                    $category_id = $row['id'];
                                   
                                   // echo "<option value='$category_id'>$category_title</option>";
                                   ?>

                                   <option <?php if($current_category==$category_id){echo "selected";} ?>  value="<?php echo $category_id; ?>"><?php echo $category_title; ?></option>

                                   <?php
                                }
                            }
                            else
                            {
                                // c not available
                                echo "<option value='0'>Category Not Available.</option>";
                            }

                        ob_end_flush();
                            ?>
                            </select>
                        </td>
                    </tr>

                    <tr>
                    <td>Featured:</td>
                        <td>
                            <input <?php if($featured=="Yes"){echo "checked";} ?> type="radio" name="featured" value="Yes">Yes
                            <input <?php if($featured=="No"){echo "checked";} ?> type="radio" name="featured" value="No">No
                        </td>
                    </tr>

                    <tr>
                    <td>Active:</td>
                        <td>
                            <input <?php if($active=="Yes"){echo "checked";} ?>  type="radio" name="active" value="Yes">Yes
                            <input <?php if($active=="No"){echo "checked";} ?> type="radio" name="active" value="No">No
                        </td>
                    </tr>

                    <tr>
                         <td colspan="2">
                            <input type="hidden" name="current_image" value="<?php echo $current_image;?>">
                            <input type="hidden" name="id" value="<?php echo $id; ?>">
                            <input type="submit" name="submit" value="Update Food" class="btn-secondary">
                        </td>
                    </tr>

     
                    </table>
                    </form>

<br><br>
         

                 <?php
                 
                         if(isset($_POST['submit']))
                         {
                            // echo "button clicked";
                            //1.get all the details from the form 
                            $id = $_POST['id'];
                            $title = $_POST['title'];
                            $description = $_POST['description'];
                            $price = $_POST['price'];
                            $current_image = $_POST['current_image'];
                            $category = $_POST['category'];
                            $featured = $_POST['featured'];
                            $active = $_POST['active'];


                            //2.upload the image if selected

                            //check if upload button clicked or not
                            if(isset($_FILES['image']['name']))
                            {
                                //upload btn clicked
                                $image_name = $_FILES['image']['name'];//new image name

                                //check if the file available or not
                                if($image_name!="")
                                {
                                    //image available
                                    //rename image
                                   

                                    $image_name =rand(0000,9999). $image_name;

                                    //get the source path and des path
                                    $src_path = $_FILES['image']['tmp_name'];
                                    $dest_path = "../images/food/".$image_name;

                                    //upload image
                                    $upload = move_uploaded_file($src_path, $dest_path);

                                    //check if image uploaded or not
                                    if($upload==false)
                                    {
                                        //failed to upload 
                                        $_SESSION['upload'] = "<div class='error'>Failed to upload new image</div>";
                                        //redirect to manage food page
                                        header('location:'.SiteUrl.'admin/manage-food.php');
                                        //stop the proccess
                                        die();
                                    }
                                       //3.remove the image if the image uploaded
                                    //delete current image if available
                                        if($current_image!="")
                                        {
                                            //current image is available
                                            //remove the image
                                            $remove_path ="../images/food/".$current_image;

                                            $remove = unlink($remove_path);
                                          

                                            //check if the image remove or not
                                            if($remove==false)
                                            {
                                                //failed to remove current image
                                                $_SESSION['remove-failed'] = "<div class='error'>Failed to remove current image.</div>";
                                                //redirect to manage food
                                                header('location:'.SiteUrl.'admin/manage-food.php');
                                                //stop proces
                                                die();
                                            }

                                        }

                                
                            }
                            else
                            {
                                $image_name = $current_image;
                            }
                        }?>
<?php

                            //4.update the food in database
                            $sql3 = "UPDATE tbl_food SET 
                            title = '$title',
                            description = '$description',
                            price = $price,
                            image_name = '$image_name',
                            category_id = '$category',
                            featured = '$featured',
                            active = '$active'
                            WHERE id=$id
                            ";
                         
                         //execute query
                         $res3 = mysqli_query($con,$sql3);

                         //check if querty work
                         if($res3==true)
                         {
                             
                             //updated
                            
                             $_SESSION['update-food'] = "<div class='success'>Food Updated Successfully.</div>";
                             echo "<div class='success'>Food updated Successfully.</div>";

                         }
                         else
                         {
                             //failed updated
                             $_SESSION['update-food'] = "<div class='error'>Failed to Update Food.</div>";
                             header('location:'.SiteUrl.'admin/manage-food.php');
                         }


                         }    
                     
                       
                            
                            
                         
                  ?>
                         

                    </div>
                    </div>


                    <?php include('partials/footer.php'); ?>
