<?php
require 'database.php';
if (!empty($_SESSION["id"])) {
    header("Location: mainpage.php");
}
if (isset($_POST["register"])) {
    $email = $_POST["email"];
    $username = $_POST["username"];
    $password = $_POST["password"];
    $confirmpassword = $_POST["confirmpassword"];
    $phone = $_POST["phone"];
    $duplicate = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username' ");
    $repeat = mysqli_query($conn, "SELECT * FROM user WHERE email = '$email' ");
    $repeatphone = mysqli_query($conn, "SELECT * FROM user WHERE phone = '$phone' ");
    if (mysqli_num_rows($duplicate) > 0) {
        echo
        "<script> alert('Username Has Already Taken'); </script>";
    } else {
        if (mysqli_num_rows($repeat) > 0) {
            echo
            "<script> alert('Email Has Already Taken'); </script>";
        } else {
            if (mysqli_num_rows($repeatphone) > 0) {
                echo
                "<script> alert('Phone Number Has Already Taken'); </script>";
            } else {
                if ($password == $confirmpassword) {
                    $query = "INSERT INTO user VALUES('','$email','$username','$password', '$phone')";
                    mysqli_query($conn, $query);
                  
                   echo "<script> alert('Register Account Successfully.'); window.location = 'mainpage.php'</script>";
                } else {
                    echo
                    "<script> alert('Password Does Not Match'); </script>";
                }
            }
        }
    }
}
?>
<!DOCTYPE html>   
<html>
    <head>
        <meta charset="UTF-8">
        <title>Online Optical Shop Ordering System Ban UK</title>
        <!-- Phone number -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/css/intlTelInput.css"/>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/intlTelInput.min.js"></script>
        <!-- bootstrap -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" >  
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
        <link href="JRdesign.css" rel="stylesheet">
    </head>  

    <body>
        <!-- Navigation Bar -->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <a class="navbar-brand" ><img src="images/logo.png" width="100" height="100" title="Logo of Ban UK" alt="Logo of Ban UK" /></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>


        </nav>
        <br>


        <form action="register.php" method="post" class="register-form">
            <h5>Register Account</h5>
            <hr>
            <div class="email">
                <label>Email Address:</label>
                <input type="email" class="form-control" name="email" placeholder="Email:">
            </div>
            <br>
            <div class="row">
                <div class="col">
                    <label>Username:</label>
                    <input type="text" class="form-control" name="username" placeholder="Username:" minlength="2" maxlength="12" 
                           pattern="[A-Za-z0-9]{2,12}" title="Please enter only alphanumeric characters" required>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col">
                    <label>Password:</label>
                    <input type="password" class="form-control" name="password" placeholder="Password:" minlength="3" maxlength="8" 
                           pattern="[A-Za-z0-9]{3,8}" title="Please enter a password with a minimum of 3 alphanumeric characters" required>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col">
                    <label>Confirm Password:</label>
                    <input type="password" class="form-control" name="confirmpassword" placeholder="Confirm Password:" minlength="3" maxlength="8" 
                           pattern="[A-Za-z0-9]{3,8}" title="Please enter a password with a minimum of 3 alphanumeric characters" required1>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col">
                    <label>Phone Number:</label>
                    <input id="phone" type="tel"  name="phone" required class="form-control" >
                </div>
            </div>
            <div class="form-btn ">
                <input type="submit" class="btn btn-primary" value="Register" name="register">
                <button class="btn btn-primary login2btn"> <a href="login.php">Login</a></button>
            </div>
        </form>




        <!-- Footer Section -->
        <footer class="mainfooter" role="contentinfo">  
            <div class="footer-middle">  
                <div class="container">  
                    <div class="row">  
                        <div class="col-md-3 col-sm-6">  
                            <div class="footer-pad">  
                                <h4>Location <i class="bi bi-arrow-right"></i></h4> 
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

    <script>
        const phoneInputField = document.querySelector("#phone");
        const phoneInput = window.intlTelInput(phoneInputField, {
            utilsScript:
                    "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.js",
        });
        const info = document.querySelector(".alert-info");

    </script>
</html>

