<?php include('admin/configue/connection.php');?>
<link rel="stylesheet" href="css/user.css">

<div class="login">

       
<form  action=""  method="post" accept-charset="utf-8">
	  <table class="tbl-full">
      <br>
      <tr><td> <p>  First Name</td><td>	<input type="text" name="f_name" placeholder="Enter Your First Name"required> </td></tr>
  <tr><td> <p>  Last Name</td><td>	<input type="text" name="l_name" placeholder="Enter Your Last Name"required> </td></tr>
  <tr><td> <p>  Email</td><td><input type="text" name="username" placeholder="Enter Your Username"required></td></tr>
  <tr><td> <p>  Password</td><td><input type="password" name="password" placeholder="Enter Your Password"required></td></tr>
  <tr><td> <p>  Phone</td><td><input type="text" name="phone" placeholder="Enter Your Phone"required></td></tr>
  <tr><td> <p>  Address</td><td><input type="text" name="address" placeholder="Enter Your Address"required></td></tr>

  <tr><td><p> 	<input type="submit" value="Create a Users" name="submit" class="btn-login"></td>
  <td><p id="p1"> 	<input type="reset" value=Clear_Data name="clr" class="btn-login"></td></tr>
  </table>
</form>
</div>


<div class="animeted">
        <img src="images/login-images/bb.png">
        <img src="images/login-images/bb.png">
        <img src="images/login-images/bb.png">
        <img src="images/login-images/bb.png">
        <img src="images/login-images/bb.png">
        <img src="images/login-images/bb.png">
        <img src="images/login-images/bb.png">
        </div>
<?php
if(isset($_POST['submit']))
{
    $id = $_POST['id'];
	$first_name = $_POST['f_name'];
    $last_name = $_POST['l_name'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];

    if (empty($first_name) ||empty($last_name)||empty($username)||empty($password)||empty($phone)||empty($address)){
		echo "Pleas fill all the data";}
   else{
    $sql = "INSERT INTO tbl_client SET
    first_name='$first_name',
    last_name='$last_name',
    username = '$username',
    password = '$password',
    phone = '$phone',
    address = '$address'
    ";
  
    //3.executing query and saving data into database
    $res = mysqli_query($con, $sql) or die(mysqli_errot());
    //4.check whether the (query is executed) data is inserted or not display message
    if($res==true)
    {
        //data inserted
       // echo 'data inserted';
       //create a session variable to display message
       $_SESSION['add-user'] = "<div class='success'>User Added Successfully.</div>";
       //redirect page to manage admin
       header("location:".SiteUrl.'user-login.php');
    }
    else{
        //faild to inserted
        //echo 'Faild to insert data';
         //create a session variable to display message
       $_SESSION['add-user'] = "<div class='error'>Failed To Add User Pleas Try Again Later.</div>";
       //redirect page to add admin
       header("location:".SiteUrl.'user-login.php');
    }}
}
?>