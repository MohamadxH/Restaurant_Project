<?php include('partials/menu.php') ?>

        <div class="main-content">
            <div class="wrapper">
            <h1>Update Category</h1>

            <br><br>

        <?php
        
        //check if id set or not
        if(isset($_GET['id']))
        {
            //get id and other details
            //echo "geting the data";
            $id = $_GET['id'];
            //create query to get other details
            $sql ="SELECT * FROM tbl_category WHERE id=$id";

            //execute query
            $res = mysqli_query($con,$sql);

            //count the rows to check if the id is valid or not
            $count = mysqli_num_rows($res);

            if($count==1)
            {
                //get all the data
                $row = mysqli_fetch_assoc($res);

                $title = $row['title'];
                $current_image = $row['image_name'];
                $featured = $row['featured'];
                $active = $row['active'];
            }
            else
            {
                //redirect to manage category
                $_SESSION['no-category-found'] = "<div class='error'>Category not Found.</div>";
                header('location:'.SiteUrl.'admin/manage-category.php'); 
            }
         }
        else
        {
            //redirect to manage c
            header('location:'.SiteUrl."admin/manage-category.php");
        }
        
        ?>

            <form action="" method="POST" enctype="multipart/form-data">
                <table class="tbl-30">

                <tr>
                    <td>Title: </td>
                    <td>
                        <input type="text" name="title" value="<?php echo $title;?>">
                    </td>
                </tr>

                <tr>
                    <td>Current Image: </td>
                    <td>
                        <?php  
                        
                            if($current_image!="")
                            {
                                //diplay the image
                                ?>
                                
                                <img src="<?php echo SiteUrl; ?>images/category/<?php echo $current_image;?>" width="160px" height="70px">

                                <?php
                            }
                            else
                            {
                                //display message
                                echo "<div class='error'>Image Not Available. </div>";
                            }

                        ?>
                    </td>
                </tr>

                <tr>
                    <td>New Image: </td>
                    <td>
                    <input type="file" name="image">
                    </td>
                </tr>



                <tr>
                   <td>Featured:</td>
                    <td>
                        <input <?php if($featured=="Yes"){ echo "Checked";} ?> type="radio" name="featured" value="Yes">Yes

                        <input <?php if($featured=="No"){ echo "Checked";} ?> type="radio" name="featured" value="No">No
                    </td>
                </tr>

                <tr>
                <td>Active:</td>
                    <td>
                        <input <?php if($active=="Yes"){ echo "Checked";} ?> type="radio" name="active" value="Yes">Yes  

                        <input <?php if($active=="No"){ echo "Checked";} ?> type="radio" name="active" value="No">No
                    </td>
                </tr>
                <tr>
                    <td clospan="2">
                        <input type="hidden" name="current_image" value="<?php echo $current_image;?>">
                        <input type="hidden" name="id" value="<?php echo $id;?>">
                        <input type="submit" name="submit" value="Update Category" class="btn-secondary">
                    </td>
                </tr>
                
                </table>
                </form>


                <?php
                
                if(isset($_POST['submit']))
                {
                    //echo "test";
                    //1.get all the value from  form
                    $id = $_POST['id'];
                    $title = $_POST['title'];
                    $current_image = $_POST['current_image'];
                    $featured = $_POST['featured'];
                    $active = $_POST['active'];

                    //2.updating new image if selected
                    //check if image is selected or not
                    if(isset($_FILES['image']['name']))
                    {
                        //get the image details
                        $image_name = $_FILES['image']['name'];

                        //check if image is avalable
                        if($image_name!="")
                        {
                             //A.auto rename our image
                //get the extension our image(j.p.png.gif.ect) 
                $ext = end(explode('.',$image_name));

                //rename the image if 2 image have same name
                $image_name = "Food_Category_".rand(000,999).'.'.$ext; //e.g. Food_Category_nbr.jpg

                $source_path = $_FILES['image']['tmp_name'];

                $destination_path = "../images/category/".$image_name;

                //upload image
                $upload = move_uploaded_file($source_path,$destination_path);

                //check if the image upload it or not
                if($upload==false)
                {
                    //set message 
                    $_SESSION['upload'] = "<div class='error'>Failed to Upload Image.</div>";
                    //redirect to add category
                    header('location:'.SiteUrl.'admin/manage-category.php');
                    //stop the procces
                    die();
                }

                      //B.remove current image if available
                      if($current_image!="")
                      {
                        $remove_path ="../images/category/".$current_image;

                        $remove = unlink($remove_path);

                        //check if the image is removed or not
                        //if failed to remove display message
                        if($remove==false)
                        {
                        //failed to remove image
                        $_SESSION['failed-remove'] = "<div class='error'>Failed to Remove Current Image.<div>";  
                        header('location:'.SiteUrl.'admin/manage-category.php');
                        die();//stop the procces  
                        }
                    }
                }
                  else
              {
                  //image not available
                  $image_name = $current_image;

                        }
                    }
                    else
                    {
                        $image_name = $current_image;
                    }

                    //3.update the database
                    $sql2 = "UPDATE `tbl_category` SET
                    title = '$title',
                    image_name='$image_name',
                    featured = '$featured',
                    active = '$active'
                    WHERE id=$id
                    ";

                    //execute the query
                    $res2 = mysqli_query($con,$sql2);


                    //4.redirect to manage c message
                    //check if query execut or not
                    if($res2==true)
                    {
                        //category updated
                        $_SESSION['update'] = "<div class='success'>Category Updated Successfully. </div>";
                        header('location:'.SiteUrl.'admin/manage-category.php');
                    }
                    else
                    {
                        //failed to update c
                        $_SESSION['update'] = "<div class='success'>Failed to Update Category. </div>";
                        header('location:'.SiteUrl.'admin/manage-category.php');
                    }

                    

                }
                
                ?>

            </div>
        </div>




<?php include('partials/footer.php') ?>