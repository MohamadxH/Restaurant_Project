            <?php include('partials/menu.php') ?>

            <div class="main-content">
                <div class="wrapper">
                <h1>Manage Food</h1>
                <br> <br> <br>

            <!--button action-->
            <a href="<?php echo SiteUrl; ?>admin/add-food.php" class="btn-primary">Add Food</a>

            <br><br><br>

                        <?php 

                            if(isset($_SESSION['add']))
                            {
                              echo $_SESSION['add'];
                              unset($_SESSION['add']);

                            }
                            if(isset($_SESSION['delete']))
                            {
                              echo $_SESSION['delete'];
                              unset($_SESSION['delete']);

                            }

                            if(isset($_SESSION['upload']))
                            {
                              echo $_SESSION['upload'];
                              unset($_SESSION['upload']);

                            }
                            if(isset($_SESSION['unauthorize']))
                            {
                              echo $_SESSION['unauthorize'];
                              unset($_SESSION['unauthorize']);

                            }
                            if(isset($_SESSION['update-food']))
                            {
                              echo $_SESSION['update-food'];
                              unset($_SESSION['update-food']);

                            }

                            if(isset($_SESSION['update']))
                            {
                              echo $_SESSION['update'];
                              unset($_SESSION['update']);

                            }
                          
                            if(isset($_SESSION['remove-failed']))
                            {
                              echo $_SESSION['remove-failed'];
                              unset($_SESSION['remove-failed']);

                            }

                          

                        ?>

              <table class="tbl-full">
                  <tr>
                      <th>S.N</th>
                      <th>Title</th>
                      <th>Price</th>
                      <th>Image</th>
                      <th>Featured</th>
                      <th>Active</th>
                      <th>Action</th></tr>

                      <?php
                      
                      //create ssql query to get all the food
                      $sql = "SELECT * FROM tbl_food";

                      //execute query
                      $res = mysqli_query($con,$sql);

                      //count row to check if we have food or not
                      $count = mysqli_num_rows($res);

                      //create serial nbr variable and set default value as 1
                      $sn=1;

                      if($count>0)
                      {
                        //we have food in database
                        //get the food from database
                        while($row=mysqli_fetch_assoc($res))
                        {
                          //get the value from colons
                          $id = $row['id'];
                          $title = $row['title'];
                          $price = $row['price'];
                          $image_name = $row['image_name'];
                          $featured = $row['featured'];
                          $active = $row['active'];
                          ?>

                      <tr>
                          <td><?php echo $sn++;?></td>
                          <td><?php echo $title;?></td>
                          <td>$<?php echo $price;?></td>
                          <td>
                              <?php
                            // echo $image_name;
                            //check if we have image
                            if($image_name=="")
                            {
                              //we do not have image display error msg
                              echo "<div class='error'>Image not Added.</div>";
                            }
                            else
                            {
                              //we have image,display it
                              ?>

                              <img src="<?php echo SiteUrl; ?>images/food/<?php echo $image_name; ?>" width="100px" height="70px">

                              <?php
                            }
                              ?>
                          </td>
                          <td><?php echo $featured;?></td>
                          <td><?php echo $active;?></td>
                          <td>
                          <a href="<?php echo SiteUrl; ?>admin/update-food.php?id=<?php echo $id ;?>" class="btn-secondary">Update Food</a>
                          <a href="<?php echo SiteUrl; ?>admin/delete-food.php?id=<?php echo $id ;?>&image_name=<?php echo $image_name;?>" class="btn-danger">Delete Food</a>
                        </td>
                      </tr>

                          <?php
                        }

                      }
                      else
                      {
                        //food not added in database
                        echo "<tr><td colspan='7' class='error'>Food not Added Yet.</td></tr>";
                      }
                      
                      ?>

                      

                    
              
              </table>
            </div>
            </div>
            <?php include('partials/footer.php') ?>