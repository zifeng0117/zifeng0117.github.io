<?php
require_once 'database.php';
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

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

        <nav class=" navbar navbar-expand-lg navbar-dark bg-dark">
            <a class="navbar-brand" href="mainpage.php"><img src="images/logo.png" width="100" height="100" title="Logo of Ban UK" alt="Logo of Ban UK" /></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
                <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                    <li class="nav-item active">
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
        <br>

        <!-- Displaying Products Start -->
        <div class="container">
            <div id="message"></div>
            <div class="row mt-2 pb-3">
                <?php
                require_once 'database.php';
                $stmt = $conn->prepare('SELECT * FROM product');
                $stmt->execute();
                $result = $stmt->get_result();
                while ($row = $result->fetch_assoc()):
                    ?>
                    <div class="col-sm-6 col-md-4 col-lg-3 mb-2">
                        <div class="card-deck">
                            <div class="card p-2 border-secondary mb-2">
                                <img src="<?= $row['product_image'] ?>" class="card-img-top" height="200">
                                <div class="card-body p-1">
                                    <p class="card-text text-center text-dark"><b><?= $row['product_name'] ?></b></p>
                                    <h5 class="card-text text-center text-dark">RM&nbsp;&nbsp;<?= number_format($row['product_price'], 2) ?></h5>

                                </div>
                                <div class="card-footer p-1">
                                    <form action="" class="form-submit">
                                        <div class="row p-2">
                                            <div class="col-md-6 py-1 pl-4">
                                                <b>Quantity : </b>
                                            </div>
                                            <div class="col-md-6">
                                                <input type="number" class="form-control pqty" value="<?= $row['product_qty'] ?>" min="0" step="1" onkeydown="return event.keyCode >= 48 && 
                                                            event.keyCode <= 57 || event.keyCode === 8 || event.keyCode === 46 || event.keyCode === 37 || event.keyCode === 39 || event.keyCode === 9 ? true : false">
                                            </div>
                                        </div>
                                        <input type="hidden" class="pid" value="<?= $row['id'] ?>">
                                        <input type="hidden" class="pname" value="<?= $row['product_name'] ?>">
                                        <input type="hidden" class="pprice" value="<?= $row['product_price'] ?>">
                                        <input type="hidden" class="pimage" value="<?= $row['product_image'] ?>">
                                        <input type="hidden" class="pcode" value="<?= $row['product_code'] ?>">
                                        <button class="btn btn-dark btn-block addItemBtn">&nbsp;&nbsp;Add to
                                            cart</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>
        </div>
        <!-- Displaying Products End -->


        <br>

        <!-- Footer Section -->
        <footer class="mainfooter" role="contentinfo">  
            <div class="footer-middle">  
                <div class="container fluid">  
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
        <script>
            function openNav() {
                document.getElementById("mySidebar").style.width = "250px";
                document.getElementById("main").style.marginLeft = "250px";
            }

            function closeNav() {
                document.getElementById("mySidebar").style.width = "0";
                document.getElementById("main").style.marginLeft = "0";
            }
        </script>
    </body>
</html>






