<?php
require_once 'database.php';
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}



$grand_total = 0;
$allItems = '';
$items = [];

$sql = "SELECT CONCAT(product_name, ' x ',qty,' <br>') AS ItemQty, total_price FROM cart";

$stmt = $conn->prepare($sql);
$stmt->execute();
$result = $stmt->get_result();
while ($row = $result->fetch_assoc()) {
    $grand_total += $row['total_price'];
    $items[] = $row['ItemQty'];
}
$allItems = implode(' ', $items);

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
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
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


        <br><hr>

        <div id="order" class="container">

            <div class="row">
                <div class="col">
                    <h3>Product(s) :</h3>
                    <h3><?= $allItems; ?></h3>
                    <h3 >Delivery Fee : Free of charge</h3>
                    <h3 >Payment Available : Cash On Delivery</h3>
                </div>
            </div>



            <br><hr>


            <div class="row">
                <div class="col">

                </div>           
                <div class="justify-content-end ">
                    <div class="col">
                        <h3>Grand Total: RM<?= number_format($grand_total, 2) ?></h3>
                    </div>
                </div>      
            </div>

            <hr>

            <div class="row">
                <h3>Checkout <i class="fa-brands fa-cc-visa"></i> <i class="fa-brands fa-cc-mastercard"></i></h3>
            </div>
            <!-- payment -->

            <div class="row">
                <div class="col border">
                    <form action="" method="post" id="placeOrder">
                        <input type="hidden" name="products" value="<?= $allItems; ?>">
                        <input type="hidden" name="grand_total" value="<?= $grand_total; ?>">
                        <div class="form-group">
                            <label>Name: </label>
                            <input type="text" name="name" required class="form-control" placeholder="Enter Name" pattern="[a-zA-Z\s]{3,20}" 
                                   title="Name should contain only alphabets and be between 3 and 20 characters long">
                        </div>
                        <div class="form-group">
                            <label>Email: </label>
                            <input type="email" name="email" required class="form-control" placeholder="Enter E-Mail" required>
                        </div>
                        <div class="form-group">
                            <label>Tel: </label>
                            <input type="tel" name="phone" required class="form-control" placeholder="Enter Phone" pattern="[\d+]+" 
                                   title="Only numbers and the + symbol are allowed">
                        </div>
                        <div class="form-group">
                            <label>Delivery Address: </label>
                            <textarea name="address" required class="form-control" rows="3" cols="10" maxlength="100" 
                                      placeholder="Enter Delivery Address Here..."></textarea>
                        </div>
                        <div class="form-group">
                            <label>Select Payment Method: </label>
                            <select name="payment" required class="form-control">
                                <option value="" selected disabled>-Available Payment Method-</option>
                                <option value="Cash On Delivery">Cash On Delivery</option>

                            </select>
                        </div>
                        <div class="form-group ">

                            <select hidden  required name="status" class="form-control">
                                <option value="" disabled>-Status-</option>
                                <option value="Pending" selected>Pending</option>
                                <option value="Delivery">Delivery</option>
                            </select>
                        </div>
                        <br>
                        <div class="form-group">
                            <input type="submit" name="submit" value="Confirm Checkout" class="btn btn-dark submitbtn">
                        </div>
                    </form> 
                    <br>
                </div>
            </div>
        </div>
        <br><br><hr><br><br>

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
                                <li> <a href="#" class="icoFacebook" title="Facebook"> <i class="fa fa-facebook" style="font-size:20px"> </i> </a> </li>  
                                <li> <a href="#" class="icoLinkedin" title="Linkedin"> <i class="fa fa-linkedin" style="font-size:20px"> </i> </a> </li>    
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

                // Sending Form data to the server
                $("#placeOrder").submit(function (e) {
                    e.preventDefault();
                    $.ajax({
                        url: 'action.php',
                        method: 'post',
                        data: $('form').serialize() + "&action=order",
                        success: function (response) {
                            $("#order").html(response);
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