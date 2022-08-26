<?php include('partials-front/menu.php'); ?>

    <?php

        //check if id past or not
        if(isset($_GET['category_id']))
        {
            //catagory id isset
            $category_id = $_GET['category_id'];
            //get the category title based on category id
            $sql = "SELECT title FROM tbl_category WHERE id=$category_id";

            //execute query
            $res = mysqli_query($con,$sql);
            //get the value from database
            $row = mysqli_fetch_assoc($res);
            //get title
            $category_title = $row['title'];
        }
        else
        {
            //category not passed
            //redirect to home page
            header('location:'.SiteUrl);
        }

    ?>

    <!-- fOOD sEARCH Section Starts Here -->
    <section class="food-search text-center">
        <div class="container">
            
            <h2>Foods on <a href="#" class="text-white">"<?php echo $category_title; ?>"</a></h2>

        </div>
    </section>
    <!-- fOOD sEARCH Section Ends Here -->



    <!-- fOOD MEnu Section Starts Here -->
    <section class="food-menu">
        <div class="container">
            <h2 class="text-center">Food Menu</h2>

            <?php
            
            //create query to get food based on selected category
            $sql2 = "SELECT * FROM tbl_food WHERE category_id=$category_id";
            //execute the query
            $res2 = mysqli_query($con,$sql2);
            //count the row
            $count2 = mysqli_num_rows($res2);
            //check if food is available
            if($count2>0)
            {
                //food is available
                while($row2 = mysqli_fetch_assoc($res2))
                {
                    $id = $row2['id'];
                    $title = $row2['title'];
                    $price = $row2['price'];
                    $description = $row2['description'];
                    $image_name = $row2['image_name'];
                    ?>

                <div class="food-menu-box">
                <div class="food-menu-img">
                    <?php
                    
                    if($image_name=="")
                    {
                        //image not available
                        echo "<div class='error'>Image Not Available.</div>";
                    }
                    else
                    {
                        //image available
                        ?>

            <img src="<?php echo SiteUrl; ?>images/food/<?php echo $image_name;?>"class="img-responsive img-curve"  height="150px">

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

                    <a href="<?php echo SiteUrl; ?>order.php?food_id=<?php echo $id;?>" class="btn btn-primary">Order Now</a>
                </div>
            </div>

                    <?php
                }
            }
            else
            {
                //f not available
                echo "<div class='error'>Food Not Available.</div>";
            }

            ?>

            <div class="clearfix"></div>

            

        </div>

    </section>
    <!-- fOOD Menu Section Ends Here -->

    <?php include('partials-front/footer.php'); ?>