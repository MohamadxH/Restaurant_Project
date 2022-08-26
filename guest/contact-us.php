
<!DOCTYPE html>
<html>
<meta name="viewport" content="width=devive-width, initial-scale=1.0">
<head><title>Responsive Contact Us Page</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="../css/contact.css">
</head>
<body>

        <div>
        <?php include('../admin/configue/connection.php');?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <!-- Important to make website responsive -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restaurant Website</title>

    <!-- Link our CSS file -->
    <link rel="stylesheet" href="../css/style.css">
</head>

<body>
    <!-- Navbar Section Starts Here -->
    <section class="navbar">
        <div class="container">
            <div class="logo">
                <a href="#" title="Logo">
                    <img src="../images/logo14.png" alt="Restaurant Logo" class="img-responsive" >
                </a>
            </div>

            <div class="menu text-right">
                <ul>
                    <li>
                        <a href="<?php echo SiteUrl."guest/guest.php"  ?>">Home</a>
                    </li>
                    <li>
                        <a href="<?php echo SiteUrl; ?>">Categories</a>
                    </li>
                    <li>
                        <a href="<?php echo SiteUrl; ?>">Foods</a>
                    </li>
                    <li>
                        <a href="<?php echo SiteUrl; ?>">Order</a>
                    </li>
                    <li>
                        <a href="<?php echo SiteUrl."guest/contact-us.php" ?>">Contact</a>
                    </li>
                   
                   
                  
                </ul>
            </div>

            <div class="clearfix"></div>
        </div>
    </section>
  
</div>
        <section class="contact">
            <div class="content">
            
            <h2>Contact Us</h2>
            <p>Hello Customer If you have any  comment about food or if you need any support about your order pleas contact us.</p>
            </div>

            <div class="container">
                <div class="contactInfo">

        

                    <div class="box">
                        <div class="icon"><i class="fa fa-map-marker" aria-hidden="true"></i></div>
                        <div class="text">
                        <h3>Address</h3>
                        <p>Islah Road,<br>Tripoli,Abou Samra,<br>1300</p>
                    </div>
                </div>

                <div class="box">
                        <div class="icon"><i class="fa fa-phone" aria-hidden="true"></i></div>
                        <div class="text">
                        <h3>Phone</h3>
                        <p>+961 71217525</p>
                    </div>
                </div>
                <div class="box">
                        <div class="icon"><i class="fa fa-envelope" aria-hidden="true"></i></div>
                        <div class="text">
                        <h3>Email</h3>
                        <p>51830583@students.liu.edu.lb</p>
                    </div>
                </div></div>
                    <div class="contactForm">
                        <form action="MAILTO:71217525.mh@gmail.com" method="POST" enctype="text/plain">
                            <h2>Send Message</h2>
                            <div class="inputBox">
                                <input type="text"  required="required">
                                <span>Full Name</span>
                            </div>

                            <div class="inputBox">
                                <input type="email"  required="required">
                                <span>Email</span>
                            </div>

                            <div class="inputBox">
                               <textarea required="required" name="message"></textarea>
                                <span>Type Your Message...</span>
                            </div>

                            <div class="inputBox">
                                <input type="submit" value="Send">
                            </div>
                            
                        </form>
                    </div>
            </div>
        </section>
        
</body>
</html>
<!-- social Section Starts Here -->
<section class="social">
        <div class="container text-center">
            <ul>
                <li>
                    <a href="#"><img src="https://img.icons8.com/fluent/50/000000/facebook-new.png"/></a>
                </li>
                <li>
                    <a href="#"><img src="https://img.icons8.com/fluent/48/000000/instagram-new.png"/></a>
                </li>
                <li>
                    <a href="#"><img src="https://img.icons8.com/fluent/48/000000/twitter.png"/></a>
                </li>
            </ul>
        </div>
    </section>
    <!-- social Section Ends Here -->

    <!-- footer Section Starts Here -->
    <section class="footer">
        <div class="container text-center">
            <p>All rights reserved. Designed By <a href="../my-profile/index.php">Mohamad Harmouche</a></p>
        </div>
    </section>
    <!-- footer Section Ends Here -->

</body>
</html>
    