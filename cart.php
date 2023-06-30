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
                <a href="cart.php" class=" nav-link d-flex"><i class="bi bi-cart" style="font-size:35px"></i><span id="cart-item" style="font-size:15px" class="badge badge-danger mt-3 mb-3" ></span></a>
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

        <!-- Cart title -->
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="container">
                    <h1 class="text-center">Shopping Cart</h1>
                    <br><br><br>
                    <table class="table table-responsive text-center">
                        <thead class="thead-dark">
                            <tr>
                                <th colspan="2"></th>
                                <th colspan="3">Image</th>
                                <th colspan="3">Product</th>
                                <th colspan="3">Price</th>
                                <th colspan="3">Quantity</th>
                                <th >
                                    <a href="action.php?clear=all" class="badge-danger badge p-1" onclick="return confirm('Are you sure want to clear your cart?');">&nbsp;&nbsp;Clear Cart</a>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            require 'database.php';
                            $stmt = $conn->prepare('SELECT * FROM cart');
                            $stmt->execute();
                            $result = $stmt->get_result();
                            $grand_total = 0;
                            while ($row = $result->fetch_assoc()):
                                ?>
                                <tr>
                                    <td colspan="2">
                                        <a href="action.php?remove=<?= $row['id'] ?>" class="text-danger lead" onclick="return confirm('Are you sure want to remove this item?');"><i class="bi bi-trash"></i></a>
                                    </td>
                                    <td colspan="3"><img src="<?= $row['product_image'] ?>" width="200"></td>
                                    <td colspan="3"><?= $row['product_name'] ?></td>
                                    <td colspan="3">
                                        RM&nbsp;&nbsp;<?= number_format($row['product_price'], 2); ?>
                                    </td>
                            <input type="hidden" class="pprice" value="<?= $row['product_price'] ?>">
                            <td colspan="2">
                                <input type="number" class="form-control itemQty" value="<?= $row['qty'] ?>" style="width:75px;">
                            </td>
                            <td colspan="3">RM&nbsp;&nbsp;<?= number_format($row['total_price'], 2); ?></td>

                            </tr>
                            <?php $grand_total += $row['total_price']; ?>
                        <?php endwhile; ?>
                        <tr>
                            <td colspan="3">
                                <a href="product.php" class="btn btn-success">&nbsp;&nbsp;Continue
                                    Shopping</a>
                            </td>

                            <td colspan="3">
                                <a href="paymentpage.php" class="btn btn-info <?= ($grand_total > 1) ? '' : 'disabled'; ?>">&nbsp;&nbsp;Checkout</a>
                            </td>
                            <td ><b>Grand Total</b></td>
                            <td ><b>RM&nbsp;&nbsp;<?= number_format($grand_total, 2); ?></b></td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>



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

                                                // Change the item quantity
                                                $(".itemQty").on('change', function () {
                                                    var $el = $(this).closest('tr');

                                                    var pid = $el.find(".pid").val();
                                                    var pprice = $el.find(".pprice").val();
                                                    var qty = $el.find(".itemQty").val();
                                                    location.reload(true);
                                                    $.ajax({
                                                        url: 'action.php',
                                                        method: 'post',
                                                        cache: false,
                                                        data: {
                                                            qty: qty,
                                                            pid: pid,
                                                            pprice: pprice
                                                        },
                                                        success: function (response) {
                                                            console.log(response);
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
