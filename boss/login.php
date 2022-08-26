<?php include('partials/connection.php') ?>

<html>
    <header>
        <title>Login - Food Order System</title>
    <link rel="stylesheet" href="../css/login.css">
    </header>

    <body>
    
        <div class="login">

        <div class="container">

        <img src="../images/login-images/av.png"/>

       
       
        

	
		<form action="" method="POST">
			<div class="form-input">
            <input type="text" name="username" placeholder="Enter Your User Name">
			</div>
			<div class="form-input">
            <input type="password" name="password" placeholder="Enter Your Password">
			</div><br>
            <input type="submit" name="submit" value="login" class="btn-primary">
           <br><br><br>
           <?php 
            
            if(isset($_SESSION['login']))
            {
                echo $_SESSION['login'];
                unset($_SESSION['login']);
            }
            if(isset($_SESSION['no-login-message']))
            {
                echo $_SESSION['no-login-message'];
                unset($_SESSION['no-login-message']);
            }
            
            ?>
		</form>
	</div>
           


        <div class="animeted">
        <img src="../images/login-images/bb.png">
        <img src="../images/login-images/bb.png">
        <img src="../images/login-images/bb.png">
        <img src="../images/login-images/bb.png">
        <img src="../images/login-images/bb.png">
        <img src="../images/login-images/bb.png">
        <img src="../images/login-images/bb.png">
        </div>
       
    </div>
    

    </body>
</html>


<?php
//check submit btn if work
if(isset($_POST['submit']))
{
    //PROCES FOR LOGIN
    //1.get data from form

  $username=$_POST['username'];
  $password=$_POST['password'];

  //2.query for username  and pass exit or not
  $sql = "SELECT * FROM tbl_admin WHERE username='$username' AND password='$password'";

  //3.execute query
  $res = mysqli_query($con,$sql);

  //4.count rows check user exist or not
  $count = mysqli_num_rows($res);

  if($count==1)
  {
        //user avalable login succes
        $_SESSION['login'] = "<div class='success'>Login Successful.</div>";
        $_SESSION['user'] = $username;
        //redirect to form page /dashboard
        header('location:'.SiteUrl.'boss/');
  }
  else{
      //user not available login faild
      $_SESSION['login']= "<div class='success'>Login Faild Username or Password did not Match.</div>";
      //redirect to form page /dashboard
      header('location:'.SiteUrl.'boss/login.php');
  }
}


?>