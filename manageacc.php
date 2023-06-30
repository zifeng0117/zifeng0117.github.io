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

        <form action="action.php" method="post" class="register-form">
            <?php
            $currentuser = $_SESSION['id'];
            $sql = "SELECT * FROM user WHERE id='$currentuser'";
            $gotresults = mysqli_query($conn, $sql);

            if ($gotresults) {
                if (mysqli_num_rows($gotresults) > 0) {
                    while ($row = mysqli_fetch_array($gotresults)) {
                        ?>
                        <h5>Manage Account</h5>
                        <hr>
                        <div class="email">
                            <label>Email Address</label>
                            <input type="email" class="form-control" name="email" required value = "<?php echo $row['email']; ?>">
                        </div>
                        <br>
                        <div class="row">
                            <div class="col">
                                <label>Username</label>
                                <input type="text" class="form-control" name="username" required value = "<?php echo $row['username']; ?>" 
                                       minlength="2" maxlength="12" pattern="[A-Za-z0-9]{2,12}" title="Please enter only alphanumeric characters" required>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col">
                                <label >Password</label>
                                <input type="password" class="form-control" name="password" required value = "<?php echo $row['password']; ?>"  
                                       minlength="3" maxlength="8" pattern=".{3,8}" title="Please enter a password with a minimum of 3 characters" required>
                            </div>
                        </div>
                        <br>
                        <p>Phone Number:</p>
                        <input id="phone" type="tel" name="phone" required pattern="[0-9+]+" value="<?php echo $row['phone']; ?>">
                        <div class="register-form">
                            <a href="mainpage.php" class="btn btn-primary">Back</a>
                            <button type="submit" class="btn btn-primary submitbtn" name="manage_profile">Update</button>
                        </div>
                    </form>
                    <?php
                }
            }
        }
        ?>  
    </body>
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
    <script>
        const phoneInputField = document.querySelector("#phone");
        const phoneInput = window.intlTelInput(phoneInputField, {
            utilsScript:
                    "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.js",
        });
        const info = document.querySelector(".alert-info");

        function process(event) {
            event.preventDefault();

            const phoneNumber = phoneInput.getNumber();

            info.style.display = "";
            info.innerHTML = `Phone number in E.164 format: <strong>${phoneNumber}</strong>`;
        }
    </script>
</html>

