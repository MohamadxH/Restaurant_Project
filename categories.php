<?php include('partials-front/menu.php'); ?>



    <!-- CAtegories Section Starts Here -->
    <section class="categories">
        <div class="container">
            <h2 class="text-center">Explore Foods</h2>

            <?php
            
                //display all the categori that are active
                //sql query
                $sql = "SELECT * FROM `tbl_category` WHERE active='Yes'";

                //execure the query
                $res = mysqli_query($con,$sql);
                //count rowss
                $count = mysqli_num_rows($res);
                //check if category available
                if($count>0)
                {
                    //category available
                    while($row=mysqli_fetch_assoc($res))
                    {
                        //get all the data
                        $id = $row['id'];
                        $title = $row['title'];
                        $image_name = $row['image_name'];

                        ?>

                    <a href="<?php echo SiteUrl; ?>category-foods.php?category_id=<?php echo $id; ?>">
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
             <img src="<?php echo SiteUrl; ?>images/category/<?php echo $image_name;?>"class="img-responsive img-curve"  height="450px">

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
                    //category is not available
                    echo "<div class='error'>Category not Found.</div>";
                }
            ?>


           

            
            <div class="clearfix"></div>
        </div>
    </section>
    <!-- Categories Section Ends Here -->


    
    <?php include('partials-front/footer.php'); ?>