<?php include('admin/configue/connection.php');?>
<?php include('user-check.php');?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <!-- Important to make website responsive -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restaurant Website</title>

    <!-- Link our CSS file -->
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <!-- Navbar Section Starts Here -->
    <section class="navbar">
        <div class="container">
            <div class="logo">
                <a href="#" title="Logo">
                    <img src="images/logo14.png" alt="Restaurant Logo" class="img-responsive" >
                </a>
            </div>

            <div class="menu text-right">
                <ul>
                    <li>
                        <a href="<?php echo SiteUrl; ?>">Home</a>
                    </li>
                    <li>
                        <a href="<?php echo SiteUrl; ?>categories.php">Categories</a>
                    </li>
                    <li>
                        <a href="<?php echo SiteUrl; ?>foods.php">Foods</a>
                    </li>
                    <li>
                        <a href="<?php echo SiteUrl; ?>order2.php">Order</a>
                    </li>
                    <li>
                        <a href="<?php echo SiteUrl; ?>contact.php">Contact</a>
                    </li>
                    <li>
                        <a href="<?php echo SiteUrl; ?>profile.php">My Profile</a>
                    </li>
                   
                    <li><a href="logout-user.php">Logout</a></li>
                  
                </ul>
            </div>

            <div class="clearfix"></div>
        </div>
    </section>
    <!-- Navbar Section Ends Here -->