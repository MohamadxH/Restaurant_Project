<?php include('partials/menu.php') ;?>
    <!--Main Containt Section Starts -->
    <div class="main-content">
    <div class="wrapper">
        <h1>View Clients</H1>
        <br> <br> 
        <?php
        if(isset($_SESSION['delete']))
        {
            echo $_SESSION['delete'];
            unset($_SESSION['delete']);
        }
?>
        <br><br><br>

          <table class="tbl-full">
              <tr>
                  <th>S.N</th>
                  <th>Full Name</th>
                  <th>Username</th>
                  <th>Password</th>
                  <th>Phone</th>
                  <th>Address</th>
                  <th>Actions</th>

    </tr>
                    <?php
                    //query to get data
                    $sql = "SELECT * FROM tbl_client";
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
                                $first_name=$rows['first_name'];
                                $last_name=$rows['last_name'];
                                $full_name=$first_name." ".$last_name;
                                $username=$rows['username'];
                                $password=$rows['password'];
                                $phone=$rows['phone'];
                                $address=$rows['address'];
                              


                                  //display in tabel
        ?>
                            
                            <tr>
                      <td><?php echo $sn++;?></td>
                      <td><?php echo $full_name;?></td>
                      <td><?php echo $username;?></td>
                      <td><?php echo $password;?></td>
                      <td><?php echo $phone;?></td>
                      <td><?php echo $address;?></td>
                      <td>
                      <a href="<?php echo SiteUrl;?>boss/delete-client.php?id=<?php echo $id; ?>" class="btn-danger">Delete Client</a>
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