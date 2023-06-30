<?php
require("database.php");
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Online Optical Shop Ordering System Ban UK</title>

        <!-- bootstrap -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" >  
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
        <link href="JRdesign.css" rel="stylesheet">
    </head>
    <body class="fullBg">
        <!-- Navigation Bar -->

        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <a class="navbar-brand" ><img src="images/logo.png" width="100" height="100" title="Logo of Ban UK" alt="Logo of Ban UK" /></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <a class="nav-link" href="login.php">Customer Login</a>
            <div class="collapse navbar-collapse" id="navbarTogglerDemo02">

            </div>
        </nav>

        <!--Admin Login--> 
        <div class="container-fluid">
            <div class="login-form">
                <div class="screen">
                    <div class="screen__content">
                        <?php
                        // Admin Login
                        if (isset($_POST['adminlogin'])) {
                            $sql = "SELECT * FROM `admin` WHERE `admin_name`='$_POST[adminname]' AND `admin_password`='$_POST[adminpassword]'";
                            $result = mysqli_query($conn, $sql);
                            if (mysqli_num_rows($result) == 1) {
                                session_start();
                                $_SESSION['admin'] = $_POST['adminname'];
                                header("location: dashboard.php");
                            } else {
                                echo "<script>alert('Invalid Admin Name / Password');</script>";
                            }
                        }
                        ?>
                        <form  class="login" action="adminlogin.php" method="post">
                            <div class="login__field">
                                <i class="login__icon bi bi-person-circle"></i>
                                <input type="text" class="login__input" name="adminname"  placeholder="Admin name" pattern="[A-Za-z0-9]+" 
                                       title="Please enter only alphanumeric characters" required>
                            </div>
                            <div class="login__field">
                                <i class="login__icon bi bi-lock-fill"></i>
                                <input type="password" class="login__input" name="adminpassword" placeholder="Admin Password" 
                                       minlength="3" maxlength="8" pattern=".{3,8}" title="Please enter a password with a minimum of 3 characters" required>
                            </div>  
                            <button class="button login__submit" type="submit" name="adminlogin">
                                <span class="button__text">Log In Now</span>
                                <i class="button__icon bi bi-chevron-right"></i>
                            </button>                        
                        </form>
                    </div>
                    <div class="screen__background">
                        <span class="screen__background__shape screen__background__shape4"></span>
                        <span class="screen__background__shape screen__background__shape3"></span>		
                        <span class="screen__background__shape screen__background__shape2"></span>
                        <span class="screen__background__shape screen__background__shape1"></span>
                    </div>		
                </div>
            </div>
        </div>




        <br><br><br>
        <!-- Footer Section -->

        <footer class="mainfooter" role="contentinfo">  
            <div class="footer-middle">  
                <div class="container">  
                    <div class="row">  
                        <div class="col-md-3 col-sm-6">  
                            <div class="footer-pad">  
                                <h4> Location <i class="bi bi-arrow-right"></i></h4> 
                            </div>  
                        </div>  
                        <div class="col-md-3 col-sm-6">  
                            <div class="footer-pad">  
                                <h4><u> Ban UK Optometrist Berjaya Times Square</u></h4>  
                                <ul class="list-unstyled">  
                                    <li>LG-45, Lower Ground Floor,</li>  
                                    <li>Berjaya Times Square,</li>  
                                    <li>1, Jln Imbi,</li>  
                                    <li>55100 Kuala Lumpur</li>   
                                </ul>  
                            </div>  
                        </div>  
                        <div class="col-md-3 col-sm-6">  
                            <div class="footer-pad">  
                                <h4><u>Ban UK Optometrist Sri Petaling</u></h4>  
                                <ul class="list-unstyled">  
                                    <li> 16, Jalan Radin Tengah,</li>  
                                    <li>Bandar Baru Sri Petaling,</li>  
                                    <li>57000 Kuala Lumpur,</li>  
                                    <li>Wilayah Persekutuan Kuala Lumpur</li>  
                                </ul>  
                            </div>  
                        </div>  
                        <div class="col-md-3 col-sm-6">  
                            <div class="footer-pad">  
                                <h4><u>Okio Eyewear Sungei Wang</u></h4> 
                                <ul class="list-unstyled">  
                                    <li>Sungei Wang Plaza, LG-144,</li>  
                                    <li>Lower Ground Floor, </li>  
                                    <li>50250 Kuala Lumpur,</li>  
                                    <li>Federal Territory of Kuala Lumpur</li>      
                                </ul>  
                            </div>  
                        </div> 
                    </div>
                    <div class="row"> 
                        <div class="col-md-12 text-center">  
                            <h4> Follow Us </h4>  
                            <ul class="social-network social-circle">  
                                <li> <a href="https://www.facebook.com/banukoptometrist" class="icoFacebook" title="Facebook"> <i class="fa fa-facebook" style="font-size:20px"> </i> </a> </li>  
                                <li> <a href="https://www.linkedin.com/company/ban-uk-optometrist/about/" class="icoLinkedin" title="Linkedin"> <i class="fa fa-linkedin" style="font-size:20px"> </i> </a> </li>              
                            </ul>                 
                        </div> 
                    </div>
                    <br>
                    <div class="row">  
                        <div class="col-md-12 copy">  
                            <p class="text-center"> © Copyright 2023 - jr.  All rights reserved. </p>  
                        </div>  

                    </div>  
                </div>  
            </div>  
        </footer> 
    </body>
</html>
