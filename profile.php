<?php include('partials-front/menu.php'); ?>
<header><link rel="stylesheet" href="css/profile.css"></header>

<div class="main-content">
    <div class="wrapper">

    <br><br>
    <?php
    $user_id=$_SESSION['user_id'];
  
    $sql = "SELECT * FROM tbl_client where id=$user_id";
    //redirect query
    $res = mysqli_query($con,$sql);
    //count rows
    $count = mysqli_num_rows($res);
    
    if($count == 1)
    {
        //have data
        $row=mysqli_fetch_assoc($res);
        $id = $row['id'];
        $first_name = $row['first_name'];
        $last_name = $row['last_name'];
        $username = $row['username'];
        $password = $row['password'];
        $phone = $row['phone'];
        $address = $row['address'];
        


        
    }
    else
    {
        //dont have data
        //redirect to m-o-pg
        header('location:'.SiteUrl.'profile.php');
    }


?>

    <form action="" method="POST">
    <div class="container">
    <div class="icon">
<img src="images/user.png" >
</div>
        <table class="tbl-30">
            <tr>
                    <td>First Name</td>
                    <td><b><?php echo $first_name; ?></b></td>
            </tr>

            <tr>
            <td>Last Name</td>
                <td>
                <b><?php echo $last_name; ?></b>
                </td>
            </tr>

        

            <tr>
            <td>Username</td>
                <td>
                <b><?php echo $username; ?></b>
                </td>
            </tr>
            

       


            <tr>
            <td>Password</td>
                <td>
                <b><?php echo $password; ?></b>
                </td>
            </tr>

            <tr>
            <td>phone</td>
                <td>
                <b><?php echo $phone; ?></b>
                </td>
            </tr>

         
           
            <tr>
            <td>Address</td>
                <td>
                <b><?php echo $address; ?></b>
                </td>
            </tr>

          

            <tr>   
                    <td colspan="2">
                    <input type="hidden" name="id" value="<?php echo $id;?>">
                    <a href="<?php echo SiteUrl;?>update-profile.php?id=<?php echo $id;?>" class="btn-secondary">Update Profile</a>
                    </td>
            </tr>
        </table>
        <?php
 if(isset($_SESSION['update']))
            {
        echo $_SESSION['update'];
        unset($_SESSION['update']);
            }

            
?>
        </div>
    </form>
<?php
    
    ?>

   

    </div>
</div>




<?php include('partials-front/footer.php'); ?>