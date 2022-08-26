<?php include('partials-front/menu.php'); ?>


        
        <?php

            //check if food id is set or not
            if(isset($_GET['food_id']))
            {
                //Get the food id and details of the selected food
                $food_id = $_GET['food_id'];
                //Get the data for selected food
                $sql = "SELECT*FROM tbl_food WHERE id=$food_id";
                //execute the query
                $res = mysqli_query($con,$sql);
                //count the rows\
                $count = mysqli_num_rows($res);
                //check if the data is available or not
                if($count == 1)
                {
                    //we have data
                    //get the data from database
                    $row = mysqli_fetch_assoc($res);
                    $title = $row['title'];
                    $price = $row['price'];
                    $image_name = $row['image_name'];
                }
                else
                {
                    //food not available
                    //redirect to home page
                    header('location:'.SiteUrl);
                }
            }
            else
            {
                //redirect to homepage
                header('location:'.SiteUrl);
            }

        

        ?>
     



    <!-- fOOD sEARCH Section Starts Here -->
    <section class="food-search">
        <div class="container">
            
            <h2 class="text-center text-white">Add Quatity.</h2>

            <form action=""  method="POST" class="order">
                <fieldset>
                    <legend>Selected Food</legend>

                    <div class="food-menu-img">
                    <?php 
                    
                    //check if the image available
                    if($image_name=="")
                    {
                        //image not available
                        echo "<div class='error'>Image not Available.</div>";
                    }
                    else
                    {
                        //image is available
                        ?>
                    <img src="<?php echo SiteUrl; ?>images/food/<?php echo $image_name;?>"class="img-responsive img-curve"  height="150px">

                        <?php
                    }
                    $user_id=$_SESSION['user_id'];
                   
                    ?>
                      
                    </div>
    
                    <div class="food-menu-desc">
                        <h3><?php echo $title; ?></h3>
                        <input type="hidden" name="food" value="<?php echo $title; ?>">
                        <p class="food-price">$<?php echo $price; ?></p>
                        <input type="hidden" name="price" value="<?php echo $price; ?>">

                        <div class="order-label">Quantity</div>
                        <input type="number" name="qty" class="input-responsive" value="1" required>
                        
                    </div>

                </fieldset>
               
                <fieldset>
                  
                    <?php 
                    
                   
                        $user =$_SESSION['user-access'];
                        $sql3 = "SELECT * FROM tbl_client WHERE username='$user'";
                        $res3 = mysqli_query($con,$sql3);

                        if(mysqli_num_rows($res3)>0)
                        {
                            while($row3 = mysqli_fetch_assoc($res3))
                            {
                                //have a data
                                $first_name= $row3['first_name'];
                                $last_name=$row3['last_name'];
                                $em = $row3['username'];
                                $ph = $row3['phone'];
                                $add = $row3['address'];      
                            }
                        }
                
                   ?>
                       
                    <input type="submit" name="submit" value="Confirm Order"  class="btncenter"><br><br>
                              
                
                </fieldset>

            </form>

            <?php
            
            //check if submit butn is clicked
            if(isset($_POST['submit']))
            {
                //get all the datals from the form
                $food = $_POST['food'];
                $price = $_POST['price'];
                $qty = $_POST['qty'];
                $total = $price * $qty;
                $order_date = date("Y-m-d h:i:sa");
                $status = "Ordered"; //ordered or on delevery,cancel
                

              
                   
                //save the order in database
                //create sql to save the data
                $sql2 = "INSERT INTO `tbl_order` SET 
                client_id = $user_id,
                food_id = '$food_id',
                qty = $qty,
                total = $total,
                order_date = '$order_date',
                status = '$status' 
                ";

                  
                //execute query
                $res2 = mysqli_query($con,$sql2);

                //check if qyery executed succes or not
                if($res2==true)
                {
                    //query executed and order saved
                    $_SESSION['order'] = "<div class='success text-center'>Food Order Successfully.<div>";
                    header('location:'.SiteUrl);
                }
                else
                {
                    //failed to save order
                    $_SESSION['order'] = "<div class='error text-center'>Failed to Order Food.<div>";
                    header('location:'.SiteUrl);
                }
            
            }
            
            ?>


        </div>
    </section>
    <!-- fOOD sEARCH Section Ends Here -->

    <?php include('partials-front/footer.php'); ?>