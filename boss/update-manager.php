
<?php include('partials/menu.php');?>

<div class="main-content">
<div class="wrapper">
<h1>Update Admin</h1>

<br><br>


<?php
// 1.get the id of selected admin
$id=$_GET['id'];

//2.create sql query to get details
$sql = "SELECT * FROM tbl_manager WHERE id=$id";

//3.execute the query
$res = mysqli_query($con,$sql);

//4.check query is executed or not
if($res==true)
{
    $count = mysqli_num_rows($res);
//check we have data or not
if($count==1)
{
//get the details    
$row=mysqli_fetch_assoc($res);
$full_name = $row['full_name'];
$username = $row['username'];
}
else
{
    //redirect message page
    header('location:'.SiteUrl.'boss/manage-manager.php');
}

}

?>

<form action="" method="POST">

        <table class="tbl-30">
        <tr>
            <td>Full Name:</td>
            <td>
            <input type="text" name="full_name" value="<?php echo $full_name; ?>">
            </td>
        </tr>
        <tr>
            <td>Username: </td>
            <td>
            <input type="text" name="username" value="<?php echo $username;?>">
            </td>
        </tr>
        <tr>
            <td colspan="2">
            <input type="hidden" name="id" value="<?php echo $id;?>">
            <input type="submit" name="submit" value="Update Manager"  class="btn-secondary">
             </td>
        </tr>
        </table>

</form>

</div>
</div>


<?php
//check whether the submit button clicked or not
if(isset($_POST['submit']))
{
   //get all value from form to update
   $id = $_POST['id'];
   $full_name = $_POST['full_name'];
   $username = $_POST['username'];

   //create sql q to update admin
   $sql = "UPDATE tbl_manager SET 
   full_name = '$full_name',
   username = '$username'
   WHERE id='$id'
   ";

   //execute query
   $res = mysqli_query($con,$sql);

   //check query if work
   if($res==true)
   {
       //query executed and admin updated
    $_SESSION['update'] = "<div class='success'>Manager Updated Successfully.</div>";
    //redirect to manage page
    header('location:'.SiteUrl.'boss/manage-manager.php');
   }
   else
   {
   //update failed    
   $_SESSION['update'] = "<div class='error'>Manager Updated Failed, pleas try again later.</div>";
   //redirect to manage page
   header('location:'.SiteUrl.'boss/manage-manager.php');
   }
}


?>

<?php include('partials/footer.php');?>
