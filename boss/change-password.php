<?php include('partials/menu.php');?>

<div class="main-content">
<div class="wrapper">
<h1>Change Password</h1>
<br><br>


<?php

if(isset($_GET['id']))
{
    $id = $_GET['id'];
}

?>


<form action="" method="POST">

<table class="tbl-30">
<tr>
<td>Current Password:</td>
    <td>
        <input type="password" name="current_password" placeholder="Current Password">
    </td>
</tr>

<tr>
<td>New Password:</td>
    <td>
        <input type="password" name="new_password" placeholder="New Password">
    </td>
</tr>

<tr>
<td>Confirm Password: </td>
    <td>
    <input type="password" name="confirm_password" placeholder="Confirm Password">
    </td>
</tr>

<tr>
    <td>
    <input type="hidden" name="id" value="<?php echo $id; ?>">
    <input type="submit" name="submit" value="Change Password" class="btn-secondary">
    </td>
</tr>

</table>


</form>
</div>
</div>

<?php

//check submit button is click or not
if(isset($_POST['submit']))
{
//1.get the data from form
$id = $_POST['id'];
$current_password = md5($_POST['current_password']);
$new_password = md5($_POST['new_password']);
$confirm_password = md5($_POST['confirm_password']);
//2.check user pass exit or not
$sql = "SELECT * FROM tbl_manager WHERE id=$id AND password = '$current_password'";

//execut query
$res = mysqli_query($con,$sql);
$row=mysqli_num_rows($res);

if($res==true && $current_password!=0 || $confirm_password!=0 || $new_password!=0 && $row==1)
{
    //check data if available
    

    
        //user exist and password can be change
        //echo "User Found";
        //check new pass and confirm p match or not
       if($new_password == $confirm_password)
        {
            //update pass
            $sql2 = "UPDATE tbl_manager SET password = '$new_password'
            WHERE id=$id
            ";
            //execute query
            $res2 = mysqli_query($con,$sql2);

            //check if work
            if($res2==true)
            {
                //dispay succes message
            $_SESSION['change-pwd'] = "<div class='success'>Password Changed Successfully.</div>";
            //redirect user 
            header('location:'.SiteUrl.'boss/manage-manager.php');
            }
            else 
            {
                //display error
            $_SESSION['change-pwd'] = "<div class='error'>Failed To Change Password.</div>";
            //redirect user 
            header('location:'.SiteUrl.'boss/manage-manager.php');
            }
        }
        else
        {
            //error massage
            $_SESSION['pwd-not-match'] = "<div class='error'>Password Did Not Match.</div>";
            //redirect user 
            header('location:'.SiteUrl.'boss/manage-manager.php');
    
        }
    
    
}else 
{
    //error massage
    $_SESSION['fill-data'] = "<div class='error'>Pleas Try Again, And Fill All The Data.</div>";
    //redirect user 
    header('location:'.SiteUrl.'boss/manage-manager.php');
}



}


?>

<?php include('partials/footer.php') ;?>