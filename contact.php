
<!DOCTYPE html>
<html>
<meta name="viewport" content="width=devive-width, initial-scale=1.0">
<head><title>Responsive Contact Us Page</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="css/contact.css">
</head>
<body>

        <div><?php include('partials-front/menu.php'); ?>
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
<?php include('partials-front/footer.php'); ?>
    