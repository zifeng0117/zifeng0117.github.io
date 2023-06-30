<?php
include 'database.php';

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
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" >  
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
        <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
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
                    <li class="nav-item">
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

        <!-- Images Slider Section -->
        <div class="container-fluid">
            <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
                    <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="images/advertisement1.jpg" class="d-block w-100" alt="...">
                        <div class="carousel-caption d-none d-md-block">

                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="images/advertisement2.png" class="d-block w-100" alt="...">
                        <div class="carousel-caption d-none d-md-block">

                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="images/advertisement3.jpg" class="d-block w-100" alt="...">
                        <div class="carousel-caption d-none d-md-block">

                        </div>
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-target="#carouselExampleCaptions" data-slide="prev">
                    <i class="bi bi-arrow-left-circle-fill fa-2x" style="color:black;"></i>
                    <span class="sr-only">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-target="#carouselExampleCaptions" data-slide="next">
                    <i class="bi bi-arrow-right-circle-fill fa-2x" style="color:black;"></i>
                    <span class="sr-only">Next</span>
                </button>
            </div>
        </div>
        <br>

        <!--Cards Section-->
        <div class="container-fluid">
            <div class="col-12 mt-4">
                <h1 class="text-center"><i class="bi bi-arrow-down" style="font-size:35px"></i> Brands Coming Soon <i class="bi bi-arrow-down" style="font-size:35px"></i></h1>
                <br>
                <div class="row justify-content-md-center">
                    <div class="card-deck ">
                        <div class="card ml-4 new-img">
                            <img src="images/A1.jfif" class="img-fluid card-img-top" data-toggle="modal" data-target="#exampleModal" alt="..." style="width:300px;height:200px;">
                            <div class="card-body">
                                <h5 class="text-center text-dark" data-toggle="modal" data-target="#exampleModal">Oakley</h5>
                            </div>
                        </div>
                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Oakley</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="text-center">
                                        <img src="images/A1.jfif" class="" alt="..." style="width:300px;height:200px;">
                                    </div>
                                    <div class="modal-body">
                                        Oakley, Inc., based in Foothill Ranch, California, is a subsidiary of an Italian company that designs, 
                                        develops and manufactures sports performance equipment and lifestyle pieces including sunglasses, sports visors, 
                                        ski/snowboard goggles, watches, apparel, backpacks, shoes, optical frames, and other accessories.
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card ml-4 new-img">
                            <img src="images/A2.jpg" class="img-fluid card-img-top" data-toggle="modal" data-target="#exampleModal1" alt="..." style="width:300px;height:200px;"> 
                            <div class="card-body">
                                <h5 class="text-center text-dark" data-toggle="modal" data-target="#exampleModal">Rayban</h5>
                            </div>
                        </div>
                        <div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel1">Rayban</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="text-center">
                                        <img src="images/A2.jpg" class="" alt="..." style="width:300px;height:200px;">
                                    </div>
                                    <div class="modal-body">
                                        Ray-Ban is a brand of sunglasses and spectacles founded in 1937 by the American company Bausch & Lomb. 
                                        The brand is best known for their Wayfarer and Aviator lines of sunglasses.
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card ml-4 new-img">
                            <img src="images/A3.jpg" class="img-fluid card-img-top" data-toggle="modal" data-target="#exampleModal2" alt="..." style="width:300px;height:200px;">
                            <div class="card-body">
                                <h5 class="text-center text-dark" data-toggle="modal" data-target="#exampleModal2">Levis</h5>
                            </div>
                        </div>
                        <div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabe2" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel2">Levis</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="text-center">
                                        <img src="images/A3.jpg" class="" alt="..." style="width:300px;height:200px;">
                                    </div>
                                    <div class="modal-body">
                                        Levi Strauss & Co., world's largest maker of pants, noted especially for its blue denim jeans called Levi's. 
                                        Its other products include tailored slacks, jackets, hats, shirts, skirts, and belts, 
                                        and it licenses the manufacture of novelty items. The company is headquartered in San Francisco.
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <br>
                <div class="row justify-content-md-center">
                    <div class="card-deck">
                        <div class="card ml-4 new-img">
                            <img src="images/A4.jpg" class="img-fluid card-img-top" data-toggle="modal" data-target="#exampleModal3" alt="..." style="width:300px;height:200px;">
                            <div class="card-body">
                                <h5 class="text-center text-dark" data-toggle="modal" data-target="#exampleModal3">Gucci</h5>
                            </div>
                        </div>
                        <div class="modal fade" id="exampleModal3" tabindex="-1" aria-labelledby="exampleModalLabe3" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel3">Gucci</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="text-center">
                                        <img src="images/A4.jpg" class="" alt="..." style="width:300px;height:200px;">
                                    </div>
                                    <div class="modal-body">
                                        Gucci is an Italian fashion brand founded in 1921 by Guccio Gucci, 
                                        making it one of the oldest Italian fashion brands in operation today. Like many historic fashion houses, 
                                        the brand started out as a luggage manufacturer, 
                                        producing luxury travel goods for Italy's wealthy upper-classes, as well as equestrian equipment.
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card ml-4 new-img">
                            <img src="images/A5.jpg" class="img-fluid card-img-top" data-toggle="modal" data-target="#exampleModal4" alt="..." style="width:300px;height:200px;">
                            <div class="card-body">
                                <h5 class="text-center text-dark" data-toggle="modal" data-target="#exampleModal4">Moscot</h5>
                            </div>
                        </div>
                        <div class="modal fade" id="exampleModal4" tabindex="-1" aria-labelledby="exampleModalLabe4" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel4">Moscot</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="text-center">
                                        <img src="images/A5.jpg" class="" alt="..." style="width:300px;height:200px;">
                                    </div>
                                    <div class="modal-body">
                                        Designed and prototyped in New York City, all MOSCOT Eyewear is handmade, 
                                        using the highest quality materials, real hardware, 
                                        and hinges that are riveted through the temple and frame fronts to ensure the sturdiest 
                                        construction possible.
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card ml-4 new-img">
                            <img src="images/A6.jpg" class="img-fluid card-img-top" data-toggle="modal" data-target="#exampleModal5" alt="..." style="width:300px;height:200px;">
                            <div class="card-body">
                                <h5 class="text-center text-dark" data-toggle="modal" data-target="#exampleModal5">Kate Spade</h5>
                            </div>
                        </div>
                        <div class="modal fade" id="exampleModal5" tabindex="-1" aria-labelledby="exampleModalLabe5" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel5">Kate Spade</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="text-center">
                                        <img src="images/A6.jpg" class="" alt="..." style="width:300px;height:200px;">
                                    </div>
                                    <div class="modal-body">
                                        Kate Spade New York is an American fashion house founded in January 1993 by Kate and Andy Spade. 
                                        Kate Spade New York competes with Michael Kors.
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </div>
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


