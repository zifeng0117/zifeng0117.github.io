<?php
require_once 'database.php';
if (!empty($_SESSION["id"])) {
    $id = $_SESSION["id"];
    $result = mysqli_query($conn, "SELECT * FROM user WHERE id = $id");
    $row = mysqli_fetch_assoc($result);
} else {
    header("Location: login.php");
}
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
    <body>
        <!-- Navigation Bar -->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <a class="navbar-brand" href="mainpage.php"><img src="images/logo.png" width="100" height="100" title="Logo of Ban UK" alt="Logo of Ban UK" /></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
                <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="product.php">GLASSES</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="aboutus.php">ABOUT US</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="facilities.php">FACILITIES</a>
                    </li>
                </ul>
                <a href="cart.php" class=" nav-link d-flex "><i class="bi bi-cart" style="font-size:35px"></i><span id="cart-item" style="font-size:15px" class="badge badge-danger mt-3 mb-3" ></span></a>

                <a href="manageacc.php" class="nav-link d-flex"><i class="bi bi-person" style="font-size:35px"></i></a>
                <a href="logout.php" class=" nav-link d-flex"><i class="bi bi-box-arrow-right" style="font-size:35px"></i></a>
                <div class="nav-link d-flex mt-4">


                    <p class="text-white">
                        Welcome
                        <strong>
                            <?php echo $row["username"]; ?>
                        </strong>
                    </p>

                </div>
            </div>
        </nav>
        <br>

        <!-- Facilities -->
        <div class="container">
            <h1 class="flex-d">Facilities</h1>
            <br>
            <!-- Facilities -->
            <div class=" mb-12" style="max-width:2000px;">
                <div class="row no-gutters">
                    <div class="col-md-3 ">
                        <img src="images/facilities1.jpg" class="rounded-bottom rounded-top"style="width:400px; height:400px;" alt="...">
                    </div>
                    <div class="col-md-9">
                        <div class="card-body">
                            <h3 class="card-title aboutus2">AUTOREFRACTOR</h3>
                            <p class="card-text aboutus1">
                                Autorefractor is a machine that opticians use to measure an estimate of your prescription.</p>                      
                        </div>
                    </div>
                </div>
            </div> 
            <div class=" mb-12 " style="max-width: 2000px;">
                <div class="row no-gutters ">

                    <div class="col-md-8 ">
                        <div class="card-body">
                            <h3 class="card-title aboutus4">AUTO LENSMETER</h3>
                            <p class="card-text aboutus3">
                                An auto lensmeter calculates the prescription for glasses.
                                It determines sphere, cylinder, axis, prism and distance between each pupillary distance.</p>
                        </div>
                    </div>
                    <div class="col-md-4 d-flex">
                        <img class="aboutus5 rounded-bottom rounded-top" src="images/facilities2.jpg"  style="width:500px; height:400px;" alt="">
                    </div>
                </div>
            </div>
            <div class=" mb-12" style="max-width:2000px;">
                <div class="row no-gutters">
                    <div class="col-md-3 ">
                        <img src="images/facilities3.jpg" class="rounded-bottom rounded-top"style="width:400px; height:400px;" alt="...">
                    </div>
                    <div class="col-md-9">
                        <div class="card-body">
                            <h3 class="card-title aboutus2">TONOMETRY</h3>
                            <p class="card-text aboutus1">
                                Tonometry is a test to measure the pressure inside your eyes.
                                By measuring the size of the corneal depression, the device determines ocular pressure.
                                This measurement can determine whether or not you may be at risk of glaucoma.</p>                      
                        </div>
                    </div>
                </div>
            </div> 
            <br>
            <div class=" mb-12 " style="max-width: 2000px;">
                <div class="row no-gutters ">

                    <div class="col-md-8 ">
                        <div class="card-body">
                            <h3 class="card-title aboutus4">OPHTHALMOSCOPE</h3>
                            <p class="card-text aboutus3">
                                Ophthalmoscope is to detect and evaluate symptoms of retinal detachment or eye diseases such as glaucoma.
                                It may also be performed out if you have signs or symptoms of diabetes, high blood pressure, 
                                or other diseases that impact the blood vessels.</p>
                        </div>
                    </div>
                    <div class="col-md-4 d-flex">
                        <img class="aboutus5 rounded-bottom rounded-top" src="images/facilities4.jpg"  style="width:500px; height:400px;" alt="">
                    </div>
                </div>
            </div>
            <div class=" mb-12" style="max-width:2000px;">
                <div class="row no-gutters">
                    <div class="col-md-3 ">
                        <img src="images/facilities5.jpg" class="rounded-bottom rounded-top"style="width:400px; height:400px;" alt="...">
                    </div>
                    <div class="col-md-9">
                        <div class="card-body">
                            <h3 class="card-title aboutus2">KERATOGRAPH</h3>
                            <p class="card-text aboutus1">
                                Keratograph is a corneal topographer equipped with a high-resolution camera and lighting that 
                                enables the study of the palpebral dynamics and ocular surface.
                                The main use of the Keratograph is to identify dry eye and track its therapy.</p>                      
                        </div>
                    </div>
                </div>
            </div>
            <div class=" mb-12 " style="max-width: 2000px;">
                <div class="row no-gutters ">

                    <div class="col-md-8 ">
                        <div class="card-body">
                            <h3 class="card-title aboutus4">DIGITAL PHOROPTER</h3>
                            <p class="card-text aboutus3">
                                A phoropter is an ophthalmic test instrument.It is frequently used by optometrists during an eye exam 
                                in order to evaluate a person's refractive error and identify their</p>
                        </div>
                    </div>
                    <div class="col-md-4 d-flex">
                        <img class="aboutus5 rounded-bottom rounded-top" src="images/facilities6.jpg"  style="width:500px; height:400px;" alt="">
                    </div>
                </div>
            </div>
            <div class=" mb-12" style="max-width:2000px;">
                <div class="row no-gutters">
                    <div class="col-md-3 ">
                        <img src="images/facilities7.jpg" class="rounded-bottom rounded-top"style="width:400px; height:400px;" alt="...">
                    </div>
                    <div class="col-md-9">
                        <div class="card-body">
                            <h3 class="card-title aboutus2">SLIT LAMP</h3>
                            <p class="card-text aboutus1">
                                Slit lamp is a microscope with a bright light used during an eye test.
                                A slit lamp exam can help diagnose disease such as cataracts, 
                                a clouding of the lens that affects vision and makes it difficult to see clearly.</p>                      
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br>

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
        <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js'></script>
        <script type="text/javascript">
            $(document).ready(function () {

                // Send product details in the server
                $(".addItemBtn").click(function (e) {
                    e.preventDefault();
                    var $form = $(this).closest(".form-submit");
                    var pid = $form.find(".pid").val();
                    var pname = $form.find(".pname").val();
                    var pprice = $form.find(".pprice").val();
                    var pimage = $form.find(".pimage").val();
                    var pcode = $form.find(".pcode").val();

                    var pqty = $form.find(".pqty").val();

                    $.ajax({
                        url: 'action.php',
                        method: 'post',
                        data: {
                            pid: pid,
                            pname: pname,
                            pprice: pprice,
                            pqty: pqty,
                            pimage: pimage,
                            pcode: pcode
                        },
                        success: function (response) {
                            $("#message").html(response);
                            window.scrollTo(0, 0);
                            load_cart_item_number();
                        }
                    });
                });

                // Load total no.of items added in the cart and display in the navbar
                load_cart_item_number();

                function load_cart_item_number() {
                    $.ajax({
                        url: 'action.php',
                        method: 'get',
                        data: {
                            cartItem: "cart_item"
                        },
                        success: function (response) {
                            $("#cart-item").html(response);
                        }
                    });
                }
            });
        </script>
    </body>
</html>
