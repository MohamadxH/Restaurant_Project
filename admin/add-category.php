<?php include('partials/menu.php');?>

<div class="main-content">
    <div class="wrapper">
        <h1>Add Category<h1>
        <br><br>

        <?php
        
        if(isset($_SESSION['add']))
        {
            echo $_SESSION['add'];
            unset($_SESSION['add']);
        }

        if(isset($_SESSION['upload']))
        {
            echo $_SESSION['upload'];
            unset($_SESSION['upload']);
        }
        
        ?>
        <br>

        <!--add catagory form starts-->
        <form action="" method="POST" enctype="multipart/form-data">
            <table class="tbl-30">
                <tr>
                    <td>Title: </td>
                    <td>
                        <input type="text" name="title" placeholder="Category Title">
                    </td>
                </tr>

                <tr>
                    <td>Select Image: </td>
                    <td>
                    <input type="file" name="image">
                    </td>
                </tr>



                <tr>
                   <td>Featured:</td>
                    <td>
                        <input type="radio" name="featured" value="Yes">Yes
                        <input type="radio" name="featured" value="No">No
                    </td>
                </tr>

                <tr>
                <td>Active:</td>
                    <td>
                        <input type="radio" name="active" value="Yes">Yes                  
                        <input type="radio" name="active" value="No">No
                    </td>
                </tr>
                <tr>
                    <td clospan="2">
                        <input type="submit" name="submit" value="Add Category" class="btn-secondary">
                    </td>
                </tr>
            </table>
        </form>
         <!--add catagory form ends-->

        <?php
        
        //check submit btn if work or not 
        if(isset($_POST['submit']))
        {
           // echo "clicked";
           //1.get the value from form 
           $title=$_POST['title'];

           //for radio input tipe we need to check if the btn selected or not
           if(isset($_POST['featured']))
           {
               //get the value from form 
               $featured = $_POST['featured'];
           }
           else
           {
                //set default value
                $featured = "No";
           }


           if(isset($_POST['active']))
           {
                $active =$_POST['active'];
           }
           else
           {
               $active = "No";
           }


           //check image selected or not and set the value image name 
           //print_r($_FILES['image']);
           //die();//break the code
           if(isset($_FILES['image']['name']))
           {
                //upload the image
                $image_name = $_FILES['image']['name'];

                //upload the image only if image is selected
                if($image_name!="")
           {

           

                //auto rename our image
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
                    header('location:'.SiteUrl.'admin/add-category.php');
                    //stop the procces
                    die();

                }
            }
           }
           else
           {
               //dont upload it 
               $image_name="";
           }




           //2.create sql query to insert catagory in my database
           $sql = "INSERT INTO `tbl_category` SET
           title='$title',
           image_name='$image_name',
           featured='$featured',
           active='$active'
           ";

           //3.execute the query save in database
           $res = mysqli_query($con,$sql);

           //4.check query if work
           if($res==true)
           {
               //query executed and catagory added
               $_SESSION['add'] = "<div class='success'>Category Added Successfully.</div>";
               //redirect to manage category pg
               header('location:'.SiteUrl.'admin/manage-category.php');
           }
           else
           {
               //failed to add category
               $_SESSION['add'] = "<div class='error'>Failed to Add Category.</div>";
               //redirect to manage category pg
               header('location:'.SiteUrl.'admin/add-category.php');
           }
        }

        ?>

    </div>
</div>

<?php include('partials/footer.php');?>