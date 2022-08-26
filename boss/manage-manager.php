<?php include('partials/menu.php') ;?>
    <!--Main Containt Section Starts -->
    <div class="main-content">
    <div class="wrapper">
        <h1>Manage Admin</H1>
        <br> <br> 
        
        <?php
        if(isset($_SESSION['add']))
        {
            echo $_SESSION['add'];//display session masage
            unset($_SESSION['add']);//remove session massage
        }

        if(isset($_SESSION['delete']))
        {
            echo $_SESSION['delete'];
            unset($_SESSION['delete']);
        }

        if(isset($_SESSION['update']))
        {
            echo $_SESSION['update'];
            unset($_SESSION['update']);
        }

    

        if(isset($_SESSION['pwd-not-match']))
        {
            echo $_SESSION['pwd-not-match'];
            unset($_SESSION['pwd-not-match']);
        }

        if(isset($_SESSION['change-pwd']))
        {
            echo $_SESSION['change-pwd'];
            unset($_SESSION['change-pwd']);
        }

        if(isset($_SESSION['fill-data']))
        {
            echo $_SESSION['fill-data'];
            unset($_SESSION['fill-data']);
        }
        ?>
        <br><br><br>

        <!--button action-->
        <a href="add-manager.php" class="btn-primary">Add Admin</a>

        <br><br><br>

          <table class="tbl-full">
              <tr>
                  <th>S.N</th>
                  <th>Full Name</th>
                  <th>Username</th>
                  <th>Actions</th>

    </tr>
                    <?php
                    //query to get data
                    $sql = "SELECT * FROM tbl_manager";
                    //execute it
                    $res = mysqli_query($con,$sql);

                    //check query
                    if($res==TRUE)
                    {
                        //count rows to check data 
                        $count = mysqli_num_rows($res);//get all the rows

                        $sn=1;//fix database row delete nbr id

                        //check nbr rows
                        if($count>0)
                        {
                            //have a data
                            while($rows=mysqli_fetch_assoc($res))
                            {
                                //fetch the data 
                                $id=$rows['id'];
                                $full_name=$rows['full_name'];
                                $username=$rows['username'];
                              


                                  //display in tabel
        ?>
                            
                            <tr>
                      <td><?php echo $sn++;?></td>
                      <td><?php echo $full_name;?></td>
                      <td><?php echo $username;?></td>
                      
                      <td>
                      <a href="<?php echo SiteUrl;?>boss/change-password.php?id=<?php echo $id; ?>" class="btn-primary">Change Password</a>
                      <a href="<?php echo SiteUrl;?>boss/update-manager.php?id=<?php echo $id; ?>" class="btn-secondary">Update Admin</a>
                      <a href="<?php echo SiteUrl;?>boss/delete-manager.php?id=<?php echo $id; ?>" class="btn-danger">Delete Admin</a>
                    </td>
                  </tr>

                              
                                <?php
                            }
                        }
                        else
                        {
                            //DO NOT HAVE DATA
                        }

                    }
                    ?>

          </table>
    </div>
</div>
    <!--Main Containt Section Ends -->

    <?php include('partials/footer.php') ;?>