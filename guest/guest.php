<?php include('../admin/configue/connection.php');?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <!-- Important to make website responsive -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restaurant Website</title>

    <!-- Link our CSS file -->
    <link rel="stylesheet" href="../css/style.css">
</head>

<body>
    <!-- Navbar Section Starts Here -->
    <section class="navbar">
        <div class="container">
            <div class="logo">
                <a href="#" title="Logo">
                    <img src="../images/logo14.png" alt="Restaurant Logo" class="img-responsive" >
                </a>
            </div>

            <div class="menu text-right">
                <ul>
                    <li>
                        <a href="<?php echo SiteUrl."guest/guest.php" ?>">Home</a>
                    </li>
                    <li>
                        <a href="<?php echo SiteUrl; ?>">Categories</a>
                    </li>
                    <li>
                        <a href="<?php echo SiteUrl; ?>">Foods</a>
                    </li>
                    <li>
                        <a href="<?php echo SiteUrl; ?>">Order</a>
                    </li>
                    <li>
                        <a href="<?php echo SiteUrl."guest/contact-us.php" ?>">Contact</a>
                    </li>
                   
                   
                  
                </ul>
            </div>

            <div class="clearfix"></div>
        </div>
    </section>
    <!-- Navbar Section Ends Here -->



    <!-- fOOD sEARCH Section Starts Here -->
    <section class="food-search text-center">
        <div class="container">
            
            <form action="<?php SiteUrl;?> food-search.php" method="POST" >
                <input type="search" name="search" placeholder="Search for Food.." required>
                <input type="submit" name="submit" value="Search" class="btn btn-primary">
            </form>

        </div>
    </section>
    <!-- fOOD sEARCH Section Ends Here -->

      

    <!-- CAtegories Section Starts Here -->
    <section class="categories">
        <div class="container">
            <h2 class="text-center">Explore Foods</h2>

        <?php  
            //create sql query to display from database
            $sql = "SELECT * FROM `tbl_category` WHERE active='Yes' And featured='Yes' LIMIT 3";
            //execute query
            $res = mysqli_query($con,$sql);
        

            //count the row
            $count = mysqli_num_rows($res);

            if($count>0)
            {
                //categories availables
                while($row = mysqli_fetch_assoc($res))
                {
                    //get the value 
                    $id = $row['id'];
                    $title = $row['title'];
                    $image_name = $row['image_name'];
                    ?>

            <a href="<?php echo SiteUrl; ?>">
            <div class="box-3 float-container">
                <?php 
                //check if image is available
                if($image_name=="")
                {
                    //display message
                    echo "<div class=='error'>Image Not Available</div>";
                }
                else
                {
                    //image available
                    ?>
             <img src="<?php echo SiteUrl; ?>images/category/<?php echo $image_name;?>"class="img-responsive img-curve"  height="400px">

                    <?php
                }
                
                ?>

                <h3 class="float-text text-white"><?php echo $title; ?></h3>
            </div>
            </a>

                    <?php
                }
            }
            else
            {
                //category not available
                echo "<div class='error'>Category not Added.</div>";
            }
                
        
        
        ?>


           


            <div class="clearfix"></div>
        </div>
    </section>
    <!-- Categories Section Ends Here -->

    <!-- Food MEnu Section Starts Here -->
    <section class="food-menu">
        <div class="container">
            <h2 class="text-center">Food Menu</h2>

            <?php 
            
            // getting food from database that are active and featured
            //query
            $sql2 = "SELECT * FROM `tbl_food` WHERE active='Yes' And featured='Yes' LIMIT 6";

            //EXECUTE QUERY
            $res2 = mysqli_query($con,$sql2);
            //count rows
            $count2 = mysqli_num_rows($res2);

            //check if food available or not
            if($count2>0)
            {
                //food available
                while($row = mysqli_fetch_assoc($res2))
                {
                    //get all the value
                    $id=$row['id'];
                    $title=$row['title'];
                    $price=$row['price'];
                    $description=$row['description'];
                    $image_name = $row['image_name'];
                    ?>

                <div class="food-menu-box">
                <div class="food-menu-img">
                        <?php
                        
                        //check if image available or not
                        if($image_name=="")
                        {
                            //image not available
                            echo "<div class='error'>Image Not Available.</div>";
                        }
                        else
                        {
                            //image available
                            ?>

                        <img src="<?php echo SiteUrl; ?>images/food/<?php echo $image_name;?>"  class="img-responsive img-curve" height="150px">


                            <?php
                        }
                        
                        ?>
                    </div>

                    <div class="food-menu-desc">
                        <h4><?php echo $title; ?></h4>
                        <p class="food-price">$<?php echo $price; ?></p>
                        <p class="food-detail">
                            <?php echo $description; ?>
                        </p>
                        <br>

                        <a href="<?php echo SiteUrl; ?>" class="btn btn-primary">Order Now</a>
                        
                </div>
            </div>

                    <?php
                }
            }
            else
            {
                //food not available
                echo "<div class='error'>Food Not Available.</div>";
            }
            ?>

            

            <div class="clearfix"></div>

            

        </div>

        <p class="text-center">
            <a href="http://localhost/restaurant/foods.php">See All Foods</a>
        </p>
    </section>
    <!-- fOOD Menu Section Ends Here -->




 <!-- social Section Starts Here -->
 <section class="social">
        <div class="container text-center">
            <ul>
                <li>
                    <a href="#"><img src="https://img.icons8.com/fluent/50/000000/facebook-new.png"/></a>
                </li>
                <li>
                    <a href="#"><img src="https://img.icons8.com/fluent/48/000000/instagram-new.png"/></a>
                </li>
                <li>
                    <a href="#"><img src="https://img.icons8.com/fluent/48/000000/twitter.png"/></a>
                </li>
            </ul>
        </div>
    </section>
    <!-- social Section Ends Here -->

    <!-- footer Section Starts Here -->
    <section class="footer">
        <div class="container text-center">
            <p>All rights reserved. Designed By <a href="../my-profile/index.php">Mohamad Harmouche</a></p>
        </div>
    </section>
    <!-- footer Section Ends Here -->

</body>
</html>