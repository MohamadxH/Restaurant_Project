<?php include('partials/menu.php');?>


<div class="main-content">
<div class="wrapper">
    <h1>Add Admin</h1>
    <br><br>

    <?php 
     if(isset($_SESSION['add']))
     {
         echo $_SESSION['add'];//display session masage
         unset($_SESSION['add']);//remove session massage
     }
    ?>


    <form action="" method="POST">

            <table class="tbl-30">
                <tr>
                    <td>Ful Name</td>
                    <td><input type="text" name="full_name" placeholder="Enter Your Name"></td>
                </tr>
                <tr>
                    <td>Username Name</td>
                    <td><input type="text" name="username" placeholder="Your Username"></td>
                </tr>
                <tr>
                    <td>Password: </td>
                    <td><input type="password" name="password" placeholder="Your Password"></td>
                </tr>
                <tr>
                    <td colspan="2"><br>
                    <input type="submit" name="submit" value="Add Admin" class="btn-secondary">
                    </td>
                </tr>
            </table>

    </form>
</div>
</div>


<?php include('partials/footer.php');?>

<?php
//process the value from form and save it in database
//check whether the submit button is clicked or not

if(isset($_POST['submit']))
{
    // button clicked
    //echo "button clicked";

    //1.Get the data from form
    $full_name = $_POST['full_name'];
    $username = $_POST['username'];
    $password = md5($_POST['password']);

    //2.sql query to save the data into database
    $sql = "INSERT INTO tbl_manager SET
    full_name='$full_name',
    username='$username',
    password='$password'
    ";

    //3.executing query and saving data into database
    $res = mysqli_query($con, $sql) or die(mysqli_errot());

    //4.check whether the (query is executed) data is inserted or not display message
    if($res==true)
    {
        //data inserted
       // echo 'data inserted';
       //create a session variable to display message
       $_SESSION['add'] = "<div class='success'>Manager Added Successfully</div>";
       //redirect page to manage admin
       header("location:".SiteUrl.'boss/manage-manager.php');
    }
    else{
        //faild to inserted
        //echo 'Faild to insert data';
         //create a session variable to display message
       $_SESSION['add'] = "<div class='error'>Failed To Add Manager</div>";
       //redirect page to add admin
       header("location:".SiteUrl.'boss/add-manager.php');
    }
}
?>