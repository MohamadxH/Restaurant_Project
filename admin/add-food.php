<?php include('partials/menu.php') ;?>


    <div class="main-content">
        <div class="wrapper">
            <h1>Add Food</h1>

            <br><br>

            <?php
                if(isset($_SESSION['upload']))
                {
                    echo $_SESSION['upload'];
                    unset($_SESSION['upload']);
                }
            ?>

            <form action="" method="POST" enctype="multipart/form-data">

                <table class="tbl-30">
                    <tr>
                        <td>Title:</td>
                        <td>
                            <input type="text" name="title" placeholder="Title Of The Food">
                        </td>
                    </tr>

                    <tr>
                        <td>Description:</td>
                        <td>
                             <textarea name="description" cols="30" rows="5" placeholder="Description Of The Food"></textarea>
                        </td>
                    </tr>

                    <tr>
                        <td>Price:</td>
                        <td>
                            <input type="number" name="price">
                        </td>
                    </tr>

                    <tr>
                    <td>Select Image:</td>
                        <td>
                            <input type="file" name="image">
                        </td>
                    </tr>

                    <tr>
                    <td>Category:</td>
                        <td>
                            <select name="category">


                            <?php
                            
                            //display category from database
                            //1.create xql to get all active catagory from database
                            $sql = "SELECT * FROM `tbl_category` WHERE active='Yes'";

                            //execute query
                            $res = mysqli_query($con,$sql);

                            //count rows to check if we have categories or not
                            $count = mysqli_num_rows($res);

                            //if count>0 we have category else do not have
                            if($count>0)
                            {
                                //have category
                                while($row=mysqli_fetch_assoc($res))
                                {
                                    //get the data from category
                                    $id = $row['id'];
                                    $title = $row['title'];
                                    ?>

                                    <option value="<?php echo $id;?>"><?php echo $title;?></option>

                                    <?php

                                }
                            }
                            else
                            {
                                //do not have category
                                ?>
                                 <option value="0">No Category Found</option>
                                <?php
                            }

                            //2.display on dropbox
                            
                            ?>
                            </select>
                        </td>
                    </tr>

                    <tr>
                    <td>Featured:</td>
                        <td>
                            <input type="radio" value="Yes" name="featured">Yes
                            <input type="radio" value="No" name="featured">No
                        </td>
                    </tr>

                    <tr>
                    <td>Actiive:</td>
                        <td>
                            <input type="radio" value="Yes" name="active">Yes
                            <input type="radio" value="No" name="active">No
                        </td>
                    </tr>

                    <tr>
                        <td colspan="2">
                            <input type="submit" name="submit" value="Add Food" class="btn-secondary">
                        </td>
                    </tr>


                </table>
                
            
            </form>


                <?php
                
                //check if the btn is clicked or not
                if(isset($_POST['submit']))
                {
                    //echo "hello";
                    //add the food in database
                    //1.get the data from form 
                    $title = $_POST['title'];
                    $description = $_POST['description'];
                    $price = $_POST['price'];
                    $category = $_POST['category'];

                    //check if radio btn active featured checked or not
                    if(isset($_POST['featured']))
                    {
                        $featured = $_POST['featured'];
                    }
                    else
                    {
                        $featured = "No";//seting the default value
                    }
                    if(isset($_POST['active']))
                    {
                        $active = $_POST['active'];
                    }
                    else
                    {
                        $active = "No";//seting the default value
                    }

                    //2.upload the image if selected
                    //check if the select image if clicked or not and upload the image only if the image is selected
                    if(isset($_FILES['image']['name']))
                    {
                        //get the details of the selected image
                        $image_name = $_FILES['image']['name'];

                        //check if the image is selected or not and upload image only if selected
                        if($image_name!="")
                        {
                            //image is selected
                            //A.rename the image
                            //get the extention of selected image jpg gif png 
                            $ext = end(explode('.',$image_name));

                            //create new name for image
                            $image_name = "Food_Name_".rand(000,999).'.'.$ext;//new image name 
                            //B.upload the image
                            //get the path
                            $src = $_FILES['image']['tmp_name'];

                            //get destination path
                            $dst ="../images/food/".$image_name;

                            //upload image 
                            $upload = move_uploaded_file($src,$dst);

                            //check if image uploaded or not
                            if($upload==false)
                            {
                                //failed to upload image
                                //redirect to add food msg
                                $_SESSION['upload'] = "<div class='error'>Failed to Upload Image.</div>";
                                header('location:',SiteUrl.'admin/add-food.php');
                                //stop the procces
                                die();
                            }
                        }
                    }
                    else
                    {
                        $image_name ="";//set default value as blank
                    }

                    //3.insert the data into database

                    //create sql query to save or add food
                    $sql2 ="INSERT INTO tbl_food SET
                    title = '$title',
                    description = '$description',
                    price = $price,
                    image_name = '$image_name',
                    category_id = $category,
                    featured = '$featured',
                    active = '$active'
                    " ;

                    //execute query
                    $res2 = mysqli_query($con,$sql2);

                    //check if data inserted or not
                    //4.redirect meesage to m-food
                    if($res2==true)
                    {
                        //data insert sussess
                        $_SESSION['add'] = "<div class='success'>Food Added Successfully.</div>";
             
                        header('location:'.SiteUrl.'admin/manage-food.php');
                    }
                    else
                    {
                        //failed to insert data
                        $_SESSION['add'] = "<div class='error'>Failed to Add Food.</div>";
                        
                        header('location:'.SiteUrl.'admin/manage-food.php');
                    } 

                }
                
                ?>


        </div>
    </div>


<?php include('partials/footer.php'); ?>