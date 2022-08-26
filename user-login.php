<?php include('admin/configue/connection.php') ?>

<html>
    <header>
        <title>Login - Welcome In MHFood House</title>
    <link rel="stylesheet" href="css/login.css">
    </header>

    <body>
    
        <div class="login">

        <div class="container">

        <img src="images/login-images/av.png"/>

       
       
        

	
		<form action="" method="POST">
			<div class="form-input">
            <input type="text" name="username" placeholder="Enter Your User Name">
			</div>
			<div class="form-input">
            <input type="password" name="password" placeholder="Enter Your Password">
			</div><br>
            <input type="submit" name="submit" value="login" class="btn-primary">
           <br><br>
          
           <div class="sign-up"> 
               <h5>If You Dont Have Acces - <a href="<?php echo SiteUrl;?>add-user.php">Sign-Up</a></h5> 
          
        </div>
        <br>
        <?php 
            
            if(isset($_SESSION['login-user']))
            {
                echo $_SESSION['login-user'];
                unset($_SESSION['login-user']);
            }

            if(isset($_SESSION['no-login-message']))
            {
                echo $_SESSION['no-login-message'];
                unset($_SESSION['no-login-message']);
            }
            
            if(isset($_SESSION['add-user']))
            {
                echo $_SESSION['add-user'];
                unset($_SESSION['add-user']);
            }
            ?>
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
  $sql = "SELECT * FROM tbl_client WHERE username='$username' AND password='$password'";
    
  //3.execute query
  $res = mysqli_query($con,$sql);

  //4.count rows check user exist or not
  $count = mysqli_num_rows($res);
 

  if($count==1)
  {    
    while($row = mysqli_fetch_assoc($res))
    {
      //get all the order data
      $user_id = $row['id'];
    }
        //user avalable login succes
        $_SESSION['login-user'] = "<div class='success text-center'>Login Successful.</div>";
        $_SESSION['user-access'] = $username;
        $_SESSION['user_id']= $user_id;
        //redirect to form page /dashboard
        header('location:'.SiteUrl);
  }
  else{
      //user not available login faild
      $_SESSION['login-user']= "<div class='error'>Login Faild Username or Password did not Match.</div>";
      //redirect to form page /dashboard
      header('location:'.SiteUrl.'user-login.php');
  }
}


?>