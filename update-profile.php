<html>
<?php include('admin/configue/connection.php');?>
<div class="all">
<link rel="stylesheet" href="css/profile.css">
<link rel="stylesheet" href="css/user.css">
<?php
    //check if id is set or not
    if(isset($_GET['id']))
        {
            //get the order details
            $id = $_GET['id'];
            //sql query to get order details
            $sql = "SELECT * FROM tbl_client where id=$id";
            //redirect query
            $res1 = mysqli_query($con,$sql);
            //count rows
            $count = mysqli_num_rows($res1);
            
            if($count == 1)
            {
                //have data
                $rows=mysqli_fetch_assoc($res1);
                $id = $rows['id'];
                $first_name = $rows['first_name'];
                $last_name = $rows['last_name'];
                $username = $rows['username'];
                $password = $rows['password'];
                $phone = $rows['phone'];
                $address = $rows['address'];
                
        
        
                
            }
            else
            {
                //dont have data
                //redirect to m-o-pg
             header('location:'.SiteUrl.'profile.php');
            }
        }
        else
        {
            //redirect to m-o-pg
            header('location:'.SiteUrl.'profile.php');
        }
        ?>

<form action="" method="POST">
<div class="icon1">
<img src="images/user.png" >
</div>
        <table class="tbl-30">
        <tr>
                    <td>First Name</td>
                    <td>
                        <input type="text" name="first_name" value="<?php echo $first_name; ?>">
                    </td>
            </tr>

            <tr>
                    <td>Last Name</td>
                    <td>
                        <input type="text" name="last_name" value="<?php echo $last_name; ?>">
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
                        <input type="text" name="password" value="<?php echo $password; ?>">
                    </td>
            </tr>
           

            <tr>
                    <td>Address</td>
                    <td>
                       <textarea name="address" clos="30" rows="5"><?php echo $address; ?></textarea>
                    </td>
            </tr>

            <tr>   
                    <td colspan="2">
                    <input type="hidden" name="id" value="<?php echo $id;?>">
                        <input type="submit" name="submit" value="Confirm" class="btn-confirm">
                    </td>
            </tr>
        </table>
    </form>
<?php
    //check if update btn is clicked
    if(isset($_POST['submit']))
    {
        //echo "test";
        //get all the data from form
        $id = $_POST['id'];
        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $password = $_POST['password'];
        $address = $_POST['address'];
   
        //update the value
        $sql2 = "UPDATE tbl_client Set 
        first_name = '$first_name',
        last_name = '$last_name',
        password = '$password',
        address = '$address'
        WHERE id = $id 
        ";

        $res2 = mysqli_query($con,$sql2);

       
        if($res2==true)
        {
            //updated
            $_SESSION['update'] = "<div class='success'>Profile Updated Successfully.</div>";
            header('location:'.SiteUrl.'profile.php');
        }
        else
        {
            //failed updated
            $_SESSION['update'] = "<div class=''>Failed to Update Profile.</div>";
            header('location:'.SiteUrl.'profile.php');
        }
       
    }
    
    ?>

    </div>
</div>
</div>
</html>